@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('requests.update', $request->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT')}} 
            <div class="row">
                <div class="col-md-8 services">
                    <h1>تعديل الطلب</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <label>ادخل السعر</label>
                    <input value="{{$request->price}}" type="text" name="price"  class="form-control">
                </div>
                <div class="col-md-8 Services-text"> 
                    <label>ادخل الخصم</label>
                    <input value="{{$request->discount}}" type="text" name="discount"  class="form-control">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ الخصم</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection