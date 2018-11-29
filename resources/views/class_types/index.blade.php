@extends('layouts.app')
@section('content')
    <div class="service">
        <div class="container">
            <h1 style="float:right;">عرض انواع {{$class_cat->name}}</h1>
        </div>
    </div>
    
    <div class="table-responsive">
        <div class="container">
            @if(count($class_types) > 0)
                <table class="table table-striped">
                    <thead class=" text-primary">
                        <th>
                            اسم النوع
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($class_types as $type)
                            <tr>
                                <td>
                                    <h4>{{ $type->name }}</h4>
                                </td>
                                <td>
                                    <a  href="{{route('class_types.edit', [$class_cat->id, $type->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('class_types.destroy', [$class_cat->id, $type->id]) }}" 
                                        method="POST" 
                                        enctype="multipart/form-data"
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
            @else
                <h1>لا توجد انواع مضافه</h1>
                <a href="{{ route('class_types.create',explode("/",URL::current())[5]) }}" class="btn btn-warning">اضافة نوع</a>
            @endif
            </div>
            <div class="bg-light">
                {{$class_types->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection