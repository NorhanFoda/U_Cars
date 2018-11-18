<?php

namespace App\Model;

use App\Model\Color;
use App\Model\Client_Request;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'price', 'code'];

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function client_requests(){
        return $this->hasMany(Client_Request::class);
    }
}
