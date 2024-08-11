<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\Idea;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'ideas'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $editing = true;
        $ideas = $user->ideas()->paginate(5);

        return view('users.edit', compact('user', 'editing', 'ideas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $this->authorize('update', $user);

        $validated = request()->validate([
            'name' => [
                'required',
                'min:3',
                'max:40',
                Rule::unique('users', 'name')->ignore($user->id),
            ],
            'bio' => 'nullable|max:40',
            'image' => 'nullable|image',
        ]);


        if(request()->has('image'))
        {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }

        Storage::disk('public')->delete($user->image ?? '');


        $user->update($validated);


        return redirect()->route('users.show', $user);
    }

}
