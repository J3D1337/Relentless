<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;


class GameController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $games = Game::paginate(10); // Adjust the pagination size as needed
        return view('games.index', compact('games'));
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function create()
    {
        // Ensure the user is an admin
        $this->authorize('create', Game::class);

        return view('games.create'); // Assuming you have a separate view for game creation
    }

    public function store(Request $request)
{
    $this->authorize('create', Game::class);

    $validated = $request->validate([
        'title' => 'required|string|max:255|unique:games',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = $request->file('image')->store('games', 'public');

    Game::create([
        'title' => $validated['title'],
        'image' => $imagePath,
    ]);

    return redirect()->route('games.index')->with('success', 'Game added successfully.');
}
    public function edit(Game $game)
    {
        // Ensure the user is an admin
        $this->authorize('update', $game);

        return view('games.edit', compact('game')); // Assuming you have a separate view for editing the game
    }

    public function update(Request $request, Game $game)
    {
        // Ensure the user is an admin
        $this->authorize('update', $game);


        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // If a new image is uploaded, delete the old one and store the new one
        if ($request->hasFile('image')) {
            if ($game->image) {
                Storage::disk('public')->delete($game->image);
            }
            $imagePath = $request->file('image')->store('games', 'public');
            $game->image = $imagePath;
        }

        // Update the game's title
        $game->title = $validated['title'];
        $game->save();

        return redirect()->route('games.show', $game)->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        // Ensure the user is an admin
        $this->authorize('delete', $game);

        // Delete the game's image from storage
        if ($game->image) {
            Storage::disk('public')->delete($game->image);
        }

        // Delete the game
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}
