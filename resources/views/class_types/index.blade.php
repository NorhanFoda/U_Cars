@if(count($types) > 0)
    @foreach($types as $type)
        {{ $type->name }}
    @endforeach
@endif