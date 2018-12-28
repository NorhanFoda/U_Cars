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
        $data = [
            'class_types' => Class_type::where('class_cat_id', $class_cat_id)->where('sub_service_id', null)->paginate(5),
            'class_cat' => Class_cat::find($class_cat_id)
        ];

        return view('class_types.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($class_cat_id)
    {
      if (Gate::allows('admin-only', auth()->user())) {

        return view('class_types.create')->with('class', Class_cat::find($class_cat_id));
      }
        return redirect('/public/classes')->with('error', 'لا يمكنك اضافة الفئة');


    }

    public function AddType(){
      if (Gate::allows('admin-only', auth()->user())) {

        return view('class_types.addType')->with('classes', Class_cat::all());
      }
        return redirect('/public/classes')->with('error', 'لا يمكنك الاضافة');
    }

    public function SaveAddedType(Class_typeRequest $request){
        $class_type = new Class_type;

        if($request->name !== null && $request->selectedClass !== null){
            $class_type->name = $request->name;
            $class_type->class_cat_id = $request->selectedClass;
        }
        else{
            return redirect()->back()->with('error', 'برجاء اختيار الفئه و ادخال النوع');
        }

        $class_type->save();

        return redirect('/public/classes')->with('success', 'تمت اضافة النوع بنجاح');
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

    public function store($class_cat_id, Class_typeRequest $request){
        $class_type = new Class_type;
        $class_type->name = $request->name;
        $class_type->class_cat_id = $class_cat_id;
        $class_type->save();

        return redirect('/public/classes')->with('success', 'تمت اضافة النوع بنجاح');
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
      if (Gate::allows('admin-only', auth()->user())) {

        $data = [
            'class' => Class_cat::find($class_cat_id),
            'type' => Class_type::find($class_type_id)
        ];
        return view('class_types.edit')->with($data);

      }
        return redirect('/public/classes')->with('error', 'لا يمكنك اضافة الفئة');
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

    public function update($class_cat_id, Class_typeRequest $request, $class_type_id){
      if (Gate::allows('admin-only', auth()->user())) {
        $class_type = Class_type::find($class_type_id);
        $class_type->update($request->all());

        return redirect('/public/classes')->with('success', 'تم تعديل النوع بنجاح');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Class_type  $class_type
     * @return \Illuminate\Http\Response
     */

     
    public function destroy($class_cat_id, $class_type_id)
    {
      if (Gate::allows('admin-only', auth()->user())) {
        Class_type::find($class_type_id)->delete();
        return redirect('/public/classes')->with('success', 'تم مسح النوع بنجاح');
      }
    }

    public function deleteClassTypeForService($sub_service_id, $class_cat_id, $class_type_id){
      if (Gate::allows('admin-only', auth()->user())) {

        Class_type::find($class_type_id)->delete();

        return redirect('class_types.index')->with('success', 'Type Deleted');
      }
    }
}
