<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['path'];

    protected $uploads = '/images/';

    protected $alternateImage = '/images/alternate.jpg';

    public function getPathAttribute($path)
    {
        return $this->uploads . $path;
    }

    public function getAlternateAttribute()
    {
        return $this->alternateImage;
    }
}
