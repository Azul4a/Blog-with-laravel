<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\Service;
use Storage;

class PostController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return(view('admin.posts.create', compact('categories', 'tags')));
    }

    public function update(UpdateRequest $request, Post $post) {
        $data = $request->validated();
        $data['thumbnail'] = Storage::disk('public')->put('/images', $data['thumbnail']);
        $this->service->update($post, $data);

        return redirect()->route('admin.post.index', $post->id);
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        $data['thumbnail'] = Storage::disk('public')->put('/images', $data['thumbnail']);
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post) {
        $categories = Category::all();
        return view('post.show', compact('post', 'categories'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact(['post', 'categories', 'tags']));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
