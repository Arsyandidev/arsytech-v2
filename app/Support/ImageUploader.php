<?php

namespace App\Support;

use GdImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class ImageUploader
{
    public const DISK = 'public';

    public static function store(UploadedFile $file, string $directory, int $maxSize = 2000, ?int $thumbSize = 800): array
    {
        $source = static::load($file);
        $name = $directory.'/'.now()->format('Y/m').'/'.Str::random(32);

        $main = static::fit($source, $maxSize);
        $result = [
            'path' => static::save($main, $name.'.webp'),
            'width' => imagesx($main),
            'height' => imagesy($main),
            'thumb_path' => null,
        ];

        if ($thumbSize) {
            $thumb = static::fit($source, $thumbSize);
            $result['thumb_path'] = static::save($thumb, $name.'-thumb.webp');
        }

        return $result;
    }

    public static function url(?string $path): ?string
    {
        return $path ? asset('storage/'.$path) : null;
    }

    public static function delete(?string ...$paths): void
    {
        $paths = array_filter($paths);

        if ($paths) {
            Storage::disk(static::DISK)->delete($paths);
        }
    }

    protected static function load(UploadedFile $file): GdImage
    {
        $image = @imagecreatefromstring(file_get_contents($file->getRealPath()));

        if (! $image) {
            throw new RuntimeException('Gambar tidak bisa dibaca.');
        }

        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);

        return static::orient($image, $file);
    }

    protected static function orient(GdImage $image, UploadedFile $file): GdImage
    {
        if (! function_exists('exif_read_data') || ! in_array($file->getMimeType(), ['image/jpeg', 'image/jpg'])) {
            return $image;
        }

        $orientation = @exif_read_data($file->getRealPath())['Orientation'] ?? 1;

        return match ((int) $orientation) {
            3 => imagerotate($image, 180, 0),
            6 => imagerotate($image, -90, 0),
            8 => imagerotate($image, 90, 0),
            default => $image,
        };
    }

    protected static function fit(GdImage $image, int $max): GdImage
    {
        $width = imagesx($image);
        $height = imagesy($image);
        $ratio = min(1, $max / max($width, $height));

        if ($ratio === 1) {
            return $image;
        }

        $newWidth = (int) round($width * $ratio);
        $newHeight = (int) round($height * $ratio);
        $canvas = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($canvas, false);
        imagesavealpha($canvas, true);
        imagecopyresampled($canvas, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        return $canvas;
    }

    protected static function save(GdImage $image, string $path): string
    {
        ob_start();
        imagewebp($image, null, 82);
        Storage::disk(static::DISK)->put($path, ob_get_clean());

        return $path;
    }
}
