@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('class_types.store', $class->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 services">
                    <h1>اضافة نوع لفئة ({{$class->name}})</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <input placeholder="ادخل اسم النوع" type="text" name="name"  class="form-control">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection