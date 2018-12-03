@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
            <a 
                href="{{route('services.create')}}" 
                class="btn  btn-warning"
                style="float:left;">اضافة خدمة</a>
            <h1 style="float:right;">الخدمات</h1>
        </div>
    </div>
    
    <div class="table-responsive">
        <div class="container">
            @if(count($services) > 0)
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
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    <h4>{{ $service->name }}</h4>
                                </td>
                                <td>
                                    <img class="card-img-top" 
                                        src="/storage/images/{{$service['image']}}" 
                                        alt="{{ $service->name }}"
                                        style="max-height:20%;">
                                </td>
                                <td>
                                    {{-- <a  href="{{route('services.show', $service->id)}}" class="btn btn-info"><i class="fas fa-map-marker-exclamation"></i>معاينه</a> --}}
                                    <a  href="/public/services/{{$service->id}}/sub_services" class="btn btn-warning"><i class="fas fa-users"></i>عرض اقسام الخدمه</a>
                                    <a  href="{{route('sub_services.create', $service->id)}}" class="btn  btn-primary"><i class="fas fa-plus"></i>اضافة قسم</a>
                                    <a  href="{{route('services.edit', $service->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('services.destroy', $service->id) }}" 
                                        method="POST" 
                                        enctype="multipart/form-data"
                                        style="display:inline-block;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}} 
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
                <h1>لا يوجد خدمات مضافه</h1>
            @endif
            </div>
            <div class="bg-light">
                {{$services->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection