<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class VideoUploader
{
    public const MAX_FILE_BYTES = 10 * 1024 * 1024;

    public static function store(UploadedFile $file, string $directory): array
    {
        if ($file->getSize() > static::MAX_FILE_BYTES) {
            throw new RuntimeException('Ukuran video melebihi batas 10 MB.');
        }

        $extension = match ($file->getMimeType()) {
            'video/mp4' => 'mp4',
            'video/quicktime' => 'mov',
            'video/webm' => 'webm',
            default => throw new RuntimeException('Format video tidak didukung.'),
        };

        $path = $directory.'/'.now()->format('Y/m').'/'.Str::random(32).'.'.$extension;
        $stream = fopen($file->getRealPath(), 'rb');

        if ($stream === false) {
            throw new RuntimeException('Video tidak bisa dibaca.');
        }

        try {
            $stored = Storage::disk(ImageUploader::DISK)->put($path, $stream);
        } finally {
            fclose($stream);
        }

        if (! $stored) {
            throw new RuntimeException('Video gagal disimpan.');
        }

        return [
            'path' => $path,
            'thumb_path' => '',
            'width' => null,
            'height' => null,
            'media_type' => 'video',
        ];
    }
}
