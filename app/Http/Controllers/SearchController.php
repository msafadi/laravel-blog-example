<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $posts = Post::where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('content','LIKE', "%{$keyword}%")
            ->latest()
            ->paginate();

        return view('front.search', [
            'keyword' => $keyword,
            'posts' => $posts,
        ]);
    }
}
