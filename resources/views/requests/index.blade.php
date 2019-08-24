@extends('layouts.app')
@section('content')
	<div class="content-wrapper">

					<!-- Content area -->
					<div class="content">
	
						<!-- Main charts -->
						<div class="panel panel-flat">
							<div class="panel-heading">
            <h1 class="panel-title">طلبات العملاء</h1>
            <form action="/requests/search" method="POST">
                {{ csrf_field() }}
               <input type="text" class="form-control " id="exampleInputEmail3" name="requestNo" placeholder="بحث برقم الطلب ">
            </form>
        </div>
    </div>

   <div class="panel-body">
			<div class="table-responsive">
				<div class="container-fluid">
				     @if(count($data) > 0)

					<table class="table table-bordered">
					   <thead class=" text-primary">
               
                        <!--<th>-->
                        <!--    رقم الطلب-->
                        <!--</th>-->
                        <th>
                            اسم العميل
                        </th>
                        <th>
                            الهاتف 
                        </th>
                        <th>
                            اسم قسم الخدمه 
                        </th>
                        <th>
                            اللون 
                        </th>
                        <th>
                            الصوره 
                        </th>
                        <th>
                            الفئه 
                        </th>
                        <th>
                            الخدمه الاضافيه المجانيه 
                        </th>
                        <th>
                            السعر
                        </th>
                        <th>
                            ضبط
                        </th>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <!--<td>-->
                                <!--    <h4>{{ $item->requestNo }}</h4>-->
                                <!--</td>-->
                                <td>
                                    <h4>{{ $item->client['name'] }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $item->client['phone'] }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $item->sub_service->name }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $item->color->name }}</h4>
                                </td>
                                <td>
                                    <img src="/storage/images/{{ $item->image['name'] }}"
                                            alt="{{ $item->image['name'] }}"
                                            width="100px"
                                            height="100px">
                                </td>
                                <td>
                                    <h4>{{ $item->classCat['name'] }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $item->free_service->name }}</h4>
                                </td>
                                <td>
                                    <h4>{{ $item->price }}</h4>
                                </td>
                                <td>
                                    <!--<a  href="{{route('requests.show', $item->requestNo)}}" class="btn btn-info"><i class="fas fa-map-marker-exclamation"></i>معاينه</a>-->
                                    
                                    <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong-{{$item->requestNo}}"><i class="fas fa-map-marker-exclamation" ></i> معاينه</button>
																<!-- Modal -->
																<div class="modal fade bd-example-modal-lg" id="exampleModalLong-{{$item->requestNo}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
																		<div class="modal-dialog width-modal" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLongTitle">معاينة الطلب</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																			</div>
																			<div class="modal-body">
																				<div class="container-fluid">
																					<div class="row">
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> رقم الطلب :</span>
																							<span> {{$item->requestNo}}</span>
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> اسم العميل  :</span>
																							@if($item->client['name'] !== null)
																							<span> {{ $item->client['name'] }}</span>
																							@endif
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> الهاتف  :</span>
																							<span> {{ $item->client['phone'] }}</span>
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> الخدمه   :</span>
																							<span>{{ $item->service->name }}</span>
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> قسم الخدمة   :</span>
																							<span> {{$item->sub_service->name}}</span>
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span>  الفئه   :</span>
																							
																							@if($item->classCat !== null)
                                                                                                    <span> {{$item->classCat->name}} - 
                                                                                                        @if(count($item->class_type) > 0)
                                                                                                            @foreach($item->class_type as $type)
                                                                                                                {{$type->name}}
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </span>
                                                                                                @else
                                                                                                    <span>لا يوجد فئه</span>
                                                                                                @endif
																							
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> السعر:</span>
																							 @if($item->price !== null)
                                                                                                <span>{{$item->price}}</span>
                                                                                            @else
                                                                                                <span>
                                                                                                    السعر يحدد من قبل الاداره
                                                                                                </span>
                                                                                            @endif
                                                                        																						
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> طلب الخصم:</span>
																							@if($item->discount_request==1)
                                                                                                <span> 
                                                                                                يوجد طلب خصم 
                                                                                                </span>
                                                                                            @else
                                                                                                <span>
                                                                                                لا يوجد طلب خصم
                                                                                                </span>
                                                                                            @endif
																						
																						</div>
																						<div class="col-md-4 col-sm-6 col-xs-12">
																							<span> نسبة الخصم:</span>
																							@if($item->discount !== null)
                                                                                                <span> {{$item->discount}}
                                                                                                </span>
                                                                                            @else
                                                                                                <span>
                                                                                                    لم يتم تحديد نسبة خصم  
                                                                                            </span>
                                                                                            @endif
																							
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="modal-footer">
																			    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
																			</div>
																		</div>
																		</div>
																	</div>
                                    
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
           
				</div>
			 </div>
		   </div>
		 </div>	
	  </div>
	</div>
  </div>
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
