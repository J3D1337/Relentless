<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Idea;



class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {

        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $validated = request()->validate([
            'content' => 'required|min:2|max:255',
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
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
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}

