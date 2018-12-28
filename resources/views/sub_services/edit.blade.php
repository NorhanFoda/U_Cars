@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title">تعديل قسم {{$sub_service->name}} فى خدمة ({{$service->name}})</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{ route('sub_services.update', [$service->id, $sub_service->id]) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}} 
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="name" class="form-control" value="{{ $sub_service->name }}">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="guarantee" class="form-control" value="{{ $sub_service->guarantee }}" placeholder="مدة الضمان">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="free_removal" class="form-control" value="{{ $sub_service->free_removal }}" placeholder="الازالة المجانية">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="requirements" class="form-control" value="{{ $sub_service->requirements }}" placeholder="الاشتراطات">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="details" class="form-control" value="{{ $sub_service->details }}" placeholder="المواصفات">	
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            @if($sub_service->free_polishing === 1)
                                <input type="checkbox" name="free_polishing" checked class="form-control chk" id="exampleInputlight">
                                <label class="chk-lab" for="exampleInputlight">تلميع مجاني</label>
                            @else
                                <input type="checkbox" name="free_polishing" class="form-control chk" id="exampleInputlight">
                                <label class="chk-lab" for="exampleInputlight">تلميع مجاني</label>
                            @endif
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
                                            <input type="checkbox" id="{{$class->id}}" value="{{$class->id}}" class="form-control chk showTypes">
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
                        @endif
                        <div class="col-xs-12">
                            <textarea class="form-control" name="notes" cols="30" rows="10" value="{{ $sub_service->notes }}" placeholder="ملاحظات"></textarea>
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
    $('.selectpicker').selectpicker();

	$('.showTypes').change(function() {
        var $toggle = $(this);
        var id = "#type-"+$toggle.attr('id');
        $( id ).toggle();
	});    
</script>
@endsection