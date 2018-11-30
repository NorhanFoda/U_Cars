@extends('layouts.app')
@section('content')
<div class="preview">
		<div class="container">
			<h1>معاينة طلبات العملاء</h1>
			<hr>
		</div>
	</div>

<div class="Preview-requests">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>رقم الطلب :</h2>
				</div>
				<div class="col-xs-2">
					<h3>{{$data->requestNo}}</h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>اسم العميل :</h2>
				</div>
				<div class="col-xs-2">
					<h3>{{$data->client->name}}</h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>الهاتف :</h2>
				</div>
				<div class="col-xs-2">
					<h3>{{$data->client->phone}}</h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>الخدمه :</h2>
				</div>
				<div class="col-xs-2">
                    <h3>{{$data->service->name}}</h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>قسم الخدمه :</h2>
				</div>
				<div class="col-xs-2">
					<h3>{{$data->sub_service->name}}</h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2> الصوره :</h2>
				</div>
				<div class="col-xs-2">
					<img 
						src="/storage/images/{{$data->image->name}}" 
						alt="{{$data->image->code}}"
						style="width: 500px;">
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>الفئه</h2>
				</div>
				<div class="col-xs-2">
                    <h3>{{$data->class->name}} - 
                        @if(count($data->class_type) > 0)
                            @foreach($data->class_type as $type)
                                {{$type->name}}
                            @endforeach
                        @endif
                    </h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8 col-md-8 col-sm-10">
					<h2>الخدمه الاضافيه المجانيه :</h2>
				</div>
				@if($data->free_service !== null)
					<div class="col-xs-2">
						<h3>{{$data->free_service->name}}</h3>
					</div>
				@else
					<div class="col-xs-2">
						<h3>لا توجد خدمات اضافيه مجانيه</h3>
					</div>
				@endif
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>السعر :</h2>
				</div>
				<div class="col-xs-2">
                    @if($data->price !== null)
                        <h3>{{$data->price}}</h3>
                    @else
                        <h3>
                            السعر يحدد من قبل الاداره
                        </h3>
                    @endif
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>طلب الخصم :</h2>
				</div>
				<div class="col-xs-2">
					<h3>
                        @if($data->discount_request)
                             يوجد طلب خصم 
                        @else
                            لا يوجد طلب خصم
                        @endif
                    </h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="col-xs-8">
					<h2>الخصم :</h2>
				</div>
				<div class="col-xs-2">
					<h3>
                        @if($data->discount !== null)
                            {{$data->discount}}
                        @else
                            لم يتم تحديد نسبة خصم  
                        @endif
                    </h3>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
                <a  href="{{route('requests.edit', $data->requestNo)}}" class="btn btn-warning"><i class="fas fa-edit"></i>تعديل</a>
			</div>
		</div>
	</div>
</div>
@endsection