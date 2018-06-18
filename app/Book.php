<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author_name', 'cover','annotation','booktailer','public','price','categories','collections','tags'
    ];

    public function author()
    {
        return $this->BelongsTo('App\User','author_id');
    }

    public function categories()
    {
        return $this->BelongsToMany('App\Category','category_book');
    }
    public function collections()
    {
        return $this->BelongsToMany('App\Collection','collection_book');
    }
    public function tags()
    {
        return $this->BelongsToMany('App\Tag','tag_book');
    }

    public function chapters()
    {
        return $this->HasMany('App\Chapter');
    }

    public function comments()
    {
        return $this->HasMany('App\Comment');
    }
    public function libraries()
    {
        return $this->HasMany('App\Library');
    }

    public function orders()
    {
        return $this->HasMany('App\Order');
    }

    public function setCategoriesAttribute($category)
    {
        //dd($category);
        $this->categories()->detach();
        if ( ! $category) return;
        if ( ! $this->exists) $this->save();
        $this->categories()->attach($category);
    }

    public function setCollectionsAttribute($collection)
    {
        $this->collections()->detach();
        if ( ! $collection) return;
        if ( ! $this->exists) $this->save();
        $this->collections()->attach($collection);
    }
/*
    public function setTagsAttribute($tags)
    {
        //dd($category);
        $this->tags()->detach();
        if ( ! $tags) return;
        if ( ! $this->exists) $this->save();
        $this->tags()->attach($tags);
    }
*/
}
