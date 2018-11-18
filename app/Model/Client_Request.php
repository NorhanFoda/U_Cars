<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Color;
use App\Model\Free_service;
use App\Model\Sub_service;
use App\Model\Image;
use App\Model\Class_cat;
use App\Model\Client;

class Client_Request extends Model
{
  protected $fillable = ['sub_service_id', 'color_id', 'image_id','client_id','price',
  'discount','discount_request','class_id','free_service_id'];

  public function color(){
      return $this->belongsTo(Color::class);
  }

  public function image(){
      return $this->belongsTo(Image::class);
  }

  public function client(){
      return $this->belongsTo(Client::class);
  }

  public function sub_service(){
      return $this->belongsTo(Sub_service::class);
  }

  public function free_service(){
      return $this->belongsTo(Free_service::class);
  }

  public function class(){
      return $this->belongsTo(Class_Cat::class);
  }

}
