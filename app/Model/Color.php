<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table = 'colors';

    protected $fillable = ['name'];

    public function sub_services(){
        return $this->hasMany(Sub_service::class);
    }

}
