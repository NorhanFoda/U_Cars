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
        return view('colors.create')->with('sub_service', $sub_service);
    }

    public function AddColors(){
        return view('colors.addColors');
    }

    public function SaveAddedColors(ColorRequest $request){

        $color = new Color;
        $color->name = $request->name;

        $color->save();

        return redirect('/colors')->with('success', 'تمت اضافة اللون بنجاح');
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
        

        return redirect('/sub_services')->with('success', 'تمت اضافة لون للخدمه بنجاح');
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
        $data = [
            'sub_service' => $sub_service,
            'color' => $color
        ];

        return view('colors.edit')->with($data);
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

        return redirect()->route('colors.index')->with('success', 'تم تعديل اللون بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_service $sub_service,Color $color)
    {
        $color->delete();

        return redirect('/colors')->with('success', 'تم مسح اللون بنجاح');
    }

    // public function getSubServiceColors($sub_service){
    //     return view('colors.index')->with('colors', Sub_service::find($sub_service)->colors()->paginate(5));
    // }

    public function getAllColors(){
        return view('colors.index')->with('colors', Color::paginate(5));
    }
}
