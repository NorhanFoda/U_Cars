<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\Client_Request;

class ClientController extends Controller
{
  public function addClient(Request $request,$request_id){

    $client=[
      'name'     => $request->name,
      'email'    => $request->has('email') ? $request->email : null,
      'phone'   => $request->phone,
      'car_type' => $requey             0st->car_type ,
      'car_no' => $request->car_no,
      'car_color' =>$request->car_color];
      $add_client = Client::create($client);

      if($add_client){
        $request = Client_Request::where('id',$request_id )
        ->update(['client_id' =>  $add_client->id]);
        return response()->json(['code' => 404,'message' => 'faild','data' => $add_client]);
      }else{
        return response()->json(['code' => 404,'message' => 'faild','data' => []]);
      }


  }
}
