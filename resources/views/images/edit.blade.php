@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('images.update', [$color->id, $image->id]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}} 
            <div class="row">
                <div class="col-md-8 services">
                    <h1>تعديل صوره</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <div class="form-group">
                        <label for="code"><h2>الكود</h2></label>
                        <input type="text" name="code" class="form-control" value="{{$image->code}}">
                    </div>
                    <div class="form-group">
                        <label for="price"><h2>السعر</h2></label>
                        <input type="text" name="price" class="form-control" value="{{$image->price}}">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="name">
                    </div>
                    <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
                </div>
            </div>
        </form>
    </div>
@endsection