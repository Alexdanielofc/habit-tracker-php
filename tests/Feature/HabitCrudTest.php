<?php

namespace Tests\Feature;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HabitCrudTest extends TestCase
{
    use RefreshDatabase;

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
