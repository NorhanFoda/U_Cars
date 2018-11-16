<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color_SubService extends Model
{
  protected $table = 'color-sub_services';

protected $fillable = [
    'subservice_id',
    'color_id'
];

protected $hidden = [
    'created_at',
    'updated_at'
];

public function subservice(){
    return $this->belongsTo(Sub_service::class);
}

public function color(){
    return $this->belongsTo(Color::class);
}
}
