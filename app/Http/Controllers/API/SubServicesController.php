<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Sub_service;


class SubServicesController extends Controller
{
      // get all Services
      public function get_services(){
          $services = Service::all();
          return response()->json(['code' => 200,'message' => 'success','data' => $services]);
      }

      //get all subservices of specific service

      public function get_SubServices($id){
        $sub_services = Sub_service::where('service_id',$id)->find($id);
      //  dd($sub_services);
        if(empty($sub_services)){
           return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
        }else{
        	return response()->json(['code' => 200,'message' => 'success','data' => $sub_services]);
        }
    }

}
