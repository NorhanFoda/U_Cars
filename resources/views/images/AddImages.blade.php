@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/public/images/save" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 services">
                    <h1>اضافة صور</h1>
                </div>
                <div class="row">
                    @if(count($colors) > 0)
                        <div class="col-md-8 Services-text"> 
                            <h3>اختر اللون</h3>
                        </div>
                        <div class="col-md-8 select-text"> 
                            <select class="form-control" name="selectedColor">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <h2>لا يوجد الوان مضافة </h2>
                        <a href="/public/colors/add" class="btn btn-warning">اضف لون</a>
                    @endif
                </div>
                <div class="col-md-8 services">
                    <h3>اختر قسم الخدمه</h3>
                </div>
                @if(count($sub_services) > 0)
                    <div class="col-md-8 select-text"> 
                        <select class="form-control" name="selectedSubService">
                            @foreach($sub_services as $sub_service)
                                <option value="{{$sub_service->id}}">{{$sub_service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <h2>لا يوجد اقسام خدمات مضافة </h2>
                    <a href="/public/sub_services/add" class="btn btn-warning">اضف قسم خدمه</a>
                @endif
                <div class="col-md-8 Services-text"> 
                    <div class="form-group">
                        <label for="code"><h2>الكود</h2></label>
                        <input type="text" name="code" class="form-control" placeholder="ادخل كود الصوره" id="serviceName">
                    </div>
                    <div class="form-group">
                        <label for="price"><h2>السعر</h2></label>
                        <input type="text" name="price" class="form-control" placeholder="ادخل السعر" id="serviceName">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="name">
                    </div>
                    <button type="submit" class="btn btn-warning">حفظ</button>
                </div>
            </div>
        </form>
    </div>
@endsection