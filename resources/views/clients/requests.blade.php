@if(count($data)>0)
    Request of Client: {{ $data[0]->client->name }}
    Phone: {{ $data[0]->client->phone }}
    @foreach($data as $item)
        {{ $item->image->name }}
        {{ $item->sub_service->name }}
    @endforeach
@endif