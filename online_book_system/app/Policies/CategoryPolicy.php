<?php

namespace App\Policies;

use App\User;
use App\Category;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function view(User $user)
    {
        return $user->can('view-category');
    }

    public function create(User $user)
    {
        return $user->can('create-category');
    }

    public function manage(User $user, Category $book)
    {
        return $user->can('manage-category');
    }
}
