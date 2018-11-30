@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 col-sm-4 col-xs-10 services">
                    <h1>اضافة خدمه</h1>
                </div>
                <div class="col-md-12 col-sm-2 col-xs-2 Services-text"> 
                    <label for="name"><h2>اسم الخدمه</h2></label>
                    <input type="text" name="name" class="form-control" placeholder="ادخل اسم الخدمه" id="serviceName">
                    <input type="file" class="form-control-file" id="image" name="image">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection