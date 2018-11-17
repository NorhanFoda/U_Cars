<?php

namespace App\Http\Controllers\dashboard;

use App\Model\Image;
use App\Model\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Color $color)
    {
        return view('images.index')->with('images', $color->images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Color $color)
    {
        return view('images.create')->with('color', $color);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Color $color, ImageRequest $request)
    {
        $image = new Image;
        $image->name = $request->name;
        $image->price = $request->price;
        $image->code = $request->code;
        $image->color_id = $color->id;
        $image->save();

        return redirect('images.index')->with('success', 'Image Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color, Image $image)
    {
        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color, Image $image)
    {
        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Color $color, ImageRequest $request, Image $image)
    {
        $image->update($request->all());
        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color, Image $image)
    {
        $image->delete();

        return redirect('images.index')->with('success', 'Image Deleted');
    }

    public function getAllImages(){
        return view('images.index')->with('images', Image::all());
    }
}
