@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('colors.update', $color->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 services">
                    <h1>اضافة لون</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <input value="{{$color->name}}" type="text" name="name"  class="form-control">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ التعديل</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection