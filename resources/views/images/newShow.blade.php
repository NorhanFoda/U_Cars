@extends('layouts.app')
@section('content')
    <div class="previews">
		<div class="container">
			<div>
				<h1>معاينة الصور</h1>
				<hr>	
			</div>
			<div class="photo col-md-6">
				<img src="/storage/images/{{$image->name}}" alt="{{$image->code}}">
			</div>
		</div>
	</div>

	<div class="previews-photo">
		<div class="container">
		    <table class="table text-nowrap">
				<thead class=" text-primary">
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
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{$image->color->name}}
                        </td>
                        <td>
                            {{$image->subservice->name}}
                        </td>
                        <td>
                            {{$image->code}}
                        </td>
                        <td>
                            @if($image->price === null)
                                السعر يحدد من قبل الاداره
                            @else
                                {{$image->price}}
                            @endif
                        </td>
                    </tr>            
                </tbody>
			</table>
            <div class="group-buttons">
                <a  href="{{route('images.edit', [$image->color->id, $image->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>

                <form action="{{route('images.destroy', [$image->color->id, $image->id]) }}" 
                    method="POST" 
                    style="display:inline-block;">
                {{ csrf_field() }}
                {{ method_field('DELETE')}} 
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>مسح</button>
                </form>
            </div>
        </div>
	</div>
@endsection

{{-- {{ $image->name }} --}}