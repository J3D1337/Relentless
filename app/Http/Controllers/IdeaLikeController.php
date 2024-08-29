<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $user = Auth::user();

        // Prevent duplicate likes
        if (!$user->likesIdea($idea)) {
            $user->likes()->attach($idea);
        }

        return redirect()->back()->with('success', "Liked idea successfully");
    }

    public function unlike(Idea $idea)
    {
        $user = Auth::user();

        // Prevent unliking if not already liked
        if ($user->likesIdea($idea)) {
            $user->likes()->detach($idea);
        }

        return redirect()->back()->with('success', "Unliked idea successfully");
    }
}
