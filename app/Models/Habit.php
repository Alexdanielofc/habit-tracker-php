<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    // Um hábito pertence a um usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function habitLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }

    public function wasCompletedToday(): bool
    {
        return $this->habitLogs
            ->where('completed_at', Carbon::today()->toDateString())
            ->isNotEmpty();

    }

    public function wasCompletedOn(\Carbon\Carbon $date): bool
    {
        return $this->habitLogs
            ->where('completed_at', $date->toDateString())
            ->isNotEmpty();
    }

    /**
     * Gerador do grid por ano
     *
     * @param int $year
     * @return array
     */
    public static function generateYearGrid(int $year): array
    {
        $startDate = \Carbon\Carbon::create($year, 1, 1);
        $endDate = \Carbon\Carbon::create($year, 12, 31);

        $weeks = [];
        $currentWeek = [];

        $firstDayOfWeek = $startDate->dayOfWeek; // 0 = domingo, 1 = segunda, etc
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
            $currentWeek[] = null; // Placeholder vazio
        }

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $currentWeek[] = $date->copy();

            // Fecha a semana no sábado ou no último dia
            if ($date->isSaturday() || $date->eq($endDate)) {
                $weeks[] = $currentWeek;
                $currentWeek = [];
            }
        }

        return $weeks;
    }
}
