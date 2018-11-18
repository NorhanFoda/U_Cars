<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Sub_service;
use App\Model\Client_Request;


class Free_Service extends Model
{
     protected $fillable = ['name'];

      public function sub_services(){
          return $this->belongsToMany(Sub_service::class);
      }

      public function client_requests(){
          return $this->hasMany(Client_Request::class);
      }
}
