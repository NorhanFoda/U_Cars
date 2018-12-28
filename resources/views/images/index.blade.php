@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title">الصور</h1>
                <button type="button" class="add-serv btn btn-primary add-item"  data-toggle="modal" data-target="#add-modal">أضافة صورة</button>
                <!-- Modal -->
                <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">أضافة صورة جديدة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form class="services-form" action="{{ route('images.store', $color->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
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
                                <input type="text" name="code" class="form-control" placeholder="الكود " id="serviceName">
                                <input type="text" name="price" class="form-control" placeholder=" السعر" id="serviceName">
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
            </div>	
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="container-fluid">
                        @if(count($images) > 0)
                        <table class="table table-bordered">
                            <thead class=" text-primary">
                                    <th>
                                        الصور
                                    </th>
                                    <th>
                                        ضبط
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($images as $image)
                                        <tr>
                                            <td>
                                                <img src="/storage/images/{{$image['name']}}"
                                                    alt="{{ $image->code }}"
                                                    width="100px"
                                                    height="100px">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary edit-item" value="{{$color->id}},{{$image->id}}" data-toggle="modal" data-target="#edit-modal" ><i class="fas fa-edit"></i>تعديل</button>
                                                <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل الصورة </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="services-form" action="{{ route('images.update', [$color->id, $image->id]) }}" method="POST" enctype="multipart/form-data">
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
                                                <a href="{{route('images.show', [$image->color->id, $image->id])}}"  type="button" class="btn btn-info"><i class="fas fa-map-marker-exclamation"></i>معاينه</a>
                                                <form action="{{route('images.destroy', [$image->color->id, $image->id]) }}"
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
                            لا يوجد صور مضافه
                        @endif
                    </div>
                    <div class="bg-light">
                        {{$images->links()}}
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