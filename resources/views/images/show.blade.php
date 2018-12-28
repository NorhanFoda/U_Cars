@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title">معاينة الصور</h1>
            
            <div class="previews_photo">
                <img 
                    src="/storage/images/{{$image->name}}" 
                    alt="{{$image->code}}"
                    width="300px"
                    height="300px">
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="container-fluid">
                        <table class="table table-bordered">
                            <thead class=" text-primary">
                                <th>
                                    اللون
                                </th>
                                <th>
                                    قسم الخدمه
                                </th>
                                <th>
                                    الكود
                                </th>
                                <th>
                                    السعر
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{$image->color->name}}
                                    </td>
                                    <td>
                                        {{$image->subservice->name}}
                                    </td>
                                    <td>
                                        {{$image->code}}
                                    </td>
                                    <td>
                                        @if($image->price === null)
                                            السعر يحدد من قبل الاداره
                                        @else
                                            {{$image->price}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="priv_group-buttons">
                            <button type="button" class="btn btn-primary edit-item" value="{{$image->color->id}},{{$image->id}}" data-toggle="modal" data-target="#edit-modal" ><i class="fas fa-edit"></i>تعديل</button>
                            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">تعديل الصورة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="services-form" action="{{ route('images.update', [$image->color->id, $image->id]) }}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT')}}
                                                @if(count($sub_services) > 0)
                                                <label for="" class="sec-lab">اختر قسم الخدمه</label>
                                                <select class="form-control" name="selectedSubService">
                                                    @foreach($sub_services as $sub_service)
                                                        <option value="{{$sub_service->id}}">{{$sub_service->name}}</option>
                                                    @endforeach
                                                </select>
                                                @else
                                                    لا يوجد اقسام خدمات مضافة
                                                @endif
                                                <input type="hidden" value="{{$image->id}}" name="id" id="input-id">
                                                <input type="text" name="code" class="form-control" placeholder="الكود " id="input-code">
                                                <input type="text" name="price" class="form-control" placeholder=" السعر" id="input-price">
                                                <input type="file" class="form-control-file" name="name">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ألغاء</button>
                                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('images.destroy', [$image->color->id, $image->id]) }}"
                                method="POST"
                                style="display:inline-block;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}} 
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click','.edit-item',function(){
        var url = "http://127.0.0.1:8000/public/colors";
        var ids = $(this).val();
        ids = ids.split(',');
        var color_id = ids[0];
        var image_id= ids[1];

        $.get(url + '/' + color_id + '/images/' + image_id + '/edit', function (data) {
            //success data
            $('#input-id').val(data.id);
            $('#input-code').val(data.code);
            $('#input-price').val(data.price);
        }); 
    });
</script>
@endsection