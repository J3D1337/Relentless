<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Models\Game;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::withCount('likes')->orderBy('created_at', 'desc');

        // if(request()->has('search'))
        // {
        //     $ideas = $ideas->where('content','like' , "%" . request()->get('search', '') . "%");
        // }

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
