<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Models\Game;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch ideas and include those without a game_id
        $ideas = Idea::withCount('likes')
            ->whereNull('game_id') // include ideas without a game
            ->orWhereNotNull('game_id') // include ideas with a game
            ->orderBy('created_at', 'desc');

        $games = Game::all();

        return view('dashboard', [
            'games' => $games,
            'ideas' => $ideas->paginate(5),
        ]);
    }

    public function searchGames(Request $request)
    {
        $query = $request->get('query');
        $games = Game::where('title', 'like', '%' . $query . '%')->get(['id', 'title', 'image']);
        return response()->json($games);
    }
}
