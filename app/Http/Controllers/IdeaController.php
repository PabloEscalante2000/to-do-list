<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
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

    public function store(StoreIdeaRequest $request): RedirectResponse
    {

        Idea::create($request->validated());

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

    public function update(StoreIdeaRequest $request, Idea $idea): RedirectResponse
    {
        $idea->update($request->validated());

        return redirect()->route('ideas.show', $idea);
    }

    public function destroy(Idea $idea): RedirectResponse
    {
        $idea->delete();

        return redirect()->route('ideas.index');
    }
}
