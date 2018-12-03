<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Color;
use App\Model\Sub_service;
use App\Model\Color_SubService;
use App\Model\Image;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sub_service $sub_service)
    {
        $data = [
            'colors' => $sub_service->colors()->paginate(5),
            'sub_service' => $sub_service
        ];

        return view('colors.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sub_service $sub_service)
    {
      if (Gate::allows('admin-only', auth()->user())) {

        return view('colors.create')->with('sub_service', $sub_service);
     }
        return redirect('/public/colors')->with('error', 'لا يمكنك اضافة اللون');

    }

    public function AddColors(){
      if (Gate::allows('admin-only', auth()->user())) {

          return view('colors.addColors');
      }
          return redirect('/public/colors')->with('error', 'لا يمكنك اضافة اللون');


    }

    public function SaveAddedColors(ColorRequest $request){

        $color = new Color;
        $color->name = $request->name;

        $color->save();

        return redirect('/public/colors')->with('success', 'تمت اضافة اللون بنجاح');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sub_service $sub_service, ColorRequest $request)
    {
        $color = new Color;
        $color->name = $request->name;

        $color->save();

        $sub_service->colors()->attach($color->id);


        return redirect('/public/sub_services')->with('success', 'تمت اضافة لون للخدمه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_service $sub_service, Color $color)
    {

        return view('colors.show')->with('color', $color);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_service $sub_service, Color $color)
    {
      if (Gate::allows('admin-only', auth()->user())) {

        $data = [
            'sub_service' => $sub_service,
            'color' => $color
        ];

        return view('colors.edit')->with($data);
      }
        return redirect('/public/colors')->with('error', 'لا يمكنك تعديل اللون');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Sub_service $sub_service, ColorRequest $request, Color $color)
    {
        $color->update($request->all());

        return redirect('/public/colors')->with('success', 'تم تعديل اللون بنجاح');
    }

    public function editColors(Color $color){
        return view('colors.editColor')->with('color', $color);
    }

    public function updateColors(ColorRequest $request, Color $color){
        $color->update($request->all());

        return redirect('/public/colors')->with('success', 'تم تعديل اللون بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_service $sub_service,Color $color)
    {
      if (Gate::allows('admin-only', auth()->user())) {

          $color->delete();

          return redirect('/public/colors')->with('success', 'تم مسح اللون بنجاح');
      }
          return redirect('/public/colors')->with('error', 'لا يمكنك مسح اللون');

    }

    public function deleteColors(Color $color){
      if (Gate::allows('admin-only', auth()->user())) {

        $color->delete();

        return redirect('/public/colors')->with('success', 'تم مسح اللون بنجاح');
      }
         return redirect('/public/colors')->with('error', 'لا يمكنك مسح اللون');

    }

    // public function getSubServiceColors($sub_service){
    //     return view('colors.index')->with('colors', Sub_service::find($sub_service)->colors()->paginate(5));
    // }

    public function getAllColors(){
        return view('colors.index')->with('colors', Color::paginate(5));
    }
}
