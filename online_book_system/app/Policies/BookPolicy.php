<?php

namespace App\Policies;

use App\User;
use App\Book;

use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
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
        return $user->can('view-book');
    }

    public function create(User $user)
    {
        return $user->can('create-book');
    }

    public function manage(User $user, Book $book)
    {
        return $user->can('manage-book');
    }
}
