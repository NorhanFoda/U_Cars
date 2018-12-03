@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT')}} 
                <div class="row">
                    <div class="col-md-8 services">
                        <h1>اضافة خدمه</h1>
                    </div>
                    <div class="col-md-8 Services-text"> 
                        <div class="form-group">
                            <label for="name"><h2>اسم الخدمه</h2></label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                placeholder="ادخل اسم الخدمه" 
                                id="serviceName"
                                value="{{ $service->name }}">
                        </div>
                        <div class="form-group">
                            <label for="image"><h4>تحميل صوره للخدمه</h4></label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-warning" style="float:left;">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection