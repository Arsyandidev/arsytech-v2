<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use App\Support\ImageUploader;
use App\Support\VideoUploader;
use Illuminate\Http\Request;
use Throwable;

class GalleryPhotoController extends Controller
{
    public function store(Request $request, Gallery $gallery)
    {
        $request->validate([
            'media' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,mp4,mov,webm', 'max:10240'],
            'caption' => ['nullable', 'string', 'max:500'],
        ]);

        $file = $request->file('media');
        $isVideo = str_starts_with((string) $file->getMimeType(), 'video/');

        try {
            $stored = $isVideo
                ? VideoUploader::store($file, 'galeri/'.$gallery->id)
                : ImageUploader::store($file, 'galeri/'.$gallery->id) + ['media_type' => 'image'];
        } catch (Throwable $e) {
            report($e);

            return response()->json(['message' => $isVideo
                ? 'Video tidak bisa disimpan. Pastikan formatnya MP4, MOV, atau WebM dan ukurannya tidak melebihi 10 MB.'
                : 'Foto tidak bisa diproses. Coba file lain.'], 422);
        }

        $photo = $gallery->photos()->create($stored + [
            'caption' => $request->input('caption'),
            'sort_order' => (int) $gallery->photos()->max('sort_order') + 1,
        ]);

        $gallery->touch();

        return response()->json([
            'html' => view('dashboard.galleries.photo', compact('photo'))->render(),
            'media_type' => $photo->media_type,
        ], 201);
    }

    public function update(Request $request, GalleryPhoto $photo)
    {
        $data = $request->validate([
            'caption' => ['nullable', 'string', 'max:500'],
        ]);

        $photo->update($data);

        return response()->json(['message' => 'Keterangan tersimpan.']);
    }

    public function reorder(Request $request, Gallery $gallery)
    {
        $ids = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer'],
        ])['order'];

        foreach (array_values($ids) as $index => $id) {
            $gallery->photos()->whereKey($id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['message' => 'Urutan media tersimpan.']);
    }

    public function destroy(GalleryPhoto $photo)
    {
        $photo->delete();

        return response()->json(['message' => 'Media dihapus.']);
    }
}
