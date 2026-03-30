<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IdeaController extends Controller
{
    public function index(): View
    {
        $ideas = Idea::query()->latest()->get();

        return view('ideas.index', ['ideas' => $ideas]);
    }

    public function create(): View
    {
        return view('ideas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'description' => ['required', 'string','min:10', 'max:1000'],
        ]);

        Idea::create([
            'description' => $validated['description'],
            'state' => 'pending',
        ]);

        return redirect()->route('ideas.index');
    }

    public function show(Idea $idea): View
    {
        return view('ideas.show', ['idea' => $idea]);
    }

    public function edit(Idea $idea): View
    {
        return view('ideas.edit', ['idea' => $idea]);
    }

    public function update(Request $request, Idea $idea): RedirectResponse
    {
        $validated = $request->validate([
            'description' => ['required', 'string', 'max:1000'],
            'state' => ['required', 'in:pending,in_progress,completed'],
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea);
    }

    public function destroy(Idea $idea): RedirectResponse
    {
        $idea->delete();

        return redirect()->route('ideas.index');
    }
}
