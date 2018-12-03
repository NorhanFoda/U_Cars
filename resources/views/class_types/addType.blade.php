@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/public/classe_types/save" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 services">
                    <h1>اضافة نوع لفئة</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 services">
                        <label>اختر الفئه</label>
                    </div>
                    @if(count($classes) > 0)
                        <div class="col-md-8 select-text"> 
                            <select class="form-control" name="selectedClass">
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <h2>لا يوجد فئات مضافه</h2>
                        <a href="/public/classes/add" class="btn btn-warning">اضف فئه</a>
                    @endif
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