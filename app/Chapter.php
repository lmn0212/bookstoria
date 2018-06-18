<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'text', 'book_id','number','author_id'
    ];

    public function author()
    {
        return $this->BelongsTo('App\User','author_id');
    }
    public function book()
    {
        return $this->BelongsTo('App\Book','book_id');
    }

}
