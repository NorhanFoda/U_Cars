@extends('layouts.app')
@section('content')
        <div class="service">
            <div class="container">
                <h1 style="float:right;">العملاء</h1>
                <form action="/public/clients/search" method="POST">
                    {{ csrf_field() }}
                    <label>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>بحث برقم الهاتف
                        </button>
                    </label>
                    <input type="text" name="phone" class="form-control" placeholder="ادخل رقم الهاتف">
                </form>
            </div>
        </div>
        @if(count($clients) > 0)
        <div class="table-responsive">
            <div class="container">
                <table class="table text-nowrap">
                    <thead class=" text-primary">
                        <th>
                            الاسم
                        </th>
                        <th>
                            الهاتف
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>
                                    {{$client->name}}
                                </td>
                                <td>
                                    {{$client->phone}}
                                </td>
                                <td>
                                    <a href="/public/clients/{{$client->id}}/requests" class="btn btn-info"><i class="fas fa-map-marker-exclamation"></i>عرض الطلبات</a>
                                    <form action="/public/clients/deleteClient/{{$client->id}}" 
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
            </div>
        </div>
        @else
            <h2>لا يوجد عملاء مسجلين</h2>
        @endif

@endsection