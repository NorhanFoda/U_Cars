@extends('layouts.app')
@section('content')

<div class="colors"> 
    <div class="container">

    <div class="row">
        <div class="servicesColors">
            <div class="add">
                <form action="{{ route('sub_services.update', [$service->id, $sub_service->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 services">
                            <h1>تعديل قسم {{$sub_service->name}} فى خدمة ({{$service->name}})</h1>
                            <hr>
                        </div>
                        <div class="col-md-8 Services-text"> 
                            <label>اسم قسم الخدمه</label>
                            <input type="text" name="name" class="form-control" value="{{ $sub_service->name }}">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputTime">مدة الضمان</label>
                            <input type="text" name="guarantee"class="form-control" value="{{ $sub_service->guarantee }}">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputDelete">الإزاله المجانيه</label>
                            <input type="text" name="free_removal" class="form-control" value="{{ $sub_service->free_removal }}">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputTime">الاشتراطات </label>
                            <input type="text" name="requirements" class="form-control" value="{{ $sub_service->requirements }}">
                        </div>
                        <div class="col-md-12 Services-text2">
                            <label for="exampleInputDescribe">المواصفات </label>
                            <input type="text" name="details" class="form-control" value="{{ $sub_service->details }}">
                        </div>
                        <div class="col-md-12  Services-text3">
                            <label for="">ملاحظات</label>
                            <textarea class="form-control" name="notes" rows="3" cols="30" value="{{ $sub_service->notes }}"></textarea>
                            </textarea>
                        </div>
                        <div class="col-md-12 Services-checkbox">
                            @if($sub_service->free_polishing === 1)
                                <input type="checkbox" class="check-with-size" name="free_polishing" checked> <label>التلميع المجانى</label>
                                <label for="exampleInputlight">تلميع مجاني</label>
                            @else
                                <input type="checkbox" class="check-with-size" name="free_polishing"> <label>التلميع المجانى</label>
                                <label for="exampleInputlight">تلميع مجاني</label>
                            @endif
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
                                    <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
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