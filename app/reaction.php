<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reaction extends Model
{
    public $timestamps = false;
    public function getUser()
    {
        return $this->belongsTo('App\Laravue\Models\User','author');
    }

    public function getPost()
    {
        return $this->belongsTo('App\Laravue\Models\User','post');
    }
}
