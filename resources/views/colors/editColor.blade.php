@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/public/colors/updateColor/{{$color->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT')}} 
            <div class="row">
                <div class="col-md-8 services">
                    <h1>تعديل لون</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <input value="{{$color->name}}" type="text" name="name"  class="form-control">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection