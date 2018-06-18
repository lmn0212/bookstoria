<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    public function comporders()
    {
        return $this->HasMany('App\CompetitionOrder');
    }

    public function author()
    {
        return $this->BelongsTo('App\User','user_id');
    }

}
