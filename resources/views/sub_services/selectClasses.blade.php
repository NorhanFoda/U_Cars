@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>اختر الفئات لتحديد سعر خدمة {{ $service->name }}  ({{ $sub_service->name }})</h1>
            </div>
        </div>
        <div class="row">
            <form action="" method="POST">
                <div class="col-md-12">
                    @csrf
                    <div class="row">
                        @if(count($classes) > 0)
                            <table class="table table-borderless">
                                @foreach($classes as $class)
                                    <tr>
                                        <td colspan="2">
                                            <input type="checkbox" class="check-with-size" value="{{$class->id}}" name="classes[]"> <label>{{ $class->name }}</label>
                                        </td>
                                    </tr>
                                        @if(count($types) > 0)
                                            @foreach($types as $type)
                                                @if($type->class_cat_id === $class->id)
                                                <tr>
                                                    <td>
                                                        {{ $type->name }}
                                                    </td>
                                                    <td>
                                                        <label for="price"><h2>السعر</h2></label>
                                                        <input type="text" name="price" class="form-control" placeholder="ادخل سعر الخدمه" id="serviceName">
                                                    </td>
                                                    <td>
                                                        <label for="discount"><h2>الخصم</h2></label>
                                                        <input type="text" name="discount" class="form-control" placeholder="ادخل الخصم للخدمه" id="serviceName">
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                @endforeach
                            </table>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-warning" style="float:left;">حفظ</button>
                </div><!--col end-->
            </form>
        </div><!--row end-->
    </div><!--container end-->
@endsection

{{-- create a sub_service for {{ $service->name }} --}}




{{-- @if(count($classes) > 0)
    @foreach($classes as $class)
        {{ $class->name }}
        @if(count($types) > 0)
            @foreach($types as $type)
                @if($type->class_cat_id === $class->id)
                    {{ $type->name }}
                @endif
            @endforeach
        @endif
    @endforeach
@endif --}}