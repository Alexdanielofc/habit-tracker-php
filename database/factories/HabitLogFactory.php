<?php

namespace Database\Factories;

use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HabitLog>
 */
class HabitLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, // Substitua pelo ID do usuário que você deseja associar
            'habit_id' => Habit::query()
                ->inRandomOrder()
                ->first()
                ->id, // Seleciona um hábito aleatório
            'completed_at' => $this
                ->faker
                ->unique()
                ->dateTimeBetween('-30 days', 'now')
                ->format('Y-m-d'),
        ];
    }
}
