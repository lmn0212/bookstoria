<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'first_name','last_name',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
