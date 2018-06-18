<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationChapter extends Model
{
    public function books()
    {
        return $this->HasMany('App\Book','book_id');
    }

}
