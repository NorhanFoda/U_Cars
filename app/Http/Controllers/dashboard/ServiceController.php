<?php

namespace App\Http\Controllers\dashboard;

use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index')->with('services',Service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service;
        $service->name = $request->name;

        //Handle image uploading
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
        
        $service->image = $request->image;
        $service->save();

        return response(['data' => $service], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->name = $request->name;

        //Handle image uploading
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
        
        $service->image = $request->image;
        $service->save();

        return response(['data' => $service], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('services.index')->with('success', 'Service Deleted');
    }
}
