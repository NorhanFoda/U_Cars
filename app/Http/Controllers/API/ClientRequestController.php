<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\Client_Request;
use App\Model\Free_Service;
use App\Model\Class_type;


class ClientRequestController extends Controller
{
  public function addToCart(Request $request,$subservice_id){
    $input = $request->all();
    $order1 = [
        'sub_service_id'   => $subservice_id,
        'color_id' => $request->has('color_id') ? $input['color_id'] : null,
        'image_id'    => $request->has('image_id') ? $input['image_id'] : null,
        'class_id'   => $request->has('class_id') ? $input['class_id'] : null,
        'free_service_id' => $request->has('freeservice_id') ? $input['freeservice_id'] : null,
        'client_id'    => $request->has('client_id') ? $input['client_id'] : null
    ];


      if($request->has('classtype_id')){

              $class = Class_type::where('id', $input['classtype_id'])->get();
              $price=$class[0]->price;
              $discount=$class[0]->discount;
              $order2=[
                'price'     => $price,
                'discount_request'    => $request->has('discount_request') ? $input['discount_request'] : 0,
                'discount'   => $discount,
                'classtype_id' => $request->classtype_id ];


    }else{
              $image = Image::where('id',$input['image_id'])->get();

              if(count($image)>0){
                $order2=[
                  'price'     => $price,
                  'discount_request'    => $request->has('discount_request') ? $input['discount_request'] : 0,
                  'discount'   => $request->has('discount') ? $input['discount'] : null,
                  'classtype_id' => null];

              }else{
              $order2=[
                'price'     => 0,
                'discount_request'    => $request->has('discount_request') ? $input['discount_request'] : 0,
                'discount'   => $request->has('discount') ? $input['discount'] : null,
                'classtype_id' => null];
            }
         }

    $order_data = array_merge($order1,$order2 );
    $add_order = Client_Request::create($order_data);
    if($add_order){
      $order=Client_Request::with(['color','image','sub_service','free_service','class_type','client','sub_service.service'])
      ->where('id', $add_order->id)->get();
      return response()->json(['code' => 200,'message' => 'success','data' => $order]);


    }else{
      return response()->json(['code' => 404,'message' => 'faild','data' => []]);

    }
  }

    public function discountRequest(Request $request,$request_id){
      $client = Client_Request::where('client_id', $request->client_id)
      ->where('id',$request_id)->get();
      if(count($client)>0){
        if(count(Client_Request::all())>1){

              $request = Client_Request::where('id',$request_id )
              ->update(['discount_request' =>  1]);
              return response()->json(['code' => 200,'message' => 'success','data' => $client]);
        }else{
          return response()->json(['code' => 404,'message' => 'faild you are new client ','data' => []]);
        }
      }else{
        return response()->json(['code' => 404,'message' => 'faild ','data' => []]);

      }
    }

    public function get_orders(){
        $services = Client_Request::with(['color','image','sub_service','free_service','class_type','client'])->get();
        if(count($services)>0){
        return response()->json(['code' => 200,'message' => 'success','data' => $services]);
      }else{
        return response()->json(['code' => 404,'message' => 'not found','data' => []]);

      }
      }

    public function delete_order($order_id){
        $order = Client_Request::where('id',$order_id)->find($order_id);
        if(empty($order)){
            return response()->json(['code' => 404,'message' => 'not found','data' => []]);
        }else{
          $order->delete();
          return response()->json(['code' => 200,'message' => 'success','data' => []]);

        }
    }


   public function change_image($request_id,Request $request){

          $check_request=Client_Request::where('id',$request_id)->find($request_id);
          if(empty($check_request)){
               return response()->json(['code' => 404,'message' => 'not found','data' => []]);
          }else{
               $image=Client_Request::where('id', $request_id)->update(array('image_id' => $request->image_id));
               return response()->json(['code' => 200,'message' => 'success','data' => $image]);

          }
    }



}
