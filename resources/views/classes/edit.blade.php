@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('classes.update', $class->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 services">
                    <h1>تعديل فئة ({{$class->name}})</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <input value="{{$class->name}}" type="text" name="name"  class="form-control">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ التعديلات</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection