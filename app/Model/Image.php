<?php

namespace App\Model;

use App\Model\Color;
use App\Model\Client_Request;
use App\Model\sub_service;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'price', 'code','color_id','sub_service_id'];

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function sub_service(){
        return $this->belongsTo(Sub_service::class);
    }

    public function client_requests(){
        return $this->hasMany(Client_Request::class);
    }
}
