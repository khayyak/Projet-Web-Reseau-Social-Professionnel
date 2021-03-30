<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function getUser()
    {
        return $this->belongsTo('App\Laravue\Models\User','author');
    }

    public function getReactions()
    {
        return $this->hasMany('App\reaction','id');
    }

    public function getComments()
    {
        return $this->hasMany('App\commentaire','id');
    }
}
