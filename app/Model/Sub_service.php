<?php

namespace App\Model;

use App\Model\Service;

use Illuminate\Database\Eloquent\Model;

class Sub_service extends Model
{
    protected $fillable = [
        'name', 'image', 'details', 'guarantee', 'free_removal' ,'notes', 'requirements', 'free_polishing'
    ];
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
