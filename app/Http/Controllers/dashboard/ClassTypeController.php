<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Model\Class_type;
use App\Model\Class_cat;
use App\Model\Sub_service;
use Illuminate\Http\Request;
use App\Http\Requests\Class_typeRequest;

class ClassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_cat_id)
    {
        $class_types = Class_type::where('class_cat_id', $class_cat_id)->get();
        
        return view('class_types.index')->with('types', $class_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($class_cat_id)
    {
        return view('class_types.create')->with('class', Class_cat::find($class_cat_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function postClassTypeForSubservice($sub_service_id, $class_cat_id, Class_typeRequest $request)
    {
        return 'you are here';
        $class_type = new Class_type;
        $class_type->name = $request->name;
        $class_type->sub_service_id = $sub_service_id;
        $class_type->class_cat_id = $class_cat_id;
        $class_type->save();

        return redirect('class_types.index')->with('success', 'Type created');
    }

    public function postClassTypeForClass($class_cat_id, Class_typeRequest $request){
        $class_type = new Class_type;
        $class_type->name = $request->name;
        $class_type->class_cat_id = $class_cat_id;
        $class_type->save();

        return redirect('class_types.index')->with('success', 'Type created');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Class_type  $class_type
     * @return \Illuminate\Http\Response
     */
    public function show(Class_type $class_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Class_type  $class_type
     * @return \Illuminate\Http\Response
     */
    public function edit($class_cat_id, $class_type_id)
    {
        return view('class_types.edit')->with('type', Class_type::find($class_type_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Class_type  $class_type
     * @return \Illuminate\Http\Response
     */
    public function updateClassTypeForSubservice($sub_service_id, $class_cat_id, Class_typeRequest $request, $class_type_id)
    {
        $class_type = Class_type::find($class_type_id);
        $class_type->update($request->all());

        return redirect('class_types.index')->with('success', 'Type Updated');
    }

    public function updateClassTypeForClass($class_cat_id, Class_typeRequest $request, $class_type_id){

        $class_type = Class_type::find($class_type_id);
        $class_type->update($request->all());

        return redirect('class_types.index')->with('success', 'Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Class_type  $class_type
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_cat_id, $class_type_id)
    {
        Class_type::find($class_type_id)->delete();

        return redirect('class_types.index')->with('success', 'Type Deleted');
    }

    public function deleteClassTypeForService($sub_service_id, $class_cat_id, $class_type_id){

        Class_type::find($class_type_id)->delete();

        return redirect('class_types.index')->with('success', 'Type Deleted');
    }
}
