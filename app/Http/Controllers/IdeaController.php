<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Idea;



class IdeaController extends Controller
{
    public function store()
    {
        request()->validate([
            'idea' => 'required|min:2|max:255',
        ]);
        $idea = Idea::create([
            'content' => request()->get('idea', ''),
        ]);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function destroy($id)
    {
        $idea = Idea::findOrFail($id);
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}

