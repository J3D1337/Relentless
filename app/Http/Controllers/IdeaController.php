<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Idea;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;




class IdeaController extends Controller
{
    use AuthorizesRequests;

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $this->authorize('update', $idea);

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $this->authorize('update', $idea);

        $validated = request()->validate([
            'content' => 'required|min:2|max:255',
        ]);

        return redirect()->route('ideas.show', $idea);


    }


    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:2|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}

