<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Support\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $posts = Post::query()
            ->when($request->filled('q'), fn ($query) => $query->where('title', 'like', '%'.$request->query('q').'%'))
            ->when($status === 'terbit', fn ($query) => $query->published())
            ->when($status === 'draf', fn ($query) => $query->whereNull('published_at'))
            ->when($status === 'terjadwal', fn ($query) => $query->where('published_at', '>', now()))
            ->latest('updated_at')
            ->paginate(15)
            ->withQueryString();

        return view('dashboard.posts.index', compact('posts', 'status'));
    }

    public function create()
    {
        return view('dashboard.posts.form', [
            'post' => new Post(['published_at' => now()]),
            'categories' => $this->categories(),
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->author()->associate($request->user());
        $this->save($request, $post);

        return redirect()->route('dashboard.blog.edit', $post)->with('success', 'Artikel berhasil disimpan.');
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.form', [
            'post' => $post,
            'categories' => $this->categories(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->save($request, $post);

        return redirect()->route('dashboard.blog.edit', $post)->with('success', 'Perubahan artikel sudah disimpan.');
    }

    public function destroy(Post $post)
    {
        ImageUploader::delete($post->cover_path, $post->cover_thumb_path);
        $post->delete();

        return redirect()->route('dashboard.blog.index')->with('success', 'Artikel "'.$post->title.'" sudah dihapus.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:10240'],
        ]);

        $stored = ImageUploader::store($request->file('image'), 'blog/konten', 1600, null);

        return response()->json(['data' => ['filePath' => ImageUploader::url($stored['path'])]]);
    }

    protected function save(Request $request, Post $post): void
    {
        $request->merge(['slug' => Str::slug($request->input('slug') ?: $request->input('title'))]);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200', Rule::unique('posts', 'slug')->ignore($post->id)],
            'category' => ['nullable', 'string', 'max:60'],
            'excerpt' => ['nullable', 'string', 'max:300'],
            'body' => ['required', 'string'],
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'remove_cover' => ['nullable', 'boolean'],
            'status' => ['required', Rule::in(['draf', 'terbit'])],
            'published_at' => ['nullable', 'date'],
        ]);

        $category = Str::squish($data['category'] ?? '');
        $publishedAt = $data['published_at'] ?? null;

        $post->fill([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'category' => $category !== '' ? $category : null,
            'excerpt' => $data['excerpt'] ?? null,
            'body' => $data['body'],
            'published_at' => $data['status'] === 'terbit'
                ? ($publishedAt ? Carbon::parse($publishedAt) : now())
                : null,
        ]);

        if ($request->boolean('remove_cover') || $request->hasFile('cover')) {
            ImageUploader::delete($post->cover_path, $post->cover_thumb_path);
            $post->cover_path = $post->cover_thumb_path = null;
        }

        if ($request->hasFile('cover')) {
            $stored = ImageUploader::store($request->file('cover'), 'blog/sampul', 1600, 800);
            $post->cover_path = $stored['path'];
            $post->cover_thumb_path = $stored['thumb_path'];
        }

        $post->save();
    }

    protected function categories()
    {
        return Post::whereNotNull('category')->distinct()->orderBy('category')->pluck('category');
    }
}
