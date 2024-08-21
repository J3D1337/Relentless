<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class TermsController extends Controller
{
    public function show()
    {
        $games = Game::all();
        return view('terms.show', compact('games'));
    }
}
