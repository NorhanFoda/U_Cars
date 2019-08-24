@extends('layouts.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title"> طلبات الخصم</h1>
            </div>	
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="container-fluid">
                        @if(count($data) > 0)
                            <table class="table table-bordered">
                                <thead class=" text-primary">
                                    <th>
                                        اسم العميل
                                    </th>
                                    <th>
                                            رقم الهاتف 
                                    </th>
                                    <th>
                                        عدد الطلبات
                                    </th>
                                    <th>
                                        الضبظ
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>
                                                {{ $item->client->name }}
                                            </td>
                                            <td>
                                                {{ $item->client->phone }}
                                            </td>
                                            <td>
                                                {{ $item->requests_count }}
                                            </td>
                                            <td>
                                                @if($item->discount)
                                                    تم قبول طلب الخصم من قبل الاداره
                                                @else
                                                    <button 
                                                    type="button" 
                                                    class="btn btn-primary edit-item" 
                                                    value="{{$item->requestNo}}" 
                                                    data-toggle="modal" 
                                                    data-target="#edit-modal" ><i class="fas fa-edit"></i>قبول طلب الخصم</button>
                                                    {{-- Modal_1 --}}
                                                    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"> قبول طلب الخصم</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="services-form" action="{{route('requests.update', $item->requestNo)}}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT')}}    
                                                                        <input type="text" class="form-control" name="discount" id="discount-name" placeholder="الخصم">
                                                                        <input type="hidden" class="form-control" name="id" id="request-id">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ألغاء</button>
                                                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            لا يوجد طلبات خصم
                        @endif
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

    $(document).on('click','.edit-item',function(){
        var url = "http://127.0.0.1/public/requests";
        var request_id= $(this).val();

        $.get(url + '/' + request_id + '/edit', function (data) {
            $('#request-id').val(data.id);
            $('#discount-name').val(data.discount);
        });
    });
</script>

@endsection