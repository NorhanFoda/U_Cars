@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 services">
                        <h1>اضافة خدمه</h1>
                    </div>
                    <div class="col-md-8 Services-text"> 
                        <div class="form-group">
                            <label for="name"><h2>اسم الخدمه</h2></label>
                            <input type="text" name="name" class="form-control" placeholder="ادخل اسم الخدمه" id="serviceName">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-warning" style="float:left;">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection