@extends('layouts.app')
@section('content')
			<!-- Main content -->
            <div class="service">
                <div class="container">
                    <h1 style="float:right;">اقسام الخدمات</h1>
                    @if(Route::getFacadeRoot()->current()->uri() !== 'sub_services')
                        @if(count($sub_services) > 0)
                            <h2 style="float:right;">عرض اقسام الخدمات لخدمة ( {{ $sub_services[0]->service->name }} )</h2>
                        @endif
                    @else
                        <h1 style="float:right;">اقسام الخدمات</h1>
                    @endif
                </div>
            </div>

    <div class="table-responsive">
        <div class="container">
            @if(count($sub_services) > 0)
                <table class="table table-striped">
                    <thead class=" text-primary">
                        <th>
                            اسم الخدمه
                        </th>
                        <th>
                            الصور
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($sub_services as $sub_service)
                            <tr>
                                <td>
                                    <h4>{{ $sub_service->name }}</h4>
                                </td>
                                <td>
                                    <img class="card-img-top" 
                                        src="/storage/images/{{$sub_service['image']}}" 
                                        alt="{{ $sub_service->name }}"
                                        style="max-height:20%;">
                                </td>
                                <td>
                                    <a  href="/sub_services/{{$sub_service->id}}/colors" class="btn btn-warning"><i class="fas fa-users"></i>عرض الوان الخدمه</a>
                                    <a  href="{{route('services.show', [$sub_service->service_id, $sub_service->id])}}" class="btn btn-info"><i class="fas fa-map-marker-exclamation"></i>معاينه</a>
                                    <a  href="{{route('colors.create', $sub_service->id)}}" class="btn btn-primary"><i class="fas fa-map-marker-exclamation"></i>اضافة لون</a>
                                    <a  href="{{route('sub_services.edit', [$sub_service->service_id, $sub_service->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('sub_services.destroy', [$sub_service->service_id, $sub_service->id]) }}" 
                                        method="POST" 
                                        enctype="multipart/form-data"
                                        style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>لا يوجد اقسام خدمات مضافه</h1>
                <a href="{{ route('sub_services.create', Request()->service->id) }}" class="btn btn-warning">اضافة قسم خدمه</a>
            @endif
            </div>
            <div class="bg-light">
                {{$sub_services->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection