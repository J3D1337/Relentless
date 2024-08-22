<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GamePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->is_admin;
    }

    public function update(User $user, Game $game)
    {
        return $user->is_admin;
    }

    public function delete(User $user, Game $game)
    {
        return $user->is_admin;
    }
}
