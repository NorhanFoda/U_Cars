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
                                                        class="btn btn-primary edit-item2" 
                                                        value="{{$color->id}}" 
                                                        data-toggle="modal" 
                                                        data-target="#edit-modal2" ><i class="fas fa-edit"></i>تعديل</button>
                                                    <form action="/public/colors/deleteColor/{{$color->id}}"
                                                        method="POST"
                                                        style="display:inline-block;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}} 
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                                    </form>
                                                    {{-- Modal_2 --}}
                                                    <div class="modal fade" id="edit-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">تعديل لون</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="services-form" action="/public/colors/updateColor/{{$color->id}}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('PUT')}}
                                                                    <input type="text" class="form-control" name="name" id="color-name2">
                                                                    <input type="hidden" class="form-control" name="id" id="color-id2">
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

    $(document).on('click','.edit-item2',function(){
        alert('item 2');
        var url = "http://127.0.0.1:8000/public/colors/editColor";
        var color_id= $(this).val();

        $.get(url + '/' + color_id, function (data) {
            //success data
            console.log(data);
            $('#color-name2').val(data.name);
        });
    });
    
</script>
@endsection
