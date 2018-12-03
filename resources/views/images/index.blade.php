@extends('layouts.app')
@section('content')
			<!-- Main content -->

    <div class="service">
        <div class="container">
          @can('admin-only', auth()->user())

            @if(Request()->color)

                <a
                    href="{{ route('images.create', Request()->color->id) }}"
                    class="btn btn-warning"
                    style="float:left;">اضافة صوره</a>
            @else
                <a
                    href="/public/images/add"
                    class="btn btn-warning"
                    style="float:left;">اضافة صوره</a>
            @endif
            <h1 style="float:right;">الصور</h1>
            {{-- @if(Route::getFacadeRoot()->current()->uri() === 'images')
                <a href="/public/images/create" class="btn btn-warning" style="float:left;">اضافة صوره</a>
            @endif --}}
            @endcan
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
                            قسم الخدمه
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
                                    <h4>{{ $image->subservice->name }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $image->code }}</h4>
                                </td>
                                <td>
                                    <h4>
                                        @if($image->price !== null)
                                            {{ $image->price }}
                                        @else
                                            <h3>السعر يحدد من قبل الاداره</h3>
                                        @endif
                                    </h4>
                                </td>
                                <td>
                                    <a  href="{{route('images.show', [$image->color->id, $image->id])}}" class="btn btn-info"><i class="fas fa-edit"></i>معاينه</a>

                                    @can('admin-only', auth()->user())

                                    <a  href="{{route('images.edit', [$image->color->id, $image->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                                    <form action="{{route('images.destroy', [$image->color->id, $image->id]) }}"
                                        method="POST"
                                        style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>لا يوجد صور مضافه</h1>
            @endif
            </div>
            <div class="bg-light">
                {{$images->links()}}
            </div>
        </div>
    </div>
    <!-- /marketing campaigns -->

@endsection
