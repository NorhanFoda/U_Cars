@if(count($services) > 0)
    @foreach($services as $service)
        {{ $service }}
    @endforeach
@endif