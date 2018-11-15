<?php

namespace App\Http\Controllers\dashboard;

use App\Model\Sub_service;
use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\SubServiceRequest;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {
        return $service->sub_services;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        return 'create view';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Service $service,SubServiceRequest $request)
    {
        $sub_service = new Sub_service;
        $sub_service->name = $request->name;

        // if($request->hasFile('image')){
        //     $filenameWithExt = $request->file('image')->getClientOriginalName();
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $ext = $request->file('image')->getClientOriginalExtension();
        //     $fileNameToStore = $filename.'_'.time().'.'.$ext;
        //     $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        // }else{
        //     $fileNameToStore = 'noimage.jpg';
        // }
        // $service->image = $fileNameToStore;

        $sub_service->image = $request->image;
        $sub_service->details = $request->details;
        $sub_service->guarantee = $request->guarantee;
        $sub_service->free_removal = $request->free_removal;
        $sub_service->notes = $request->notes;
        $sub_service->service_id = $service->id;
        $sub_service->requirements = $request->requirements;
        if($request->free_polishing == null){
            $sub_service->free_polishing = '0';
        }
        else{
            $sub_service->free_polishing = '1';
        }

        $sub_service->save();

        return response(['data' => $sub_service], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service,Sub_service $sub_service)
    {
        return $sub_service;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_service $sub_service)
    {
        return 'edit view';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service, SubServiceRequest $request, Sub_service $sub_service)
    {
        $sub_service->name = $request->name;

        // if($request->hasFile('image')){
        //     $filenameWithExt = $request->file('image')->getClientOriginalName();
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $ext = $request->file('image')->getClientOriginalExtension();
        //     $fileNameToStore = $filename.'_'.time().'.'.$ext;
        //     $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        // }else{
        //     $fileNameToStore = 'noimage.jpg';
        // }
        // $service->image = $fileNameToStore;

        $sub_service->image = $request->image;
        $sub_service->details = $request->details;
        $sub_service->guarantee = $request->guarantee;
        $sub_service->free_removal = $request->free_removal;
        $sub_service->notes = $request->notes;
        $sub_service->service_id = $service->id;
        $sub_service->requirements = $request->requirements;
        if($request->free_polishing == null){
            $sub_service->free_polishing = '0';
        }
        else{
            $sub_service->free_polishing = '1';
        }

        $sub_service->save();

        return response(['data' => $sub_service], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, Sub_service $sub_service)
    {
        $sub_service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    } 
    
    public function getAllSubServices(){
        return Sub_service::all();
    }
}
