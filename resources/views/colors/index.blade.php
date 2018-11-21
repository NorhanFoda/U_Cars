@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
            <h1 style="float:right;">الالوان</h1>
        </div>
    </div>
    
    <div class="table-responsive">
        <div class="container">
            @if(count($colors) > 0)
                <table class="table table-striped">
                    <thead class=" text-primary">
                        <th>
                            اللون
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($colors as $color)
                            <tr>
                                <td>
                                    <h4>{{ $color->name }}</h4>
                                </td>
                                <td>
                                    <a  href="/colors/{{$color->id}}/images" class="btn btn-warning"><i class="fas fa-users"></i>عرض الصور</a>
                                    <a  href="{{route('images.create', $color->id)}}" class="btn  btn-primary"><i class="fas fa-plus"></i>اضافة صوره</a>
                                    <a  href="{{route('colors.edit', [$color->sub_services[0]->id ,$color->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('colors.destroy', [$color->sub_services[0]->id ,$color->id]) }}" 
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
            @else
                <h1>لا يوجد الوان مضافه</h1>
                <a 
                    href="{{route('colors.create', Request()->sub_service->id)}}" 
                    class="btn  btn-warning">اضافة لون
                </a>
            @endif
            </div>
            <div class="bg-light">
                {{$colors->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection
