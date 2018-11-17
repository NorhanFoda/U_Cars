<?php

namespace App\Model;

use App\Model\Color;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'price', 'code'];
    
    public function color(){
        return $this->belongsTo(Color::class);
    }
}
