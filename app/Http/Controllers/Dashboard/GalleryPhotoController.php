<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use App\Support\ImageUploader;
use Illuminate\Http\Request;
use Throwable;

class GalleryPhotoController extends Controller
{
    public function store(Request $request, Gallery $gallery)
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'caption' => ['nullable', 'string', 'max:500'],
        ]);

        try {
            $stored = ImageUploader::store($request->file('photo'), 'galeri/'.$gallery->id);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Foto tidak bisa diproses. Coba file lain.'], 422);
        }

        $photo = $gallery->photos()->create($stored + [
            'caption' => $request->input('caption'),
            'sort_order' => (int) $gallery->photos()->max('sort_order') + 1,
        ]);

        $gallery->touch();

        return response()->json([
            'html' => view('dashboard.galleries.photo', compact('photo'))->render(),
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

        return response()->json(['message' => 'Urutan foto tersimpan.']);
    }

    public function destroy(GalleryPhoto $photo)
    {
        $photo->delete();

        return response()->json(['message' => 'Foto dihapus.']);
    }
}
