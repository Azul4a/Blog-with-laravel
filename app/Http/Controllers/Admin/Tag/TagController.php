<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::withCount('posts')->paginate();
        return view('admin.tags.index', compact('tags'));
    }

    public function create() {
        return view('admin.tags.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('tag.index');
    }

    public function update(UpdateRequest $request, Tag $tag) {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag) {
        return view('admin.tags.edit', compact('tag'));
    }

    public function destroy(Tag $tag) {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
