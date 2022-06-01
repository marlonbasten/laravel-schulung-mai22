<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Board;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        // $posts = Post::where('content', 'Mega toll')
        //     ->orWhere('title', 'test')
        //     ->orderBy('id', 'desc')
        //     ->select([
        //         'id',
        //         'title',
        //         'content'
        //     ])
        //     ->limit(5)
        //     ->get();

        // $board = Board::find(1);
        // $post = Post::find(26);
        // $category = Category::find(2);

        // dd($category->posts);

        // dd($board->posts);

        // $post = Post::onlyTrashed()->get()->each->forceDelete();

        // $post = Post::all();
        // Post::whereIn('id', $post->pluck('id'))->delete();

        $category_ids = [3];
        $post = Post::find(29);
        $post->categories()->syncWithoutDetaching($category_ids);

        $boards = Board::all();
        $posts = Post::with(['board'])->paginate(5)
        $categories = Category::all();

        return view('post.create', [
            'boards' => $boards,
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function store(StorePostRequest $request)
    {
        // $data = $request->all(); - Nur benutzen wenn keine Validations vorhanden sind, aber am besten nie benutzen :)

        $post = Post::create($request->validated());
        $post->categories()->attach($request->categories);

        return 'Gespeichert via Controller!';
    }
}
