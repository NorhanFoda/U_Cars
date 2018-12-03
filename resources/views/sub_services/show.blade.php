@extends('layouts.app')
@section('content')

    <div class="previewservice">
        <div class="container">
            <div>
                <h1>معاينة قسم الخدمه لخدمه ({{$service->name}})</h1>
                <hr>	
            </div>
            <div class="photo col-md-6">
                <h2>{{$sub_service->name}}</h2>
                <img 
                    src="/storage/images/{{$sub_service['image']}}" 
                    alt="{{$sub_service->name}}"
                    style="max-height: 400px">
            </div>
            <div class="col-md-6 tables">
                <h2>الألوان المتاحه</h2>
                @if(count($colors) > 0)
                    <table class="table text-nowrap">
                        <tbody>
                            @foreach($colors as $color)
                                <tr>
                                    <td>
                                        {{$color->name}}
                                    </td>
                                    <td>
                                        <a  href="/public/colors/{{$color->id}}/images" class="btn btn-warning"><i class="fas fa-users"></i>عرض الصور</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="previews-service">
            <h2>الفئات</h2>
            {{-- <div>
                <div class="container">
                    <table class="table text-nowrap">
                        <thead class=" text-primary">
                                <th>
                                    حجم السياره
                                </th>
                                <th>
                                    السعر
                                </th>
                                <th>
                                    الخصم
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        الجيب
                                    </td>
                                    <td>
                                        15000
                                    </td>
                                    <td>
                                        لا يوجد
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        سيدان
                                    </td>
                                    <td>
                                        5000
                                    </td>
                                    <td>
                                        50%
                                    </td>
                                </tr>            
                            </tbody>
                    </table>
                </div>
            </div> --}}
        <div>
        <div class="container">                
            @if(count($classes) > 0)
                @if(count($types) > 0)
                    <table class="table text-nowrap">
                        @foreach($classes as $class)
                                <thead class=" text-primary">
                                    <th>
                                        {{$class->name}}
                                    </th>
                                    <th>
                                        السعر
                                    </th>
                                    <th>
                                        الخصم
                                    </th>
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
                        @endforeach
                    </table>
                @endif
            @endif

            <div class="group-buttons">
                <a  href="{{route('sub_services.edit', [$sub_service->service_id, $sub_service->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                <form action="{{route('sub_services.destroy', [$sub_service->service_id, $sub_service->id]) }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    style="display:inline-block;">
                {{ csrf_field() }}
                {{ method_field('DELETE')}} 
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                </form>
            </div>
        </div>
    </div>
@endsection