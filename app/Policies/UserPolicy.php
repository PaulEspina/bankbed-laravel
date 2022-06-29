<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        
    }

    public function view(User $auth, User $user)
    {
        return $auth->id == $user->id;
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $auth, User $user)
    {
        return $auth->id == $user->id;
    }

    public function delete(User $auth, User $user)
    {
        return $auth->id == $user->id;
    }

    public function restore(User $auth, User $user)
    {
        //
    }

    public function forceDelete(User $auth, User $user)
    {
        //
    }
}
