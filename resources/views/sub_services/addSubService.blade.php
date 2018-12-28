@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title">اضافة قسم الخدمه</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="/public/sub_services/save" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(count($services) > 0)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="sec-color">
                                    <label for="" class="sec-lab">اختر الخدمه</label>
                                    <select class="form-control" name="selectedService">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @else
                            <h2>لا يوجد خدمات مضافة </h2>
                            <a href="{{route('services.create')}}" class="btn btn-primary">اضف خدمه</a>
                        @endif
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="name" class="form-control" placeholder="أسم الخدمة">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="guarantee" class="form-control" placeholder="مدة الضمان">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="free_removal" class="form-control" placeholder="الازالة المجانية">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="requirements" class="form-control" placeholder="الاشتراطات">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="details" class="form-control" placeholder="الموصفات">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="checkbox" name="free_polishing" class="form-control chk" id="exampleInputlight">
                            <label class="chk-lab" for="exampleInputlight">تلميع مجاني</label>
                        </div>
                        @if(count($colors) > 0)
                            <div class="col-xs-12">
                                <div class="sec-color">
                                    <label for="" class="sec-lab">اختر لون الخدمه</label>
                                    <select class="selectpicker" name="colors[]" multiple data-live-search="true">
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @else
                            <h2>لا يوجد الوان مضافه لهذه الخدمه</h2>
                            <a href="/colors/add" class="btn btn-primary">اضف الالوان</a>
                        @endif

                        @if(count($classes) > 0)
                            <div class="col-xs-12">
                                <div class="sec-color">
                                    <label for="" class="sec-lab">اختر الفئه</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    @foreach($classes as $class)
                                        <div class="col-xs-12">
                                            <label for="" class="chk-lab font-size">{{$class->name}}</label>
                                            <input type="checkbox" name="classes[]" id="{{$class->id}}" value="{{$class->id}}" class="form-control chk showTypes">
                                        </div>
                                        <div id="type-{{$class->id}}" style="display:none;">
                                            @if(count($types) > 0)
                                                @foreach($types as $type)
                                                    @if($type->class_cat_id === $class->id && $type->sub_service_id === null)
                                                        <div class="car-item clearfix">
                                                            <h3>{{ $type->name }}</h3>
                                                            <div class="col-md-6  col-xs-12" >
                                                                <input type="text" name="price{{$type->id}}" class="form-control" placeholder="السعر">
                                                            </div>
                                                            <div class="col-md-6  col-xs-12" >
                                                                <input type="text" name="discount{{$type->id}}" class="form-control" placeholder="الخصم">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>	
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <h2>لا يوجد فئات مضافه لهذه الخدمه</h2>
                            <a href="{{route('classes.create')}}" class="btn btn-primary">اضف فئه</a>
                        @endif
                        <div class="col-xs-12">
                            <textarea class="form-control" name="notes" cols="30" rows="10" placeholder="ملاحظات"></textarea>
                        </div>
                        <div class="col-xs-12">
                            <div class="save-btn">
                                <button class="btn btn-primary" type="submit">حفظ قسم الخدمه</button>
                            </div>
                        </div>
                    </form>	
                </div>
            </div>	
        </div>
    </div>			
</div>

<script type="text/javascript">
	$('.showTypes').change(function() {
        var $toggle = $(this);
        var id = "#type-"+$toggle.attr('id');
        $( id ).toggle();
	});    
</script>
@endsection