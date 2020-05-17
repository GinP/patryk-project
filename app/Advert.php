<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $guarded = [];

    public function user() {
        $this->belongsTo('App\User');
    }

    public function category() {
        $this->belongsTo('App\Category');
    }
}
