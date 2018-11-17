<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Color;
use App\Model\Sub_service;
use App\Model\Color_SubService;
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
        return view('colors.index')->with('colors', $sub_service->colors);
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
        $sub_service->colors()->attach($color->id);
        $color->save();

        return redirect('colors.index')->with('succedd', 'New Color Added');
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
        return view('colors.edit')->with('color', $color);
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

        return redirect('colors.index')->with('success', 'Color Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_service $sub_service, Color $color)
    {
        $color->delete();

        return redirect('colors.index')->with('success', 'Color Deleted');
    }

    public function getAllColors(){
        return view('colors.index')->with('colors', Color::all());
    }
}
