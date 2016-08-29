<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'title', 'author', 'isbn', 'quantity', 'shelf_location'
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * The users that own the book.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_books')
        			->withPivot('expire_on', 'penalty_fee', 'status')
                    ->withTimestamps();
    }
}
