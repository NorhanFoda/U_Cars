<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Client_Request;
use App\Model\Client;
use App\Model\Sub_service;
use App\Model\Service;
use App\Model\Color;
use App\Model\Image;
use App\Model\Class_cat;
use App\Model\Class_type;
use App\Model\Free_service;

use App\Http\Requests\ClientReqRequest;

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
                $dataItem->sub_service = Sub_service::find($request->sub_service_id);
                $dataItem->service = Service::find($dataItem->sub_service->service);
                array_push($data, $dataItem);
            }
            $data2 = [
                'data' => $data,
                'clientName' => Client::find($request->client_id)->name
            ];
        }
        else{
            $data2 = [
                'data' => $data,
                'clientName' => null
            ];
        }
        // return view('requests.index')->with('data', $data);
        return view('requests.index')->with($data2);
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
        $dataItem->service = Service::find($dataItem->sub_service->service_id);
        $dataItem->color = Color::find($request->color_id);
        $dataItem->class = Class_cat::find($request->class_id);
        $dataItem->class_type = Class_type::where(['class_cat_id'=> $request->class_id, 'sub_service_id' => $request->sub_service_id])->get();
        $dataItem->free_service = Free_service::find($request->free_service_id);
        $dataItem->price = $request->price;
        $dataItem->discount = $request->discount;
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
        return $request;
      if (Gate::allows('admin-only', auth()->user())) {

        return view('requests.edit')->with('request', $request);

      }
        return redirect()->route('requests.index')->with('error', 'لا يمكنك تعديل الطلب');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientReqRequest $request, $client_request_id)
    {
        $client_request = Client_Request::find($client_request_id);
        if($request->price){
            $client_request->discount = $request->discount;
            $client_request->price = $request->price;
            $client_request->save();
            return redirect()->route('requests.index')->with('success', '  تم تعديل الطلب بنجاح ');
        }
        else{
            $client_request->discount = $request->discount;
            $client_request->save();
            return redirect()->route('discounts.index')->with('success', 'تم قبول الطلب   ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client_Request $request)
    {
      if (Gate::allows('admin-only', auth()->user())) {

        $request->delete();

        return redirect()->route('requests.index')->with('success', 'تم مسح الطلب بنجاح');
      }
        return redirect()->route('requests.index')->with('error', 'لا يمكنك مسح الطلب');


    }

    public function getRequestByNo(Request $request){
        $found_request = Client_Request::where('id', $request->requestNo)->get();
        $data = array();
        if(count($found_request) > 0){
            foreach($found_request as $req){
                $dataItem = new \stdClass();
                $dataItem->requestNo = $req->id;
                $dataItem->client = Client::find($req->client_id);
                $dataItem->sub_service = Sub_service::find($req->sub_service_id);
                $dataItem->service = Service::find($dataItem->sub_service->service);
                array_push($data, $dataItem);
            }
            // $data2 = [
            //     'data' => $data,
            //     // 'clientName' => Client::find($found_request[0]->client_id)->name
            // ];
        }
        else{
            // $data2 = [
            //     'data' => $data,
            //     'clientName' => null
            // ];
        }
        return view('requests.index')->with('data', $data);
        // return view('requests.index')->with($data2);
    }

    public function getDiscounRequests(){
        $discount_requests = Client_Request::where('discount_request', '1')->get();
        $data = array();
        if(count($discount_requests) > 0){
            foreach($discount_requests as $request){
                $dataItem = new \stdClass();
                $dataItem->requestNo = $request->id;
                $dataItem->discount = $request->discount;
                $dataItem->discount_request = $request->discount_request;
                $dataItem->client = Client::find($request->client_id);
                $dataItem->sub_service = Sub_service::find($request->sub_service_id);
                $dataItem->service = Service::find($dataItem->sub_service->service);
                $dataItem->requests_count = count(Client::find($request->client_id)->client_requests);
                array_push($data, $dataItem);
            }
        }
        return view('discounts.index')->with('data', $data);
    }
}
