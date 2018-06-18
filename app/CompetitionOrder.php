<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionOrder extends Model
{
    public function users()
    {
        return $this->BelongsTo('App\User','user_id');
    }
    public function books()
    {
        return $this->BelongsTo('App\Book','book_id');
    }
    public function competitions()
    {
        return $this->BelongsTo('App\Competition','competition_id');
    }
}
