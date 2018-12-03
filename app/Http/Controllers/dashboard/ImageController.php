<?php

namespace App\Http\Controllers\dashboard;

use App\Model\Image;
use App\Model\Color;
use App\Model\Sub_service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Color $color)
    {
        return view('images.index')->with('images', $color->images()->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Color $color)
    {
      if (Gate::allows('admin-only', auth()->user())) {

            $data = [
                'color' => $color,
                'sub_services' => Sub_service::all()
            ];
            return view('images.create')->with($data);
      }
      return redirect('/public/images')->with('error', 'لا يمكنك اضافة صورة');

    }

    public function AddImages(){
        $data = [
            'colors' => Color::all(),
            'sub_services' => Sub_service::all()
        ];
        return view('images.addImages')->with($data);
    }

    public function SaveAddedImages(ImageRequest $request){
        $image = new Image;
        $image->price = $request->price;
        $image->code = $request->code;
        $image->color_id = $request->selectedColor;

        //Handle image uploading
        if($request->hasFile('name')){
            $filenameWithExt = $request->file('name')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('name')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('name')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $image->name = $fileNameToStore;

        if($request->selectedSubService !== null){
            $image->sub_service_id = $request->selectedSubService;
        }
        else{
            return redirect()->back()->with('error', 'برجاء اختيار قسم الخدمه');
        }

        $image->save();

        return redirect('/public/images')->with('success', 'تمت اضافة الصوره بنجاح');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Color $color , ImageRequest $request)
    {
        $image = new Image;
        $image->price = $request->price;
        $image->code = $request->code;
        $image->color_id = $color->id;
        $image->sub_service_id = $request->selectedSubService;

        //Handle image uploading
        if($request->hasFile('name')){
            $filenameWithExt = $request->file('name')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('name')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('name')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $image->name = $fileNameToStore;

        $image->save();

        return redirect('/public/colors')->with('success', 'تمت اضافة الصوره بنجاح');
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
      if (Gate::allows('admin-only', auth()->user())) {

        $data = [
            'image' => $image,
            'color' => $color
        ];
        return view('images.edit')->with($data);
      }
      return redirect('/public/images')->with('error', 'لا يمكنك تعديل الصورة ');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Color $color, Request $request, Image $image)
    {
        $image = Image::find($image->id);
        $image->price = $request->price;
        $image->code = $request->code;
        $image->color_id = $color->id;

        //Handle image uploading
        if($request->hasFile('name')){
            $filenameWithExt = $request->file('name')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('name')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('name')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $image->name = $fileNameToStore;

        $image->save();

        return redirect('/public/images')->with('success', 'تم تعديل الصوره بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color, Image $image)
    {
      if (Gate::allows('admin-only', auth()->user())) {
        if($image->name !== 'noimage.jpg'){
            Storage::delete('public/images/'.$image->name);
        }
        $image->delete();

        return redirect('/public/images')->with('success', 'تم مسح الصوره بنجاح');
      }
      return redirect('/public/images')->with('error', 'لا يمكنك مسح الصورة ');

    }

    public function getAllImages(){
        return view('images.index')->with('images', Image::paginate(5));
    }
}
