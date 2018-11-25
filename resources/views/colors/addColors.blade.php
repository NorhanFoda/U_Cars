@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/colors/save" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 services">
                    <h1>اضافة لون</h1>
                </div>
                <div class="col-md-8 Services-text"> 
                    <input placeholder="اللون" type="text" name="name"  class="form-control">
                    <div class="save">
                        <button type="submit" class="btn btn-info">حفظ </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection