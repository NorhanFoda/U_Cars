<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Client;
use App\Model\Client_Request;
use App\Model\Sub_service;
use App\Model\Color;
use App\Model\Image;
use App\Model\Class_cat;
use App\Model\Class_type;
use App\Model\Free_service;

class ClientController extends Controller
{
    public function getClients(){
        return view('clients.index')->with('clients', Client::all());
    }

    public function getClientRequests(Client $client){
        $requests = $client->client_requests;
        $data = array();
        if(count($requests) > 0){
            foreach($requests as $request){
                $dataItem = new \stdClass();
                $dataItem->client = Client::find($request->client_id);
                $dataItem->image = Image::find($request->image_id);
                $dataItem->sub_service = Sub_service::find($request->sub_service_id);
                $dataItem->color = Color::find($request->color_id);
                $dataItem->class = Class_cat::find($request->class_id);
                $dataItem->class_type = Class_type::where(['class_cat_id'=> $request->class_id, 'sub_service_id' => $request->sub_service_id])->get();
                $dataItem->free_service = Free_service::find($request->free_service_id);
                $dataItem->price = $request->price;
                $dataItem->discount_request = $request->discount_request;
                array_push($data, $dataItem);
            }
        }
        return view('clients.requests')->with('data', $data);
    }

    public function getClientByPhone($phone){
        return view('clients.index')->with('clients', Client::where('phone', $phone)->get());
    }

}
