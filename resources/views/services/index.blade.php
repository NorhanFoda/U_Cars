@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
            <a href="{{route('services.create')}}" class="btn  btn-warning">اضافة خدمة</a>
            <h1>الخدمات</h1>
        </div>
    </div>
    
    <div class="table-responsive">
        <div class="container">
            @if(count($services) > 0)
                <table class="table text-nowrap">
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
                                    {{ $service->image }}
                                    {{-- <img src="https://via.placeholder.com/100" alt=""> --}}
                                </td>
                                <td>
                                    <a  href="{{route('services.show', $service->id)}}" class="btn btn-info"><i class="fas fa-map-marker-exclamation"></i>معاينه</a>
                                    <a  href="/services/{{$service->id}}/sub_services" class="btn btn-warning"><i class="fas fa-users"></i>عرض اقسام الخدمه</a>
                                    <a  href="{{route('services.create')}}" class="btn  btn-primary"><i class="fas fa-plus"></i>اضافة قسم</a>
                                    <a  href="{{route('services.edit', $service->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('services.destroy', $service->id) }}" 
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
            @endif
                    {{-- <div class="group-buttons">
                    <button type="button" class="btn btn-default">Previous</button>
                    <button type="button" class="btn btn-default">1</button>
                    <button type="button" class="btn btn-default">2</button>
                    <button type="button" class="btn btn-default">3</button>
                    <button type="button" class="btn btn-default">Next</button>
                    </div> --}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection