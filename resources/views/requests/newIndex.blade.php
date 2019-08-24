@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
            <h1 style="float:right;">طلبات العملاء</h1>
            <form action="/public/requests/search" method="POST">
                {{ csrf_field() }}
                <label>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>بحث برقم الطلب
                    </button>
                </label>
                <input type="text" name="requestNo" class="form-control" placeholder="ادخل رقم الطلب">
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <div class="container">
            @if(count($data) > 0)
                <table class="table table-striped">
                    <thead class=" text-primary">
                        <th>
                            رقم الطلب
                        </th>
                        <th>
                            اسم العميل
                        </th>
                        <th>
                            الخدمه
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>
                                    <h4>{{ $item->requestNo }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $item->client['name'] }}</h4>
                                </td>
                                <td>
                                    <h4>
                                        {{ $item->service->name }}
                                    </h4>
                                </td>
                                <td>
                                    <a  href="{{route('requests.show', $item->requestNo)}}" class="btn btn-info"><i class="fas fa-map-marker-exclamation"></i>معاينه</a>
                                    @can('admin-only', auth()->user())

                                    <a  href="{{route('requests.edit', $item->requestNo)}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('requests.destroy', $item->requestNo) }}"
                                        method="POST"
                                        style="display:inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>لا يوجد طلبات</h1>
            @endif
            </div>
            {{-- <div class="bg-light">
                {{$data->links()}}
            </div> --}}
        </div>
    </div>
    <!-- /marketing campaigns -->

@endsection
