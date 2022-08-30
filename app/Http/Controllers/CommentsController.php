<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Notifications\NewCommentNotification;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|int|exists:posts,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'body' => 'required|string',
        ]);
        
        $comment = Comment::create( $request->all() );

        $user = User::where('type', '=', 'admin')->first();
        $user->notify( new NewCommentNotification($comment) );
        
        return redirect()
            ->back()
            ->with('success', 'Comment added successfuly');
    }
}
