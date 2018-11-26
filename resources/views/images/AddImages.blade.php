@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/images/save" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8 services">
                    <h1>اضافة صور</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 services">
                        <label>اختر اللون</label>
                    </div>
                    @if(count($colors) > 0)
                        <div class="col-md-8 select-text"> 
                            <select class="form-control" name="selectedColor">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <h2>لا يوجد الوان مضافة </h2>
                        <a href="/colors/add" class="btn btn-warning">اضف لون</a>
                    @endif
                </div>
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