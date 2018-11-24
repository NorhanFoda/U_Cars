<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Free_service;

class FreeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('free_services.index')->with('free_services', Free_service::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('free_services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:free_services',
        ]);

        $free_service = new Free_service;
        $free_service->name = $request->name;

        $free_service->save();

        return redirect()->route('free_services.index')->with('success', 'تمت اضافة الخدمه الاضافيه بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Free_service $free_service)
    {
        return view('free_services.edit')->with('free_service', $free_service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Free_service $free_service)
    {
        request()->validate([
            'name' => 'required|unique:free_services',
        ]);
        
        $free_service->update($request->all());

        return redirect()->route('free_services.index')->with('success', 'تم تعديل الخدمه الاضافيه بنجاح');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Free_service $free_service)
    {
        $free_service->delete();

        return redirect()->route('free_services.index')->with('success', 'تم مسح الخدمه المجانيه بنجاح');
    }
}
