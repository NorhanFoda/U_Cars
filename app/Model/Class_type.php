<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Class_type extends Model
{
    protected $fillable = ['name', 'sub_service_id', 'class_cat_id'];
}
