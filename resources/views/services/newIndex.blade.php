@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
			
    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title"> الخدمات </h1>
                @can('admin-only', auth()->user())
                <a 
                    href="{{route('services.create')}}"
                    class="add-serv btn btn-primary" 
                    data-toggle="modal" 
                    data-target="#exampleModalLong">اضافة الخدمه
                </a>
                @endcan
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> أضافة خدمة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="services-form" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input placeholder="أسم الخدمه" type="text" class="form-control" name="name">
                                    <input type="file" class="form-control-file" id="image" name="image">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	

            <div class="panel-body">
                <div class="table-responsive">
                    <div class="container-fluid">
                        @if(count($services) > 0)
                            <table class="table table-bordered">
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
                                                {{ $service->name }}
                                            </td>
                                            <td>
                                                <img src="/storage/images/{{$service['image']}}"
                                                    alt="{{ $service->name }}"
                                                    style="max-height:20%;">
                                            </td>
                                            <td>
                                                @can('admin-only', auth()->user())
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-primary" 
                                                        data-toggle="modal" 
                                                        data-target="#exampleModal1" ><i class="fas fa-edit"></i>تعديل</button>
                                                    <a href="{{route('services.edit', $service->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" ><i class="fas fa-edit"></i>تعديل</a>
                                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل الخدمة </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="services-form" action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT')}}
                                                                        <input value="{{$serviceToEdit->name}}" type="text" class="form-control" name="name">
                                                                        <input type="file" class="form-control-file" id="image" name="image">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ألغاء</button>
                                                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form class="services-form" action="{{route('services.destroy', $service->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                                    </form>
                                                    <a href="{{route('sub_services.create', $service->id)}}" class="btn  btn-default"><i class="fas fa-plus"></i>اضافة قسم</a>
                                                @endcan
                                                <a href="/public/services/{{$service->id}}/sub_services" type="button" class="btn btn-warning"><i class="fas fa-users"></i>عرض اقسام الخدمه</a>
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

        </div>

    </div>
</div>	
<!-- /marketing campaigns -->
@endsection