<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Idea;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Game;

class IdeaController extends Controller
{
    use AuthorizesRequests;

    public function show(Idea $idea)
    {
        $games = Game::all();
        return view('ideas.show', compact('idea', 'games'));
    }

    public function edit(Idea $idea)
    {
        $this->authorize('update', $idea);

        $editing = true;
        $games = Game::all();
        return view('ideas.show', compact('idea', 'editing', 'games'));
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        $this->authorize('update', $idea);

        $validated = $request->validated();

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea);
    }

    public function store(CreateIdeaRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['game_id'] = $request->input('game_id') ?: null;

        Idea::create($validated);

        if ($validated['game_id']) {
            return redirect()
                ->route('games.show', $validated['game_id'])
                ->with('success', 'Idea created successfully!');
        } else {
            return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
        }
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
