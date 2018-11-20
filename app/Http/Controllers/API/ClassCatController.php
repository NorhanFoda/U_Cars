<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Class_type;


class ClassCatController extends Controller
{


      public function getSubServiceClasses($sub_service_id){
          $class_types = Class_type::where('sub_service_id', $sub_service_id)->get();
          if(count($class_types) >0 && $class_types[0]->name != "لون" ){
            return response()->json(['code' => 200,'message' => 'success','data' => $class_types]);
          }else{
            return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);

          }
      }

      public function select_Class($class_id){
          $class = Class_type::where('class_cat_id', $class_id)->get();
          if(count($class) >0 ){
            return response()->json(['code' => 200,'message' => 'success','data' => $class]);
          }else{
            return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);

          }
      }
}
