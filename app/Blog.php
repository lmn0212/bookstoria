<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name', 'text', 'public','user_id','cover'
    ];

    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public function comments()
    {
        return $this->HasMany('App\BlogComment');
    }
}
