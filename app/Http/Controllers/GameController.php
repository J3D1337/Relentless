<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(10); // Adjust the pagination size as needed
        return view('games.index', compact('games')); // Pass the $games variable to the view
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game')); // Pass the $game variable to the view
    }
}
