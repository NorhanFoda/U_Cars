@if(count($colors) > 0)
    @foreach($colors as $color)
        {{ $color->name }}
    @endforeach
@endif