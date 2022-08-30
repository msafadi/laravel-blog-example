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

        // $comments = Comment::where('post_id', '=', $post->id)
        //     ->latest()
        //     ->get();
        $comments = $post->comments()->latest()->get();

        $prevPost = Post::where('id', '<', $post->id)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->first();

        $nextPost = Post::where('id', '>', $post->id)
            ->orderBy('id', 'ASC')
            ->limit(1)
            ->first();

        return view('front.posts.show', [
            'post' => $post,
            'comments' => $comments,
            'prevPost' => $prevPost,
            'nextPost' => $nextPost,
        ]);
    }
}
