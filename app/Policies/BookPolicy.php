<?php

namespace App\Policies;

use App\User;
use App\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine if the given user can return the given book.
     *
     * @param  User  $user
     * @param  Book  $book
     * @return bool
     */
    public function return(User $user, Book $book)
    {
        return $book->users->contains($user->id);
    }
}
