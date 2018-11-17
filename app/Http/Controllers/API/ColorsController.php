<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Sub_service;
use App\Model\Color;
use App\Model\Color_SubService;

class ColorsController extends Controller
{
          //get subservice colors
        public function get_colors($id){
        $colors = Color_SubService::with(['color','subservice'])->where('sub_service_id',$id)->get();
        if(empty($colors)){
           return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
        }else{
           return response()->json(['code' => 200,'message' => 'success','data' => $colors]);
        }
        }
}
