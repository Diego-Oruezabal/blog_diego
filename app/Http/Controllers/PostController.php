<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::with(['user', 'categories'])
                 ->latest('published_at')
                 ->take(4)
                 ->get();

    return view('welcome', compact('posts'));
}
}
