<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        //middleware provide access to auth users except index,show
        //guests can acces to index and show, not to create and store
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();
                
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
            ]);

        // Post::create(request(['title', 'body', 'user_id']));
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        //     ]);
        

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        session()->flash('message', 'Your post has now been published.');
        return redirect('/');
    }
}
