<?php

namespace App\Services\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Service
{
    public function store($data) {
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update($post, $data) {

        $tags = (array_key_exists('tags', $data))? $data['tags'] : '';
        unset($data['tags']);

        $post->update($data);
        if ($tags)
        $post->tags()->sync($tags);
    }
}
