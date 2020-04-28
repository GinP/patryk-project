<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function adverts()
    {
        return $this->hasMany('App\Advert', 'category_id', 'id');
    }
}
