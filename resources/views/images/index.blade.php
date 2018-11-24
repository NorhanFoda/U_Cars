@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
            <h1 style="float:right;">الصور</h1>
            {{-- @if(Route::getFacadeRoot()->current()->uri() === 'images')
                <a href="/images/create" class="btn btn-warning" style="float:left;">اضافة صوره</a>
            @endif --}}
        </div>
    </div>
    
    <div class="table-responsive">
        <div class="container">
            @if(count($images) > 0)
                <table class="table table-striped">
                    <thead class=" text-primary">
                        <th>
                            الصوره
                        </th>
                        <th>
                            اللون
                        </th>
                        <th>
                            الكود
                        </th>
                        <th>
                            السعر
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td>
                                    <img class="card-img-top" 
                                    src="/storage/images/{{$image['name']}}" 
                                    alt="{{ $image->code }}"
                                    style="max-height:20%;">
                                </td>
                                <td>
                                    <h4>{{ $image->color->name }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $image->code }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $image->price }}</h4>
                                </td>
                                <td>
                                    <a  href="{{route('images.edit', [$image->color->id, $image->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('images.destroy', [$image->color->id, $image->id]) }}" 
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
                <h1>لا يوجد صور مضافه</h1>
                <a href="{{ route('images.create', Request()->color->id) }}" class="btn btn-warning">اضافة صوره</a>
            @endif
            </div>
            <div class="bg-light">
                {{$images->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->
                
@endsection