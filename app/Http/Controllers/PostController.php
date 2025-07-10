<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    $latestPost = Post::with(['user', 'categories'])
                 ->latest('published_at')
                 ->take(4)
                 ->get();

    $allPosts = Post::with(['user', 'categories'])
                 ->latest('published_at')
                 ->paginate(9); // Paginación de 9 en 9

    return view('welcome', compact('latestPost','allPosts'));
}
}
