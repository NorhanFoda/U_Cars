<?php

namespace App\Model;

use App\Model\Sub_service;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'image'];

    public function sub_services(){
        return $this->hasMany(Sub_service::class);
    }
}
