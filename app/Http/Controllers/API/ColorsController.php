<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Sub_service;
use App\Model\Color;
use App\Model\Color_SubService;
use App\Model\Image;

class ColorsController extends Controller
{
          //get subservice colors
        public function get_colors($id){
              $colors = Color_SubService::with(['color','subservice'])->where('sub_service_id',$id)->get();
              if(count($colors)<=0){
                 return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
              }else{
                 return response()->json(['code' => 200,'message' => 'success','data' => $colors]);
              }
        }


        public function Select_color(Request $request){
              $color = Color_SubService::with(['color','subservice'])->->whereColumn([
                  ['sub_service_id', '=', $request->sub_service_id],
                  ['color_id', '=', $request->color_id]
              ])->get();
              if(count($color)<=0){
                 return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
              }else{
                 return response()->json(['code' => 200,'message' => 'success','data' => $color]);
              }
        }

          // get all images belong to specific color
        public function get_images($color_id){
              $images = Image::where('color_id',$color_id)->get();
              if(count($images)<=0){
                 return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
              }else{
                 return response()->json(['code' => 200,'message' => 'success','data' => $images]);
              }
        }
        // select one image
        public function get_image($image_id){
              $image = Image::where('id',$image_id)->get();
              if(count($image)<=0){
                 return response()->json( ['code' => 404,'message' => 'not found','data'=>[]]);
              }else{
                 return response()->json(['code' => 200,'message' => 'success','data' => $image]);
              }
        }
}
