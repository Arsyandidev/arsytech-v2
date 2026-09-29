<?php

namespace App\Support;

use HTMLPurifier;
use HTMLPurifier_Config;

class HtmlSanitizer
{
    protected static ?HTMLPurifier $purifier = null;

    public static function clean(?string $html): string
    {
        return trim(static::purifier()->purify((string) $html));
    }

    public static function isEmpty(?string $html): bool
    {
        $text = trim(html_entity_decode(strip_tags((string) $html, '<img>'), ENT_QUOTES | ENT_HTML5, 'UTF-8'), " \t\n\r\0\x0B\u{00A0}");

        return $text === '';
    }

    protected static function purifier(): HTMLPurifier
    {
        if (static::$purifier) {
            return static::$purifier;
        }

        $cache = storage_path('framework/cache/htmlpurifier');

        if (! is_dir($cache)) {
            mkdir($cache, 0755, true);
        }

        $config = HTMLPurifier_Config::createDefault();
        $config->set('Cache.SerializerPath', $cache);
        $config->set('HTML.Allowed', implode(',', [
            'p[style]', 'br', 'span[style]', 'div[style]',
            'h2[style]', 'h3[style]', 'h4[style]',
            'strong', 'b', 'em', 'i', 'u', 's', 'sub', 'sup',
            'blockquote[style]', 'pre', 'code', 'hr',
            'ul[style]', 'ol[style]', 'li[style]',
            'a[href|title|target|rel]',
            'img[src|alt|title|width|height|style]',
            'table[style]', 'thead', 'tbody', 'tfoot', 'tr', 'th[style|colspan|rowspan]', 'td[style|colspan|rowspan]',
        ]));
        $config->set('CSS.AllowedProperties', [
            'text-align', 'font-size', 'text-decoration', 'font-weight', 'font-style',
            'width', 'height', 'max-width', 'float', 'margin-left', 'margin-right', 'padding-left',
        ]);
        $config->set('Attr.AllowedFrameTargets', ['_blank']);
        $config->set('HTML.TargetNoopener', true);
        $config->set('URI.AllowedSchemes', ['http' => true, 'https' => true, 'mailto' => true, 'tel' => true]);
        $config->set('AutoFormat.RemoveEmpty', false);

        return static::$purifier = new HTMLPurifier($config);
    }
}
