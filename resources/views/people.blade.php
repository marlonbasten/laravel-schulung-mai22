<ul>
    @foreach ($people as $person)
        {{ $loop->last }}
        <li>{{ $person }}</li>
    @endforeach
</ul>
