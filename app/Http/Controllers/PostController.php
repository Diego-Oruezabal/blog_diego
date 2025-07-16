<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            $categorySlug = $request->input('category');
            $tagSlug = $request->input('tag');
            $authorId = $request->input('author');

            $postQuery = Post::with(['user', 'categories', 'tags'])
                ->latest('published_at');

            if ($query) {
                $postQuery->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
                });
            }

            if ($categorySlug) {
                $postQuery->whereHas('categories', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            }

            if ($tagSlug) {
                $postQuery->whereHas('tags', function ($q) use ($tagSlug) {
                    $q->where('slug', $tagSlug);
                });
            }

            if ($authorId) {
                $postQuery->where('user_id', $authorId);
            }

            $allPosts = $postQuery->paginate(9)->appends($request->query());

            $allCategories = Category::withCount('posts')->orderBy('name')->get();
            $tags = Tag::all();
            $latestPosts = Post::latest('published_at')->with('user')->take(4)->get();

            return view('blog.index', compact('allPosts', 'allCategories', 'latestPosts', 'tags'));
        }


        public function byCategory($slug)
        {
            $category = Category::where('slug', $slug)->firstOrFail();

            $allPosts = $category->posts()
                ->with(['user', 'categories'])
                ->latest('published_at')
                ->paginate(9);

            $allCategories = Category::withCount('posts')->orderBy('name')->get();
            $tags = Tag::all();
            $latestPosts = Post::latest('published_at')->with('user')->take(4)->get();

            return view('blog.index', compact('allPosts', 'allCategories', 'latestPosts', 'tags', 'category'));
        }


       public function byTag($slug)
        {
            $tag = Tag::where('slug', $slug)->firstOrFail();

            $allPosts = $tag->posts()
                ->with(['user', 'categories'])
                ->latest('published_at')
                ->paginate(9);

            $allCategories = Category::withCount('posts')->orderBy('name')->get();
            $tags = Tag::all();
            $latestPosts = Post::latest('published_at')->with('user')->take(4)->get();

            return view('blog.index', compact('allPosts', 'allCategories', 'latestPosts', 'tags', 'tag'));
        }

        public function list()
        {
            $posts = Post::with(['categories', 'tags'])
                        ->where('user_id', Auth::id())
                        ->latest('published_at')
                        ->paginate(10);

            return view('blog.list', compact('posts'));
        }

        public function create()
        {
            $categories = Category::all();
            $tags = Tag::all();

            return view('blog.create', compact('categories', 'tags'));
        }


        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'summary' => 'nullable|string|max:500',
                'content' => 'required|string',
                'categories' => 'required|array',
                'tags' => 'nullable|array',
                'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'status' => 'required|in:published,draft',
            ]);

            $post = new Post();
            $post->user_id = auth()->id();
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->summary = $request->summary;
            $post->content = $request->content;
            $post->status = $request->status;
            $post->published_at = $request->status === 'published' ? now() : null;

            // Guardar imagen si se sube
            if ($request->hasFile('featured_image')) {
                $path = $request->file('featured_image')->store('posts', 'public');
                $post->featured_image = $path;
            }

            $post->save();

            // Relacionar categorías y tags
            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);

            return redirect()->route('posts.list')->with('success', 'Publicación creada correctamente.');
        }




}
