<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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

        //notify the user that the idea was created successfully
        

        return redirect()->route('ideas.index');
    }

    public function show(Idea $idea): View
    {
        Gate::authorize("manage-idea", $idea);
        return view('ideas.show', ['idea' => $idea]);
    }

    public function edit(Idea $idea): View
    {
        Gate::authorize("manage-idea", $idea);
        return view('ideas.edit', ['idea' => $idea]);
    }

    public function update(StoreIdeaRequest $request, Idea $idea): RedirectResponse
    {
        Gate::authorize("manage-idea", $idea);
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->ideas()->findOrFail($idea->id)->update($request->validated());

        return redirect()->route('ideas.show', $idea);
    }

    public function destroy(Idea $idea): RedirectResponse
    {
        Gate::authorize("manage-idea", $idea);
        $idea->delete();

        return redirect()->route('ideas.index');
    }
}
