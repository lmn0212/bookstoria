<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'book_id'
    ];

    public function user()
    {
        return $this->BelongsTo('App\User','user_id');
    }
    public function book()
    {
        return $this->BelongsTo('App\Book','book_id');
    }
}
