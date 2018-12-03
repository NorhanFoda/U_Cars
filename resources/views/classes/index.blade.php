@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
            <a 
                href="{{route('classes.create')}}" 
                class="btn  btn-warning"
                style="float:left;">اضافة فئه</a>
            <h1 style="float:right;">الفئات</h1>
        </div>
    </div>
    
    <div class="table-responsive">
        <div class="container">
            @if(count($classes) > 0)
                <table class="table table-striped">
                    <thead class=" text-primary">
                        <th>
                            اسم الفئه
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($classes as $class)
                            <tr>
                                <td>
                                    <h4>{{ $class->name }}</h4>
                                </td>
                                <td>
                                    <a  href="/public/classes/{{$class->id}}/class_types" class="btn btn-warning"><i class="fas fa-users"></i>عرض انواع الفئه</a>
                                    <form 
                                        action="ClassTypeController@postClassTypeForClass" 
                                        method="POST"
                                        style="display:inline-block;">
                                        {{ csrf_field() }}
                                        <a  href="/public/classes/{{$class->id}}/class_types/create" class="btn  btn-primary"><i class="fas fa-plus"></i>اضافة نوع للفئه</a>
                                    </form>
                                    <a  href="{{route('classes.edit', $class->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('classes.destroy', $class->id) }}" 
                                        method="POST" 
                                        enctype="multipart/form-data"
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
                <h1>لا توجد فئات مضافه</h1>
            @endif
            </div>
            <div class="bg-light">
                {{$classes->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection