<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required|min:2']);
        // $post->addComment(request('body'));
        auth()->user()->userComment(
            new Comment([
                'body' => request('body'),
                'post_id' => $post->id
                ])
            );
        return back();
    }
}
