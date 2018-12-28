@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4 class="text-center">معاينة قسم الخدمه {{$sub_service->name}} ({{$service->name}})</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">الألوان المتاحه</h6>
                        </div>
                        <div class="panel-body">
                            @if(count($colors) > 0)
                            <table class="table table-bordered text-nowrap">
                                <tbody>
                                    @foreach($colors as $color)
                                        <tr>
                                            <td>
                                                {{$color->name}}
                                            </td>
                                            <td>
                                                <a href="/public/colors/{{$color->id}}/images" type="button" class="btn btn-primary">عرض الصور</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <!-- /traffic sources -->
                </div>
                <div class="col-md-6 col-xs-12">
                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <img 
                            src="/storage/images/{{$sub_service['image']}}" 
                            alt="{{$sub_service->name}}"
                            style="max-height: 300px">
                        </div>
                    </div>
                    <!-- /traffic sources -->
                </div>
            </div>
            <div class="page-header page-header-default">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4 class="text-center"> الفئات</h4>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @if(count($classes) > 0)
                                @if(count($types) > 0)
                                    <table class="table table-bordered text-nowrap">
                                        <thead class=" text-primary">
                                            @foreach($classes as $class)
                                                <th>
                                                    {{$class->name}} 
                                                </th>
                                                <th>
                                                    السعر
                                                </th>
                                                <th>
                                                    الخصم
                                                </th>
                                            @endforeach
                                        </thead>
                                        <tbody>
                                            @foreach($types as $type)
                                                @if($type->class_cat_id === $class->id)
                                                    <tr>
                                                        <td>
                                                            {{$type->name}}
                                                        </td>
                                                        <td>
                                                            @if($type->price !== null)
                                                                {{$type->price}}
                                                            @else
                                                                السعر يحدد من قبل الاداره
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($type->discount !== null)
                                                                {{$type->discount}} 
                                                            @else
                                                                لا يوجد خصم
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            @endif
                        </div>
                    </div>
                    <!-- /traffic sources -->
                </div>
            </div>
        </div>
        <!-- Main charts -->
            <div class="panel panelsave">
                <div class="group-buttons">
                    <a href="{{route('sub_services.edit', [$sub_service->service_id, $sub_service->id])}}" type="button" class="btn btn-primary"><i class="fas fa-edit"></i>تعديل</a>
                    <form action="{{route('sub_services.destroy', [$sub_service->service_id, $sub_service->id]) }}" 
                        method="POST" 
                        enctype="multipart/form-data"
                        style="display:inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}} 
                        <button  type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection