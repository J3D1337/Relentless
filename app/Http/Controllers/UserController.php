<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\Idea;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Game;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        $games = Game::all();

        return view('users.show', compact('user', 'ideas', 'games'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $editing = true;
        $ideas = $user->ideas()->paginate(5);
        $games = Game::all();

        return view('users.edit', compact('user', 'editing', 'ideas', 'games'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) // Check if a new image is uploaded
        {
            // Check if the user already has an image and it is not null
            if ($user->image) {
                // Delete the old image only if it exists
                Storage::disk('public')->delete($user->image);
            }

            // Store the new image and update the validated array with the new path
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }

        // Update the user's information with the validated data
        $user->update($validated);

        return redirect()->route('users.show', $user);
    }



}
