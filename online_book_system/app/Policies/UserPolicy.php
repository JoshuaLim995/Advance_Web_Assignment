<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user)
    {
        return $user->can('view-user');
    }

    public function create(User $user)
    {
        return $user->can('create-user');
    }

    public function manage(User $user)
    {
        return $user->can('manage-user');
    }
}
