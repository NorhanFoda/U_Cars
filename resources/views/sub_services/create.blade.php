@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>اضافة قسم الخدمه</h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('sub_services.store', $service->id) }}" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                    @csrf
                    <div class="row">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="name"><h2>اسم قسم الخدمه</h2></label>
                                        <input type="text" name="name" class="form-control" placeholder="ادخل اسم الخدمه" id="serviceName">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="image"><h2>تحميل صوره لقسم الخدمه</h2></label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="guarantee"><h2>مدة الضمان</h2></label>
                                        <input type="text" name="guarantee" class="form-control" placeholder="ادخل مدة الضمان" id="serviceName">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="free_removal"><h2>الازاله المجانيه</h2></label>
                                        <input type="text" name="free_removal" class="form-control" placeholder="ادخل الازاله المجانيه ان وجد" id="serviceName">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="requirements"><h2>الاشتراطات</h2></label>
                                        <input type="text" name="requirements" class="form-control" placeholder="ادخل الاشتراطات" id="serviceName">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="details"><h2>المواصفات</h2></label>
                                        <input type="text" name="details" class="form-control" placeholder="ادخل مواصفات الخدمه" id="serviceName">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="notes"><h2>ملاحظات</h2></label>
                                        <textarea class="form-control" name="notes" rows="3" placeholder="ادخل الملاحظات"></textarea>
                                    </div>
                                </td>
                                <td>
                                    <input type="checkbox" class="check-with-size" name="free_polishing"> <label>التلميع المجانى</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h2>اختر الوان الخدمه</h2>
                                    @if(count($colors) > 0)
                                        @foreach($colors as $color)
                                            <input type="checkbox" class="check-with-size" value="{{$color->id}}" name="colors[]"> <label>{{$color->name}}</label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <div class="col-md-12">
                            <h1>اختر الفئات لتحديد سعر الخدمه</h1>
                        </div>
                        <div class="col-md-12">
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
                                                                    <input type="text" name="price{{$type->id}}" class="form-control" placeholder="ادخل سعر الخدمه" id="serviceName">
                                                                </td>
                                                                <td>
                                                                    <label for="discount"><h2>الخصم</h2></label>
                                                                    <input type="text" name="discount{{$type->id}}" class="form-control" placeholder="ادخل الخصم للخدمه" id="serviceName">
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div><!--col end-->
                    </div>
                    <button type="submit" class="btn btn-warning" style="float:left;">حفظ</button>
                </div><!--col end-->
            </form>
        </div><!--row end-->
    </div><!--container end-->
@endsection

{{-- create a sub_service for {{ $service->name }} --}}