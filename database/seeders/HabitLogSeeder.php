<?php

namespace Database\Seeders;

use App\Models\HabitLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HabitLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HabitLog::factory()
            ->count(5)
            ->create();
    }
}
