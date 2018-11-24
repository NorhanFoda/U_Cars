<?php

namespace App\Model;

use App\Model\Service;
use App\Model\Color;
use App\Model\Free_service;
use App\Model\Client_Request;


use Illuminate\Database\Eloquent\Model;

class Sub_service extends Model
{
    protected $fillable = [
        'name', 'image', 'details', 'guarantee', 'free_removal' ,'notes', 'requirements', 'free_polishing',
        'service_id'
    ];
    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    public function free_services(){
        return $this->belongsToMany(Free_service::class);
    }

    public function client_requests(){
        return $this->hasMany(Client_Request::class);
    }

    
}
