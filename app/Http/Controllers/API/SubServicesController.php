<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Sub_service;
use App\Model\Client_Request;
use App\Model\Image;
use App\Model\Class_type;
use App\Model\Client;



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

    public function get_SubService($subService_id){
      $sub_service = Sub_service::where('id',$subService_id)->get();
      if(count($sub_service)<=0){
         return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
      }else{
        return response()->json(['code' => 200,'message' => 'success','data' => $sub_service]);
      }
  }


}
