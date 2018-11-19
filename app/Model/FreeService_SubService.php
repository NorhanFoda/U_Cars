<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Sub_service;
use App\Model\Free_Service;


class FreeService_SubService extends Model
{
        protected $table = 'free_service_sub_service';

        protected $fillable = [
            'sub_service_id',
            'free_service_id'
        ];

        protected $hidden = [
            'created_at',
            'updated_at'
        ];

        public function subservice(){
            return $this->belongsTo(Sub_service::class);
        }
        public function freeservice(){
            return $this->belongsTo(Free_Service::class);
        }
}
