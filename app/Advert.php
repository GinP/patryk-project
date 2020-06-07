<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Advert extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function category()
    {
        $this->belongsTo('App\Category');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file')
            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('card')
                    ->width(286)
                    ->height(180);});

        $this->addMediaCollection('file')
            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('thumb')
                    ->width(75)
                    ->height(75);
            });

    }
}
