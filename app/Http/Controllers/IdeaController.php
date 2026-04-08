<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IdeaController extends Controller
{
    public function index(): View
    {
        $ideas = Auth::user()->ideas;

        return view('ideas.index', ['ideas' => $ideas]);
    }

    public function create(): View
    {
        return view('ideas.create');
    }

    public function store(StoreIdeaRequest $request): RedirectResponse
    {

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->ideas()->create($request->validated());

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
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->ideas()->update($request->validated());

        return redirect()->route('ideas.show', $idea);
    }

    public function destroy(Idea $idea): RedirectResponse
    {
        $idea->delete();

        return redirect()->route('ideas.index');
    }
}
