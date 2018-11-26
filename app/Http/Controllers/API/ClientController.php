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
      'car_type' => $request->car_type ,
      'car_no' => $request->car_no,
      'car_color' =>$request->car_color];
      $add_client = Client::create($client);

      if($add_client){
        $request = Client_Request::where('id',$request_id )
        ->update(['client_id' =>  $add_client->id]);
        return response()->json(['code' => 200,'message' => 'success','data' => $add_client]);
      }else{
        return response()->json(['code' => 404,'message' => 'faild','data' => []]);
      }
  }

  public function updateClient($client_id,Request $request){
    $input=$request->all();
    $client=[
      'name'     => $request->name,
      'email'    => $request->has('email') ? $request->email : null,
      'phone'   => $request->phone,
      'car_type' => $request->car_type ,
      'car_no' => $request->car_no,
      'car_color' =>$request->car_color];
      $check_client = Client::where('id',$client_id )->get();
      if(count($check_client) >0){
            $update_client = Client::where('id',$client_id )
            ->update($input);

          if($update_client){
            return response()->json(['code' => 200,'message' => 'success','data' => $client]);

          }else{
            return response()->json(['code' => 404,'message' => 'faild','data' => []]);

          }
      }else{
        return response()->json(['code' => 404,'message' => 'faild not found','data' => []]);

      }


  }
}
