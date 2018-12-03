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
      if (Gate::allows('admin-only', auth()->user())) {

        return view('classes.create');
      }
      return redirect()->route('classes.index')->with('error', 'لا يمكنك اضافة الفئة');


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
        if($request->name !== null){
            $class->name = $request->name;
        }
        else{
            return redirect()->back()->with('error', 'برجاء ادخال اسم الفئه');
        }

        $class->save();

        return redirect()->route('classes.index')->with('success', 'تمت اضافة الفئه بنجاح');
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
      if (Gate::allows('admin-only', auth()->user())) {

        return view('classes.edit')->with('class', Class_cat::find($class_cat_id));
    }
    return redirect()->route('classes.index')->with('error', 'لا يمكنك  تعديل الفئه');

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

        if($request->name !== null){
            $class->update($request->all());
        }
        else{
            return redirect()->back()->with('error', 'برجاء ادخال اسم الفئه');
        }

        return redirect()->route('classes.index')->with('success', 'تم تعديل لافئه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Class_cat  $class_cat
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_cat_id)
    {
      if (Gate::allows('admin-only', auth()->user())) {

        Class_cat::find($class_cat_id)->delete();

        return redirect()->route('classes.index')->with('ssuccess', 'تم مسح الفئه بنجاح');
      }
      return redirect()->route('classes.index')->with('error', 'لا يمكنك مسح الفئه');

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
