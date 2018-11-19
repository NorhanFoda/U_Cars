@if(count($data)>0)
    @foreach($data as $item)
        {{ $item->client->name }}
        {{ $item->client->phone }}
        {{ $item->requests_count }}
    @endforeach
@endif