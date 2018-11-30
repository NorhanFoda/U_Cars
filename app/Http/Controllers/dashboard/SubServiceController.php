<?php

namespace App\Http\Controllers\dashboard;

use App\Model\Sub_service;
use App\Model\Service;
use App\Model\Color;
use App\Model\Class_cat;
use App\Model\Class_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\SubServiceRequest;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {
        $data = [
            'sub_services' => $service->sub_services()->paginate(5),
            'service' => $service
        ];
        return view('sub_services.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        $data = [
            'service' => $service,
            'colors' => Color::all(),
            'classes' => Class_cat::whereIn('id', Class_type::pluck('class_cat_id'))->get(),
            'types' => Class_type::all(),
            'noTypeClasses' => Class_cat::whereNotIn('id', Class_type::pluck('class_cat_id'))->get()
        ];

        return view('sub_services.create')->with($data);
    }

    public function AddSubServices(){
        $data = [
            'services' => Service::all(),
            'colors' => Color::all(),
            'classes' => Class_cat::whereIn('id', Class_type::pluck('class_cat_id'))->get(),
            'types' => Class_type::all(),
            'noTypeClasses' => Class_cat::whereNotIn('id', Class_type::pluck('class_cat_id'))->get()
        ];

        return view('sub_services.addSubService')->with($data);
    }

    public function SaveAddedSubServices(SubServiceRequest $request){
        $sub_service = new Sub_service;
        $sub_service->name = $request->name;

        //Handle image uploading
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $sub_service->image = $fileNameToStore;

        // $sub_service->image = $request->image;
        $sub_service->details = $request->details;
        $sub_service->guarantee = $request->guarantee;
        $sub_service->free_removal = $request->free_removal;
        $sub_service->notes = $request->notes;
        $sub_service->service_id = $request->selectedService;
        $sub_service->requirements = $request->requirements;
        if($request->free_polishing === 'on'){
            $sub_service->free_polishing = '1';
        }
        else{
            $sub_service->free_polishing = '0';
        }

        $sub_service->save();

        //add colors
        if($request->colors !== null){
            foreach($request->colors as $color){
                $sub_service->colors()->attach(Color::find($color));
            }
        }

        //add class_types
        if($request->classes !== null){
            foreach($request->classes as $class){
                $type_names = Class_type::where('class_cat_id', $class)->where('sub_service_id', null)->get(); 
                foreach($type_names as $type_name){
                    $type = new Class_type;
                    $type->class_cat_id = $class;
                    $type->sub_service_id = $sub_service->id;
                    $type->name = $type_name->name;
                    $price = "price".$type_name->id;
                    $discount = "discount".$type_name->id;
                    $type->price = $request->$price;
                    $type->discount = $request->$discount;
                    $type->save();
                }
            }
        }

        return redirect('/public/sub_services')->with('success', 'تمت اضافة قسم الخدمه بنجاح');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Service $service,SubServiceRequest $request)
    {
        $sub_service = new Sub_service;
        $sub_service->name = $request->name;

        //Handle image uploading
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $sub_service->image = $fileNameToStore;

        // $sub_service->image = $request->image;
        $sub_service->details = $request->details;
        $sub_service->guarantee = $request->guarantee;
        $sub_service->free_removal = $request->free_removal;
        $sub_service->notes = $request->notes;
        $sub_service->service_id = $service->id;
        $sub_service->requirements = $request->requirements;
        if($request->free_polishing === 'on'){
            $sub_service->free_polishing = '1';
        }
        else{
            $sub_service->free_polishing = '0';
        }

        $sub_service->save();

        //add colors
        if($request->colors !== null){
            foreach($request->colors as $color){
                $sub_service->colors()->attach(Color::find($color));
            }
        }

        //add class_types
        if($request->classes !== null){
            foreach($request->classes as $class){
                $type_names = Class_type::where('class_cat_id', $class)->where('sub_service_id', null)->get(); 
                foreach($type_names as $type_name){
                    $type = new Class_type;
                    $type->class_cat_id = $class;
                    $type->sub_service_id = $sub_service->id;
                    $type->name = $type_name->name;
                    $price = "price".$type_name->id;
                    $discount = "discount".$type_name->id;
                    $type->price = $request->$price;
                    $type->discount = $request->$discount;
                    $type->save();
                }
            }
        }

        return redirect()->route('services.index')->with('success', 'تمت اضافة قسم للخدمه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service,Sub_service $sub_service)
    {
        $types = Class_type::where('sub_service_id', $sub_service->id)->get();
        // return $types;
        $classes = array();
        if(count($types) > 0){
            foreach ($types as $type) {
                array_push($classes, Class_cat::find($type->class_cat_id));
            }
        }

        $data = [
            'service' => $service,
            'sub_service' => $sub_service,
            'colors' => $sub_service->colors,
            'types' => $types,
            'classes' => array_unique($classes)
        ];
        return view('sub_services.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, Sub_service $sub_service)
    {
        $sub_services_classes = Class_type::where('sub_service_id', $sub_service->id)->get();
        $data = [
            'service' => $service,
            'colors' => Color::all(),
            'classes' => Class_cat::all(),
            'types' => Class_type::all(),
            'sub_service' => Sub_service::find($sub_service->id),
            'sub_services_classes' => $sub_services_classes,
            // 'sub_services_colors' => $sub_service->colors
        ];
        return view('sub_services.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service, Request $request, Sub_service $sub_service)
    {
        $sub_service->name = $request->name;

        // Handle image uploading
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $service->image = $fileNameToStore;

        // $sub_service->image = $request->image;

        $sub_service->details = $request->details;
        $sub_service->guarantee = $request->guarantee;
        $sub_service->free_removal = $request->free_removal;
        $sub_service->notes = $request->notes;
        $sub_service->service_id = $service->id;
        $sub_service->requirements = $request->requirements;
        if($request->free_polishing == null){
            $sub_service->free_polishing = '0';
        }
        else{
            $sub_service->free_polishing = '1';
        }

        $sub_service->save();

        //delete old colors
        if(count($sub_service->colors) > 0){
            foreach($sub_service->colors as $color){
                $sub_service->colors()->detach($color);
            }
        }
        
        //delete old class_types
        $classes = Class_type::where('sub_service_id', $sub_service->id)->get();
        if(count($classes) > 0){
            foreach($classes as $class){
                $class->delete();
            }
        }

        //add new colors
        if($request->colors !== null){
            foreach($request->colors as $color){
                $sub_service->colors()->attach(Color::find($color));
            }
        }

        //add new class_types
        if($request->classes !== null){
            foreach($request->classes as $class){
                $type_names = Class_type::where('class_cat_id', $class)->where('sub_service_id', null)->get(); 
                foreach($type_names as $type_name){
                    $type = new Class_type;
                    $type->class_cat_id = $class;
                    $type->sub_service_id = $sub_service->id;
                    $type->name = $type_name->name;
                    $price = "price".$type_name->id;
                    $discount = "discount".$type_name->id;
                    $type->price = $request->$price;
                    $type->discount = $request->$discount;
                    $type->save();
                }
            }
        }

        return redirect('/public/sub_services')->with('success', 'تم تعديل قسم الخدمه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Sub_service  $sub_service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, Sub_service $sub_service)
    {
        $sub_service->delete();

        return redirect('/public/services')->with('success', 'تم مسح قسم الخدمه بنجاح');
    } 
    
    public function getAllSubServices(){
        return view('sub_services.index')->with('sub_services', Sub_service::paginate(5));
    }
}
