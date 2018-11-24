<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Color;
use App\Model\Sub_service;
use App\Model\Image;
use App\Model\Class_cat;
use App\Model\Client;
use App\Model\Class_type;
use App\Model\Free_Service;


class Client_Request extends Model
{
        protected $table = 'client_requests';

        protected $fillable = ['sub_service_id', 'color_id', 'image_id','client_id','price',
        'discount','discount_request','class_id','free_service_id','classtype_id'];

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

        public function class_type(){
            return $this->belongsTo(Class_type::class);
        }

        public function getColorIdAttribute($value){
           return intval($this->attributes['color_id']);
        }

      public function getSubserviceIdAttribute($value){
            return intval($this->attributes['sub_service_id']);
        }

      public function getImageAttribute($value){
            return intval($this->attributes['image_id']);
        }

      public function getClassTypeAttribute($value){
            return intval($this->attributes['classtype_id']);
      }

      public function getClientTypeAttribute($value){
            return intval($this->attributes['client_id']);
      }
      public function getFreeserviceAttribute($value){
            return intval($this->attributes['free_service_id']);
      }
}
