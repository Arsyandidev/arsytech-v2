<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori');
        $search = trim((string) $request->query('q'));
        $filtered = $category || $search !== '';

        $query = Post::published()
            ->with('author')
            ->when($category, fn ($query) => $query->where('category', $category))
            ->when($search !== '', fn ($query) => $query->where(fn ($query) => $query
                ->where('title', 'like', "%{$search}%")
                ->orWhere('excerpt', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%")))
            ->latest('published_at');

        $featured = ! $filtered && ! $request->query('page') ? (clone $query)->first() : null;

        $posts = $query
            ->when($featured, fn ($query) => $query->whereKeyNot($featured->id))
            ->paginate(9)
            ->withQueryString();

        return view('pages.blog.index', [
            'featured' => $featured,
            'posts' => $posts,
            'category' => $category,
            'search' => $search,
            'categories' => Post::published()->whereNotNull('category')->distinct()->orderBy('category')->pluck('category'),
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->isPublished() || Auth::check(), 404);

        $post->load('author');

        $related = Post::published()
            ->whereKeyNot($post->id)
            ->when($post->category, fn ($query) => $query->orderByRaw('category = ? DESC', [$post->category]))
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.blog.show', [
            'post' => $post,
            'related' => $related,
            'latest' => Post::published()->whereKeyNot($post->id)->latest('published_at')->take(4)->get(),
        ]);
    }
}
