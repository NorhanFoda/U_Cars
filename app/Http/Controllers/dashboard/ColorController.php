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
    public function index()
    {
        return view('colors.index')->with('colors', Color::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        $color = new Color;
        $color->name = $request->name;

        $color->save();

        return redirect('/sub_services')->with('success', 'تمت اضافة لون للخدمه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return view('colors.show')->with('color', $color);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('colors.edit')->with('color', $color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, Color $color)
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
    public function destroy(Color $color)
    {
        $color->delete();

        return redirect('/colors')->with('success', 'تم مسح اللون بنجاح');
    }

    public function getSubServiceColors($sub_service){
        return view('colors.index')->with('colors', Sub_service::find($sub_service)->colors()->paginate(5));
    }
}
