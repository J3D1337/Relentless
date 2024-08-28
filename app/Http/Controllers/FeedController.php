<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Game;
class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $followingIDs = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id',$followingIDs)->latest();


        $games = Game::all();
        return view('dashboard', [
            'ideas' => $ideas ->paginate(5),
            'games' => $games
        ]);


    }
}
