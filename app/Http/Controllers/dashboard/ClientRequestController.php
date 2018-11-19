<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Client_Request;
use App\Model\Client;
use App\Model\Sub_service;
use App\Model\Color;
use App\Model\Image;
use App\Model\Class_cat;
use App\Model\Class_type;
use App\Model\Free_service;

class ClientRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Client_Request::all();
        $data = array();
        if(count($requests) > 0){
            foreach($requests as $request){
                $dataItem = new \stdClass();
                $dataItem->requestNo = $request->id;
                $dataItem->client = Client::find($request->client_id);
                $dataItem->image = Image::find($request->image_id);
                // $dataItem->sub_service = Sub_service::find($request->sub_service_id);
                // $dataItem->color = Color::find($request->color_id);
                // $dataItem->class = Class_cat::find($request->class_id);
                // $dataItem->class_type = Class_type::where(['class_cat_id'=> $request->class_id, 'sub_service_id' => $request->sub_service_id])->get();
                // $dataItem->free_service = Free_service::find($request->free_service_id);
                // $dataItem->price = $request->price;
                // $dataItem->discount_request = $request->discount_request;
                array_push($data, $dataItem);
            }
        }
        return view('requests.index')->with('data', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client_Request $request)
    {
        $dataItem = new \stdClass();
        $dataItem->requestNo = $request->id;
        $dataItem->client = Client::find($request->client_id);
        $dataItem->image = Image::find($request->image_id);
        $dataItem->sub_service = Sub_service::find($request->sub_service_id);
        $dataItem->color = Color::find($request->color_id);
        $dataItem->class = Class_cat::find($request->class_id);
        $dataItem->class_type = Class_type::where(['class_cat_id'=> $request->class_id, 'sub_service_id' => $request->sub_service_id])->get();
        $dataItem->free_service = Free_service::find($request->free_service_id);
        $dataItem->price = $request->price;
        $dataItem->discount_request = $request->discount_request;

        return view('requests.show')->with('data', $dataItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client_Request $request)
    {
        return view('requests.edit')->with('request', $request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client_Request $client_request)
    {
        $client_request->discount = $request->discount;

        return redirect('requests.index')->with('success', 'Request Updated with discount added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client_Request $request)
    {
        $request->delete();

        return redirect('requests.index')->with('success', 'request deleted');
    }

    public function getRequestByNo(Client_Request $request){
        return view('requests.index')->with('data', Client_Request::where('id', $request->id)->get());
    }

    public function getDiscounRequests(){
        $discount_requests = Client_Request::where('discount_request', '1')->get();
        $data = array();
        if(count($discount_requests) > 0){
            foreach($discount_requests as $request){
                $dataItem = new \stdClass();
                $dataItem->client = Client::find($request->client_id);
                $dataItem->requests_count = count(Client::find($request->client_id)->client_requests);
                array_push($data, $dataItem);
            }
        }
        return view('discounts.index')->with('data', $data);
    }
}
