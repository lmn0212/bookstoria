<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'blog_id','text'
    ];

    public function user()
    {
        return $this->BelongsTo('App\User','user_id');
    }
    public function blog()
    {
        return $this->BelongsTo('App\Blog','blog_id');
    }
}
