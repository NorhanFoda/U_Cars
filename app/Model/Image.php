<?php

namespace App\Model;

use App\Model\Color;
use App\Model\Client_Request;
use App\Model\Sub_service;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'price', 'code','color_id','sub_service_id'];

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function subservice(){
        return $this->belongsTo(Sub_service::class);
    }

    public function client_requests(){
        return $this->hasMany(Client_Request::class);
    }

    public function getColorIdAttribute($value){
       return intval($this->attributes['color_id']);
    }

    public function getSubserviceIdAttribute($value){
          return intval($this->attributes['sub_service_id']);
      }


}
