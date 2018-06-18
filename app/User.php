<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->BelongsToMany('App\Role','role_user');
    }

    public function books()
    {
        return $this->HasMany('App\Book','author_id');
    }

    public function setRolesAttribute($role)
    {
        $this->roles()->detach();
        if ( ! $role) return;
        if ( ! $this->exists) $this->save();
        $this->roles()->attach($role);
    }

    public function comments()
    {
        return $this->HasMany('App\Comment');
    }

    public function library()
    {
        return $this->HasMany('App\Library');
    }

    public function orders()
    {
        return $this->HasMany('App\Order');
    }

    public function blog()
    {
        return $this->HasMany('App\Blog');
    }
}
