<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
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

        public function show($id, $slug)
            {
                $post = Post::with(['user', 'categories', 'tags', 'media'])
                            ->where('id', $id)
                            ->where('slug', $slug)
                            ->firstOrFail();

                $latestPosts = Post::latest('published_at')
                            ->with('user')
                            ->take(4)
                            ->get();

                $allCategories = Category::withCount('posts')->orderBy('name')->get();

                // Post anterior (menor ID publicado)
                $previousPost = Post::where('id', '<', $post->id)
                    ->orderBy('id', 'desc')
                    ->first();

                // Post siguiente (mayor ID publicado)
                $nextPost = Post::where('id', '>', $post->id)
                    ->orderBy('id')
                    ->first();



                return view('blog.view', compact('post', 'latestPosts', 'allCategories', 'previousPost', 'nextPost'));
            }

       public function listAll(Request $request)
        {
            $query = $request->input('search');

            $postQuery = Post::with(['user', 'categories'])
                ->latest('published_at');

            if ($query) {
                $postQuery->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
                });
            }

            $allPosts = $postQuery->paginate(9)->appends($request->query());

            $allCategories = Category::withCount('posts')->orderBy('name')->get();
            $tags = Tag::all();
            $latestPosts = Post::latest('published_at')->with('user')->take(4)->get();

            return view('blog.index', compact('allPosts', 'allCategories', 'latestPosts', 'tags'));
        }





}
