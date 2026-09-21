<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HabitController extends Controller
{
    use AuthorizesRequests;
    public function index(): View
    {
        $habits = Auth::user()->habits()
            ->with('habitLogs')
            ->get();

        return view('dashboard', compact('habits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('habits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        Auth::user()->habits()->create($validated);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        $this->authorize('edit', $habit);

        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

        $habit->update($request->validated());

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $this->authorize('update', $habit);

        $habit->delete();

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito deletado com sucesso!');
    }

    public function settings()
    {
        $habits = Auth::user()->habits;


        return view('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit)
    {
        //1. Verificar se o ususario autenticado e dono do habito
        $this->authorize('toggle', $habit);

        //2. Pegar a data de hoje
        $today = Carbon::today()-> toDateString(); // ('Y-m-d')

        //2.1 Pegar o log
        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('user_id', Auth::id())
            ->where('completed_at', $today)
            ->first();

        //3. Validar se nessa data ja existe um registro
        if($log){
            //4. Se existir, remover registro
            $log->delete();
            $message = 'Habito desmarcado.';

        } else {
            //5. Se nao existir, criar registro
            HabitLog::create([
                'user_id' => Auth::id(),
                'habit_id' => $habit->id,
                'completed_at' => $today,
            ]);
            $message = 'Habito concluido 👏';
        }

        //6. Retornar para a pagina anterior
        return redirect()
            ->route('habits.index')
            ->with('success', $message);
    }

    public function history()
    {
        $selectedYear = \Carbon\Carbon::now()->year;

        $startDate = \Carbon\Carbon::create($selectedYear, 1,1);
        $endDate = \Carbon\Carbon::create($selectedYear, 12,31, 23,59,59);

        $habits = Auth::user()->habits()
            ->with(['habitLogs' => function($query) use ($startDate, $endDate) {
                $query->whereBetween('completed_at', [$startDate, $endDate]);
            }])
            ->get();

        return view('habits.history', compact('habits','selectedYear'));
    }
}
