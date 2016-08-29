<?php

namespace App\Repositories;

use App\User;
use App\Book;
use Auth;

class BookRepository
{
    /**
     * Get all of the books for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {        
        if($user->isAdmin()) {
            return Book::orderBy('title')
                       ->get();
        }

        return $user->books()
                    ->where('status', 1)
                    ->orderBy('title')
                    ->get();
    }

    /**
     * Search books by keyword
     *
     * @param  string  $keyword
     * @return Collection
     */
    public function search($keyword)
    {
        $keyword = '%' . $keyword . '%';
        return Book::where(function($query) use ($keyword){
                        $query->where('title', 'like', $keyword);
                        $query->orWhere('author', 'like', $keyword);
                    })
                    ->whereNotIn('id', function($query){
                        $query->select('book_id')
                            ->from('users_books')
                            ->where('user_id', Auth::user()->id)
                            ->where('status', 1);
                    })
                    ->orderBy('title')
                    ->get();
    }

    /**
     * Return a book by user
     *
     * @param  User $user
     * @param  Book $book
     */
    public function return(User $user, Book $book)
    {
        $book->users()
             ->where('status', 1)
             ->updateExistingPivot($user->id, ['status' => 0]);
    }

    /**
     * Borrow a book by user
     *
     * @param  User $user
     * @param  Book $book
     */
    public function borrow(User $user, Book $book)
    {
        $expiry_date = date('Y-m-d', strtotime(date('Y-m-d') . ' + 14 days'));

        if($book->users()->where('user_id', $user->id)->where('status', 1)->count() == 0) {
            $book->users()->attach($user->id, ['status' => 1, 'expire_on' => $expiry_date]);
        }
    }

    /**
     * Validate if Junior member has reached borrow limit
     *
     * @param  boolean $result
     */
    public function canJuniorMemberBorrow()
    {
        $allowedBookCount = 3;

        return (Auth::user()->isJunior() && 
                Auth::user()->books()->where('status', 1)->count() >= $allowedBookCount);
    }

    /**
     * Validate if Senior member has reached borrow limit
     *
     * @param  boolean $result
     */
    public function canSeniorMemberBorrow()
    {
        $allowedBookCount = 6;

        return (Auth::user()->isSenior() && 
                Auth::user()->books()->where('status', 1)->count() >= $allowedBookCount);

    }
}
