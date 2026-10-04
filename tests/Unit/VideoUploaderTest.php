<?php

namespace Tests\Unit;

use App\Support\VideoUploader;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RuntimeException;
use Tests\TestCase;

class VideoUploaderTest extends TestCase
{
    public function test_it_stores_the_original_video_without_a_thumbnail(): void
    {
        Storage::fake('public');

        $stored = VideoUploader::store(
            UploadedFile::fake()->create('sample.mp4', 5, 'video/mp4'),
            'galeri/1'
        );

        $this->assertSame('video', $stored['media_type']);
        $this->assertSame('', $stored['thumb_path']);
        $this->assertStringEndsWith('.mp4', $stored['path']);
        $this->assertTrue(Storage::disk('public')->exists($stored['path']));
    }

    public function test_it_rejects_a_video_larger_than_ten_megabytes(): void
    {
        $this->expectException(RuntimeException::class);

        VideoUploader::store(
            UploadedFile::fake()->create('large.mp4', 10241, 'video/mp4'),
            'galeri/1'
        );
    }
}
