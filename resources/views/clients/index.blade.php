@if(count($clients) > 0)
    @foreach($clients as $client)
        Name: {{ $client->name }}
        Phone: {{ $client->phone }}
    @endforeach
@endif