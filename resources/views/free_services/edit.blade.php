@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('free_services.update', $free_service->id)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT')}} 
        <div class="row">
            <div class="col-md-8 services">
                <h1>تعديل الخدمه الاضافيه ({{$free_service->name}})</h1>
            </div>
            <div class="col-md-8 Services-text">
                <label for="exampleInputEmail1">اسم الخدمه</label> 
                <input type="text" name="name" class="form-control" value="{{$free_service->name}}">
                <div class="saves">
                    <button type="submit" class="btn btn-info">حفظ التعديلات</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection