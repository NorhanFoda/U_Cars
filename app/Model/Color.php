<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Sub_service;
use App\Model\Image;

class Color extends Model
{
    //
    protected $table = 'colors';

    protected $fillable = ['name'];

    public function sub_services(){
        return $this->belongsToMany(Sub_service::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

}
