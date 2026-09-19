<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HabitController extends Controller
{

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

        auth()->user()->habits()->create($validated);

        return redirect()
            ->route('site.dashboard')
            ->with('success', 'Hábito criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HabitRequest $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HabitRequest $habit)
    {
        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        if ($habit->user_id !== auth()->user()->id) {
            abort(403, 'Ação não autorizada.');
        }

        $habit->update($request->all());

        return redirect()
            ->route('site.dashboard')
            ->with('success', 'Hábito atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HabitRequest $habit)
    {
        if ($habit->user_id !== auth()->user()->id) {
            abort(403, 'Ação não autorizada.');
        }
        $habit->delete();

        return redirect()
            ->route('site.dashboard')
            ->with('success', 'Hábito deletado com sucesso!');
    }
}
