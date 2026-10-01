<?php

namespace App\Support\Analytics;

class Client
{
    public static function maskIp(?string $ip): ?string
    {
        if (! $ip) {
            return null;
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $parts = explode('.', $ip);

            return $parts[0].'.'.$parts[1].'.*.*';
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $groups = explode(':', inet_ntop(inet_pton($ip)));

            return implode(':', array_slice(array_pad($groups, 3, '0'), 0, 3)).':*';
        }

        return null;
    }

    public static function hashIp(string $ip): string
    {
        return hash_hmac('sha256', $ip, (string) config('app.key'));
    }

    public static function isBot(?string $userAgent): bool
    {
        if (! $userAgent || strlen($userAgent) < 12) {
            return true;
        }

        return (bool) preg_match('/bot|crawl|spider|slurp|scrape|fetch|preview|monitor|uptime|lighthouse|headless|phantom|curl|wget|python|httpclient|java\/|go-http|okhttp|axios|node-fetch|facebookexternalhit|whatsapp\/|telegram|discord|slack|embedly|pinterest|vkshare|quora link|bitlybot|semrush|ahrefs|mj12|dotbot|petal|yandex|baidu|bytespider|gptbot|claudebot|ccbot|amazonbot|applebot/i', $userAgent);
    }

    public static function device(string $userAgent): string
    {
        if (preg_match('/ipad|tablet|playbook|silk|(android(?!.*mobile))/i', $userAgent)) {
            return 'Tablet';
        }

        if (preg_match('/mobi|iphone|ipod|android|blackberry|opera mini|iemobile/i', $userAgent)) {
            return 'Mobile';
        }

        return 'Desktop';
    }

    public static function browser(string $userAgent): string
    {
        return match (true) {
            (bool) preg_match('/Instagram/i', $userAgent) => 'Instagram (in-app)',
            (bool) preg_match('/FBAN|FBAV|FB_IAB/i', $userAgent) => 'Facebook (in-app)',
            (bool) preg_match('/Line\//i', $userAgent) => 'LINE (in-app)',
            (bool) preg_match('/Edg(e|A|iOS)?\//i', $userAgent) => 'Edge',
            (bool) preg_match('/OPR\/|Opera/i', $userAgent) => 'Opera',
            (bool) preg_match('/SamsungBrowser/i', $userAgent) => 'Samsung Internet',
            (bool) preg_match('/UCBrowser/i', $userAgent) => 'UC Browser',
            (bool) preg_match('/Firefox|FxiOS/i', $userAgent) => 'Firefox',
            (bool) preg_match('/Chrome|CriOS/i', $userAgent) => 'Chrome',
            (bool) preg_match('/Safari/i', $userAgent) => 'Safari',
            default => 'Lainnya',
        };
    }

    public static function os(string $userAgent): string
    {
        return match (true) {
            (bool) preg_match('/iPhone|iPad|iPod/i', $userAgent) => 'iOS',
            (bool) preg_match('/Android/i', $userAgent) => 'Android',
            (bool) preg_match('/Windows/i', $userAgent) => 'Windows',
            (bool) preg_match('/Mac OS X|Macintosh/i', $userAgent) => 'macOS',
            (bool) preg_match('/CrOS/i', $userAgent) => 'ChromeOS',
            (bool) preg_match('/Linux/i', $userAgent) => 'Linux',
            default => 'Lainnya',
        };
    }

    public static function source(?string $referrerHost, ?string $utmSource, string $ownHost): string
    {
        $utm = strtolower(trim((string) $utmSource));

        if ($utm !== '') {
            return static::sourceName($utm) ?? ucfirst(substr($utm, 0, 40));
        }

        $host = strtolower((string) $referrerHost);

        if ($host === '' || $host === strtolower($ownHost) || str_ends_with($host, '.'.strtolower($ownHost))) {
            return 'Langsung';
        }

        return static::sourceName($host) ?? preg_replace('/^(www\.|m\.|l\.|lm\.)/', '', $host);
    }

    protected static function sourceName(string $value): ?string
    {
        $map = [
            'google' => 'Google',
            'bing' => 'Bing',
            'yahoo' => 'Yahoo',
            'duckduckgo' => 'DuckDuckGo',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'fb.' => 'Facebook',
            'fb' => 'Facebook',
            'linkedin' => 'LinkedIn',
            'lnkd.in' => 'LinkedIn',
            'whatsapp' => 'WhatsApp',
            'wa.me' => 'WhatsApp',
            'wa' => 'WhatsApp',
            't.co' => 'X (Twitter)',
            'twitter' => 'X (Twitter)',
            'x.com' => 'X (Twitter)',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok',
            'telegram' => 'Telegram',
            't.me' => 'Telegram',
            'chatgpt' => 'ChatGPT',
            'openai' => 'ChatGPT',
            'perplexity' => 'Perplexity',
            'claude.ai' => 'Claude',
        ];

        foreach ($map as $needle => $name) {
            if ($value === $needle || str_contains($value, $needle.'.') || str_contains($value, '.'.$needle) || (strlen($needle) > 3 && str_contains($value, $needle))) {
                return $name;
            }
        }

        return null;
    }
}
