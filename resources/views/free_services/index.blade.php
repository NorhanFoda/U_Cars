@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
            <a 
                href="{{route('free_services.create')}}" 
                class="btn  btn-warning"
                style="float:left;">اضافة خدمه مجانيه</a>
            <h1 style="float:right;">الخدمات الاضافيه المجانيه</h1>
        </div>
    </div>
    
    <div class="table-responsive">
        <div class="container">
            @if(count($free_services) > 0)
                <table class="table table-striped">
                    <thead class=" text-primary">
                        <th>
                            اسم الخدمه
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($free_services as $free_service)
                            <tr>
                                <td>
                                    <h4>{{ $free_service->name }}</h4>
                                </td>
                                <td>
                                    <a  href="{{route('free_services.edit', $free_service->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('free_services.destroy', $free_service->id) }}" 
                                        method="POST" 
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
                <h1>لا يوجد خدمات اضافيه مجانيه مضافه</h1>
                {{-- <a href="{{ route('free_services.create') }}" class="btn btn-warning">اضافة خدمه مجانيه</a> --}}
            @endif
            </div>
            <div class="bg-light">
                {{$free_services->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection