@if(count($data)>0)
    @foreach($data as $item)
        {{ $item->client->name }}
        {{ $item->client->phone }}
        {{ $item->sub_service->name }}
    @endforeach
@endif