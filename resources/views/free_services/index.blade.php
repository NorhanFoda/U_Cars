@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title">الخدمات الاضافيه</h1>
                <button  type="button" class="add-serv btn btn-primary" data-toggle="modal" data-target="#exampleModal" >اضافة خدمه اضافيه</button>
            </div>
            <!-- Modal -->	
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة خدمة جدبدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form class=" services-form" action="{{route('free_services.store')}}" method="POST">
                            {{ csrf_field() }}
                            <label for="exampleInputEmail1" align="center">اسم الخدمه المضافه</label> 
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="أسم الخدمة">
                            <div class="modal-footer" align="center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>	
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="container-fluid">
                        @if(count($free_services) > 0)
                            <table class="table table-bordered">
                                <thead class=" text-primary">
                                    <th>
                                        الاسم
                                    </th>
                                    <th>
                                        ضبط
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($free_services as $free_service)
                                        <tr>
                                            <td>
                                                {{ $free_service->name }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary edit-item" value="{{$free_service->id}}" data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i>تعديل</button>
                                                <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">تعديل الخدمة</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class=" services-form" action="{{route('free_services.update', $free_service->id)}}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('PUT')}}
                                                                    <label for="exampleInputEmail1" align="center">اسم الخدمه </label> 
                                                                    <input type="hidden" class="form-control" name="id" id="input-id">
                                                                    <input type="text" name="name" class="form-control" id="input-name" placeholder="أسم الخدمة">
                                                                    <div class="modal-footer" align="center">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{route('free_services.destroy', $free_service->id) }}"
                                                    method="POST"
                                                    style="display:inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE')}} 
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                                </form>	
                                            </td>
                                        </tr>
                                    @endforeach            
                                </tbody>
                            </table>
                        @else
                            <h6>لا يوجد خدمات اضافيه مجانيه مضافه</h6>
                        @endif
                    </div>
                    <div class="bg-light">
                        {{$free_services->links()}}
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>

<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript">

    $(document).on('click','.edit-item',function(){
        var url = "http://127.0.0.1:8000/public/free_services";
        var service_id= $(this).val();

        $.get(url + '/' + service_id + '/edit', function (data) {
            //success data
            $('#input-id').val(data.id);
            $('#input-name').val(data.name);
        }) 
    });
</script>
@endsection