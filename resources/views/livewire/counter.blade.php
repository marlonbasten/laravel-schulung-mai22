<div>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>

    <button wire:click="rerenderPosts()">Neuladen</button>
</div>

