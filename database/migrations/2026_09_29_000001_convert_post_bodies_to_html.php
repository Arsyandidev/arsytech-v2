<?php

use App\Support\HtmlSanitizer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('posts')->orderBy('id')->each(function ($post) {
            $html = Str::markdown((string) $post->body, [
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);

            DB::table('posts')->where('id', $post->id)->update(['body' => HtmlSanitizer::clean($html)]);
        });
    }

    public function down(): void
    {
    }
};
