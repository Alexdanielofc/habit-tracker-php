<?php

namespace Tests\Feature;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HabitCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_current_year_history_without_completed_habits(): void
    {
        $user = User::factory()->create();
        $habit = Habit::factory()->create([
            'user_id' => $user->id,
            'name' => 'Tomar banho de lua',
        ]);

        $response = $this->actingAs($user)
            ->get(route('habits.history'));

        $response->assertViewIs('habits.history')
            ->assertViewHas('selectedYear', now()->year)
            ->assertViewHas('availableYears', [now()->year])
            ->assertViewHas('habits', function ($habits) use ($habit): bool {
                return $habits->contains($habit);
            });
    }

    public function test_different_users_can_create_habits_with_the_same_name(): void
    {
        $firstUser = User::factory()->create();
        $secondUser = User::factory()->create();

        $this->actingAs($firstUser)
            ->post(route('habits.store'), ['name' => 'Tomar banho de lua'])
            ->assertRedirect(route('habits.index'));

        $response = $this->actingAs($secondUser)
            ->post(route('habits.store'), ['name' => 'Tomar banho de lua']);

        $response->assertRedirect(route('habits.index'));
        $this->assertDatabaseCount('habits', 2);
        $this->assertDatabaseHas('habits', [
            'user_id' => $secondUser->id,
            'name' => 'Tomar banho de lua',
        ]);
    }

    public function test_user_cannot_create_two_habits_with_the_same_name(): void
    {
        $user = User::factory()->create();
        Habit::factory()->create([
            'user_id' => $user->id,
            'name' => 'Tomar banho de lua',
        ]);

        $response = $this->actingAs($user)
            ->post(route('habits.store'), ['name' => 'Tomar banho de lua']);

        $response->assertSessionHasErrors([
            'name' => 'Você já possui um hábito com esse nome.',
        ]);
        $this->assertDatabaseCount('habits', 1);
    }

    public function test_user_can_update_a_habit(): void
    {
        $user = User::factory()->create();
        $habit = Habit::factory()->create([
            'user_id' => $user->id,
            'name' => 'Antigo nome',
        ]);

        $response = $this->actingAs($user)
            ->put(route('habits.update', $habit), [
                'name' => 'Novo nome',
            ]);

        $response->assertRedirect(route('habits.index'))
            ->assertSessionHas('success', 'Hábito atualizado com sucesso!');

        $this->assertDatabaseHas('habits', [
            'id' => $habit->id,
            'user_id' => $user->id,
            'name' => 'Novo nome',
        ]);
    }

    public function test_user_can_delete_a_habit(): void
    {
        $user = User::factory()->create();
        $habit = Habit::factory()->create([
            'user_id' => $user->id,
            'name' => 'Hábito para remover',
        ]);

        $response = $this->actingAs($user)
            ->delete(route('habits.destroy', $habit));

        $response->assertRedirect(route('habits.index'))
            ->assertSessionHas('success', 'Hábito deletado com sucesso!');

        $this->assertDatabaseMissing('habits', [
            'id' => $habit->id,
        ]);
    }

    public function test_user_can_toggle_a_habit_as_completed(): void
    {
        $user = User::factory()->create();
        $habit = Habit::factory()->create([
            'user_id' => $user->id,
            'name' => 'Hábito para concluir',
        ]);

        $response = $this->actingAs($user)
            ->post(route('habit.toggle', $habit));

        $response->assertRedirect(route('habits.index'))
            ->assertSessionHas('success', 'Habito concluido 👏');

        $this->assertDatabaseHas('habit_logs', [
            'habit_id' => $habit->id,
            'user_id' => $user->id,
        ]);
    }
}
