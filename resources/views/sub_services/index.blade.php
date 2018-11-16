@if(count($sub_services) > 0)
    @foreach($sub_services as $sub_service)
        {{ $sub_service->name }}
    @endforeach
@endif