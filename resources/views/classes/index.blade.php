@if(count($classes) > 0)
    @foreach($classes as $class)
        {{ $class->name }}
    @endforeach
@endif