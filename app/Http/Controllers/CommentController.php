<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show()
    {
        $comments = Comment::with(['post', 'user'])->get();

        foreach ($comments as $comment) {
//            dump($comment);
            dump($comment->post);
//            dump($comment->user);
        }
    }
}
