<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();

        $comments = Comment::where('post_id', '=', $post->id)
            ->latest()
            ->get();

        return view('front.posts.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
}
