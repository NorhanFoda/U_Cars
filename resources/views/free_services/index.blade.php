@if(count($free_services) > 0)
    @foreach ($free_services as $free_service)
        {{ $free_service->name }}
    @endforeach
@endif