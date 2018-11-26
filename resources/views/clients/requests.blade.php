@extends('layouts.app')
@section('content')
    @if(count($data) > 0)
        <div class="service">
            <div class="container">
                <h1 style="float:right;">طلبات العميل/ {{$data[0]->client->name}}</h1>
                <form action="/requests/search" method="POST">
                    @csrf
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
                <table class="table text-nowrap">
                    <thead class=" text-primary">
                        <th>
                            رقم الطلب 
                        </th>
                        <th>
                            اسم قسم الخدمه
                        </th>
                        <th>
                            اللون
                        </th>
                        <th>
                            الفئه
                        </th>
                        <th>
                            السعر
                        </th>
                        <th>
                            الضبظ
                        </th>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>
                                    {{$item->requestNo}}
                                </td>
                                <td>
                                    {{$item->sub_service->service->name}} - {{$item->sub_service->name}}
                                </td>
                                <td>
                                    {{$item->color->name}}
                                </td>
                                <td>
                                    {{$item->class[0]->name}} - {{$item->class_type->name}}
                                </td>
                                <td>
                                    @if($item->price === null)
                                        السعر يحدد من قبل الاداره
                                    @else
                                        {{$item->price}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('requests.edit', $item->requestNo)}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>
                                    <form action="{{route('requests.destroy', $item->requestNo) }}" 
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
            </div>
        </div>
    @else
        <div class="service">
            <div class="container">
                <h1 style="float:right;">طلبات العميل</h1>
                <h4>لا توجد طلبات مسجله للعميل</h4>
            </div>
        </div>
    @endif
@endsection


{{-- @if(count($data)>0)
    Request of Client: {{ $data[0]->client->name }}
    Phone: {{ $data[0]->client->phone }}
    @foreach($data as $item)
        {{ $item->image->name }}
        {{ $item->sub_service->name }}
    @endforeach
@endif --}}