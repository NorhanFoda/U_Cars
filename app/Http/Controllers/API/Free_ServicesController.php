<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Sub_service;
use App\Model\Free_Service;
use App\Model\FreeService_SubService;

class Free_ServicesController extends Controller
{
      public function get_freeservices($subService_id){
            $free_Services = FreeService_SubService::with(['freeservice','subservice'])->where('sub_service_id',$subService_id)->get();
            if(count($free_Services)<=0){
               return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
            }else{
               return response()->json(['code' => 200,'message' => 'success','data' => $free_Services]);
            }
      }

      public function Select_freeservice(Request $request){

            $free_Service = FreeService_SubService::with(['freeservice','subservice'])->where(
                'sub_service_id', $request->sub_service_id)
                ->where('free_service_id', $request->free_service_id)
                ->get();
            if(count($free_Service)<=0){
               return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
            }else{
               return response()->json(['code' => 200,'message' => 'success','data' => $free_Service]);
            }
      }
}
