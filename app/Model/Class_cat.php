<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Client_Request;

class Class_cat extends Model
{
    protected $fillable = ['name'];

    public function client_requests(){
        return $this->hasMany(Client_Request::class);
    }
}
