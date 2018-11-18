<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Client_Request;

class Client extends Model
{
  protected $table = 'clients';

  protected $fillable = ['name', 'phone', 'car_type','car_color','car_no','email'];

  public function client_requests(){
      return $this->hasMany(Client_Request::class);
  }


}
