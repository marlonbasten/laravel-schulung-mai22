<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Imports\PostImport;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return $posts->map(fn($post) => PostResource::make($post));
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post($request->validated());
        if ($request->has('image')) {
            $image = $request->file('image');

            Excel::import(new PostImport(), $image->getPathname());

            $filename = time() . '-' . Str::uuid() . '-' . $image->getClientOriginalName();
            $path = Storage::putFileAs('/', $image, $filename);
            $post->file_path = $path;
            $post->file_disk = config('filesystems.default');
            $post->file_type = $image->getMimeType();
        }
        $post->save();
        $post->categories()->attach($request->categories);

//        event(new PostCreatedEvent($post));

        return PostResource::make($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([]);
    }
}
