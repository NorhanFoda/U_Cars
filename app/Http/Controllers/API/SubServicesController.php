<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Sub_service;
use App\Model\Client_Request;


class SubServicesController extends Controller
{
      // get all Services
      public function get_services(){
          $services = Service::all();
          if(count($services)>0){
          return response()->json(['code' => 200,'message' => 'success','data' => $services]);
        }else{
          return response()->json(['code' => 404,'message' => 'not found','data' => []]);

        }
        }

      //get all subservices of specific service

      public function get_SubServices($service_id){
        $sub_services = Sub_service::where('service_id',$service_id)->get();
        if(count($sub_services)<=0){
           return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
        }else{
        	return response()->json(['code' => 200,'message' => 'success','data' => $sub_services]);
        }
    }

    // get subService

    public function get_Services($subService_id){
      $sub_service = Sub_service::where('id',$subService_id)->get();
      if(count($sub_service)<=0){
         return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
      }else{
        return response()->json(['code' => 200,'message' => 'success','data' => $sub_service]);
      }
  }

    public function addToCart(Request $request){
      $input = $request->all();
      $order_data = [
          'sub_service_id'   => $input['subservice_id'],
          'color_id' => $request->has('color_id') ? $input['color_id'] : null,
          'image_id'    => $request->has('image_id') ? $input['image_id'] : null,
          'class_id'   => $request->has('class_id') ? $input['class_id'] : null,
          'free_service_id' => $request->has('freeservice_id') ? $input['freeservice_id'] : null,
          'client_id'    => $request->has('client_id') ? $input['client_id'] : null,
          'price'     => $request->has('price') ? $input['price'] : null,
          'discount_request'    => $request->has('discount_request') ? $input['discount_request'] : null,
          'discount'   => $request->has('discount') ? $input['discount'] : null
      ];

      $add_order = Client_Request::create($order_data);

      // $sub_service = Sub_service::where('id',$subService_id)->get();
      // if(count($sub_service)<=0){
      //    return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
      // }else{
      //   return response()->json(['code' => 200,'message' => 'success','data' => $sub_service]);
      // }
    }



}
