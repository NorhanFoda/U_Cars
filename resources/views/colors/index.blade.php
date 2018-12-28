@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Main charts -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h1 class="panel-title">الألوان</h1>
                    <button 
                        type="button" 
                        class="add-serv btn btn-primary add-item"
                        data-toggle="modal" 
                        data-target="#addColorModal"
                        id="add-item"
                        ><i class="fas fa-plus"></i>اضافة لون 
                    </button>
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
                                    <form class="services-form" action="/public/colors/save" method="POST">
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
                </div>	
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="container-fluid">
                            @if(count($colors) > 0)
                                <table class="table table-bordered">
                                    <thead class=" text-primary">
                                        <th>
                                            اللون
                                        </th>
                                        <th>
                                            استعراض الصور
                                        </th>
                                        <th>
                                            ضبط
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($colors as $color)
                                            <tr>
                                                <td>
                                                    {{$color->name}}
                                                </td>
                                                <td>
                                                    <a href="/public/colors/{{$color->id}}/images">
                                                        <img src="/storage/images/images.png" width="100px" height="100px">
                                                    </a>
                                                </td>
                                                <td>
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-primary edit-item" 
                                                        value="[{{$sub_service->id}}, {{$color->id}}]" 
                                                        data-toggle="modal" 
                                                        data-target="#edit-modal" ><i class="fas fa-edit"></i>تعديل</button>
                                                    <form action="{{route('colors.destroy', [$sub_service->id, $color->id]) }}"
                                                        method="POST"
                                                        style="display:inline-block;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}} 
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                                    </form>
                                                    {{-- Modal_1 --}}
                                                    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">تعديل لون</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="services-form" action="{{route('colors.update', [$sub_service->id,$color->id])}}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('PUT')}}
                                                                    <input type="text" class="form-control" name="name" id="color-name">
                                                                    <input type="hidden" class="form-control" name="id" id="color-id">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ألغاء</button>
                                                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h6>لا توجد الوان مضافه</h6>
                            @endif
                        </div>
                        <div class="bg-light">
                            {{$colors->links()}}
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>		
<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript">

    $(document).on('click','.edit-item',function(){
        alert('item 1 ');
        var url = "http://127.0.0.1:8000/public/sub_services";
        var ids= $(this).val();
        ids = ids.split(',');
        var subservice_id = ids[0].split('[').pop();
        var color_id = ids[1].slice(0,-1);

        $.get(url + '/' + subservice_id + '/colors/' + color_id, function (data) {
            //success data
            $('#color-name').val(data);
        });
    });
</script>
@endsection
