@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        @if(Route::getFacadeRoot()->current()->uri() !== 'public/sub_services')
                            <h1 class="panel-title">اقسام الخدمات</h1>
                            @if(count($sub_services) > 0)
                                <h2 class="panel-title">عرض اقسام الخدمات لخدمة ( {{ $service->name }} )</h2>
                            @endif
                        @else
                            <h1 class="panel-title">اقسام الخدمات </h1>
                        @endif
                        {{-- @can('admin-only', auth()->user()) --}}
                            <button type="button" class="add-serv btn btn-primary"><a href="/public/sub_services/add">اضافة قسم الخدمه</a></button>
                        {{-- @endcan --}}
                    </div>	
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="container-fluid">
                                @if(count($sub_services) > 0)
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
                                            @foreach($sub_services as $sub_service)
                                                <tr>
                                                    <td>
                                                        {{ $sub_service->name }}
                                                    </td>
                                                    <td>
                                                        <img 
                                                            src="/storage/images/{{$sub_service['image']}}" 
                                                            alt="{{ $sub_service->name }}"
                                                            style="max-height:80px;">
                                                    </td>
                                                    <td>
                                                        {{-- @can('admin-only', auth()->user()) --}}
                                                            <a href="{{route('sub_services.edit', [$sub_service->service_id, $sub_service->id])}}"  type="button" class="btn btn-primary"><i class="fas fa-edit"></i>تعديل</a>
                                                            <form action="{{route('sub_services.destroy', [$sub_service->service_id, $sub_service->id]) }}"
                                                                method="POST"
                                                                enctype="multipart/form-data"
                                                                style="display:inline-block;">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE')}} 
                                                                <button  type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                                            </form>
                                                            <a href="{{route('sub_services.show', [$sub_service->service_id, $sub_service->id])}}" 
                                                                type="button" 
                                                                class="btn btn-info"
                                                                ><i class="fas fa-map-marker-exclamation"></i>معاينه</a>
                                                            <a href="/sub_services/{{$sub_service->id}}/colors" type="button" class="btn  btn-primary"><i class="fas fa-users"></i> عرض الوان الخدمه</a>
                                                            <button 
                                                                type="button" 
                                                                class="btn btn-warning add-item"
                                                                data-toggle="modal" 
                                                                data-target="#addColorModal"
                                                                id="add-item"
                                                                value="{{$sub_service->id}}"><i class="fas fa-plus"></i>اضافة لون 
                                                            </button>
                                                        {{-- @endcan --}}
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="addColorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">أضافة لون </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="services-form" action="{{route('colors.store', $sub_service->id)}}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" class="form-control" id="input-id" name="id">
                                                                            <input placeholder="اللون" type="text" class="form-control" id="input-name" name="name">
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                                <button type="submit" class="btn btn-primary">حفظ</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h1>لا يوجد اقسام خدمات مضافه</h1>
                                @endif 
                            </div>
                            <div class="bg-light">
                                {{$sub_services->links()}}
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>

    </div>	
</div>
<!-- /marketing campaigns -->
<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript">

    $(document).on('click','.add-item',function(){
        var url = "http://127.0.0.1:8000/public/sub_services";
        var subService_id= $(this).val();

        $.get(url + '/' + subService_id + '/colors/create', function (data) {
            //success data
            console.log(data);
            $('#input-id').val(data.id);
        }) 
    });
</script>
@endsection