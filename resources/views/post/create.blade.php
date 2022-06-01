@extends('layout.app')

@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <input type="text" placeholder="Titel" name="title">
        <br>
        <textarea name="content" placeholder="Content"></textarea>
        <br>
        <select name="board_id">
            @foreach ($boards as $board)
                <option value="{{ $board->id }}">{{ $board->name }}</option>
            @endforeach
        </select>
        <br>
        <select name="categories[]" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" value="Speichern">
    </form>

    <hr>

    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }} - Board: {{ $post->board->name }}</li>
        @endforeach
    </ul>

    {{ $posts->links() }}

@endsection
