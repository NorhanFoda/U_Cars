<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Model\Class_cat;
use App\Model\Sub_service;
use App\Model\Class_type;
use Illuminate\Http\Request;
use App\Http\Requests\Class_catRequest;

class ClassCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classes.index')->with('classes', Class_cat::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Class_catRequest $request)
    {
        $class = new Class_cat;
        $class->name = $request->name;
        $class->save();

        return redirect('classes.index')->with('success', 'Class Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Class_cat  $class_cat
     * @return \Illuminate\Http\Response
     */
    public function show($class_cat_id)
    {
        return view('classes.show')->with('class', Class_cat::find($class_cat_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Class_cat  $class_cat
     * @return \Illuminate\Http\Response
     */
    public function edit($class_cat_id)
    {
        return view('classes.edit')->with('class', Class_cat::find($class_cat_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Class_cat  $class_cat
     * @return \Illuminate\Http\Response
     */
    public function update(Class_catRequest $request, $class_cat_id)
    {
        $class = Class_cat::find($class_cat_id);
        $class->update($request->all());

        return redirect('classes.index')->with('success', 'Class Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Class_cat  $class_cat
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_cat_id)
    {
        Class_cat::find($class_cat_id)->delete();

        return redirect('classes.index')->with('ssuccess', 'Class Deleted');
    }

    public function getSubServiceClasses(Sub_service $sub_service){
        $class_types = Class_type::where('sub_service_id', $sub_service->id)->get();
        $classes = array();
        if(count($class_types) > 0){
            foreach($class_types as $class_type){
                array_push($classes, Class_cat::find($class_type->class_cat_id));
            }
        }

        return view('classes.index')->with('classes', $classes);
    }
}
