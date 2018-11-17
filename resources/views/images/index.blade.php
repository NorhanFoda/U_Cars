@if(count($images) > 0)
    @foreach($images as $image)
        {{ $image->name }}
    @endforeach
@endif