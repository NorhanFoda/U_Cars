@extends('layouts.app')
@section('content')
<div class="colors"> 
    <div class="container">

    <div class="row">
        <div class="servicesColors">
            <div class="add">
                <form action="{{ route('sub_services.store', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 services">
                            <h1>اضافة قسم الخدمه</h1>
                            <hr>
                        </div>
                        <div class="col-md-8 Services-text"> 
                            <label>اسم قسم الخدمه</label>
                            <input type="text" name="name" class="form-control" placeholder="ادخل اسم الخدمه" id="serviceName">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputTime">مدة الضمان</label>
                            <input type="text" name="guarantee"class="form-control" placeholder="ادخل مدة الضمان">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputDelete">الإزاله المجانيه</label>
                            <input type="text" name="free_removal" class="form-control" placeholder="ادخل الازاله المجانيه ان وجد">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputTime">الاشتراطات </label>
                            <input type="text" name="requirements" class="form-control" placeholder="ادخل الاشتراطات">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputDescribe">المواصفات </label>
                            <input type="text" name="details" class="form-control" placeholder="ادخل مواصفات الخدمه">
                        </div>
                        <div class="col-md-12  Services-text3">
                            <label for="">ملاحظات</label>
                            <textarea class="form-control" name="notes" rows="3" cols="30" placeholder="ادخل الملاحظات"></textarea>
                            </textarea>
                        </div>
                        <div class="col-md-12 Services-checkbox">
                            <input type="checkbox" class="check-with-size" name="free_polishing"> <label>التلميع المجانى</label>
                            <label for="exampleInputlight">تلميع مجاني</label>
                        </div>
                        @if(count($colors) > 0)
                            <div class="col-md-10 colors">
                                <h2>اختر لون الخدمه :</h2>
                                @foreach($colors as $color)
                                    <div class="col-md-4">
                                        <input type="checkbox" name="colors[]" value="{{$color->id}}" > <label for="">{{$color->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h2>لا يوجد الوان مضافه لهذه الخدمه</h2>
                        @endif
                        @if(count($classes) > 0)
                            <div class="col-md-12 categorie">
                                <h2>اختر الفئه لتحديد السعر</h2>
                                @foreach($classes as $class)
                                    <div>
                                        <div class="col-md-12">
                                            <input type="checkbox" name="classes[]" value="{{$class->id}}" > <label for="">{{$class->name}}</label>
                                        </div>
                                        @if(count($types) > 0)
                                            @foreach($types as $type)
                                                @if($type->class_cat_id === $class->id && $type->sub_service_id === null)
                                                    <div class="col-md-12 service">
                                                        <div>{{ $type->name }}</div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="price{{$type->id}}" class="form-control" placeholder="ادخل سعر الخدمه">
                                                        </div>
                                                        <div class="col-md-3 second">
                                                            <input type="text" name="discount{{$type->id}}" class="form-control" placeholder="ادخل الخصم للخدمه">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning">حفظ قسم الخدمه</button>
                                </div>
                            </div>	
                        @else
                            <h2>لا يوجد فئات مضافه لهذه الخدمه</h2>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection