<?php

namespace App\Http\Controllers\dashboard;

use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index')->with('services',Service::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin-only', auth()->user())) {
        return view('services.create');
      }
      return redirect()->route('services.index')->with('error', 'لايمكنك أضافة خدمة');
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
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $service->image = $fileNameToStore;

        // $service->image = $request->image;
        $service->save();

        return redirect()->route('services.index')->with('success', 'تم اضاقة الخدمه بنجاح');
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
        if (Gate::allows('admin-only', auth()->user())) {
        return view('services.edit')->with('service', $service);
      }
      return redirect()->route('services.index')->with('error', 'لايمكنك تعديل الخدمة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->name = $request->name;

        //Handle image uploading
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $service->image = $fileNameToStore;

        // $service->image = $request->image;
        $service->save();

        return redirect()->route('services.index')->with('success', 'تم تعديل الخدمه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service){
      
      if (Gate::allows('admin-only', auth()->user())) {

        if($service->image !== 'noimage.jpg'){
            Storage::delete('public/images/'.$service->image);
        }
        $service->delete();

        return redirect()->route('services.index')->with('success', 'تم مسح الخدمه بنجاح');
      }
      return redirect()->route('services.index')->with('error', 'لا يمكنك مسح الخدمة');
    }
}
