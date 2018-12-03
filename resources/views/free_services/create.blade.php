@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('free_services.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8 services">
                <h1>اضافة خدمه اضافيه مجانيه</h1>
            </div>
            <div class="col-md-8 Services-text">
                <label for="exampleInputEmail1">اسم الخدمه</label> 
                <input type="text" name="name" class="form-control" placeholder="ادخل اسم الخدمه">
                <div class="saves">
                    <button type="submit" class="btn btn-info">حفظ </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection