@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('classes.store')}}" method="POST">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 services">
                    <h1>اضافة فئه</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <input placeholder="اسم الفئه" type="text" name="name"  class="form-control">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection