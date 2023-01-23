<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index(FilterRequest $request) {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::latest()->filter($filter)->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function show($post) {
        $categories = Category::all();
        $post = Post::with('comments.user:id,name,avatar','comments.replies.user:id,name,avatar')->findOrFail($post);
//        dd($post->toArray());
        return view('post.show', compact(['post', 'categories']));
    }
}
