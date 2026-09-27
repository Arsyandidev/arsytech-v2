<?php

namespace App\Support;

class StructuredData
{
    protected array $breadcrumbs = [];

    protected array $questions = [];

    protected array $extra = [];

    public function breadcrumbs(array $items): void
    {
        $this->breadcrumbs = $items;
    }

    public function questions(array $items): void
    {
        array_push($this->questions, ...$items);
    }

    public function add(array $node): void
    {
        $this->extra[] = $node;
    }

    public function toJson(): string
    {
        $graph = [$this->organization()];

        if ($this->breadcrumbs) {
            $graph[] = $this->breadcrumbList();
        }

        if ($this->questions) {
            $graph[] = $this->faqPage();
        }

        array_push($graph, ...$this->extra);

        return json_encode(
            ['@context' => 'https://schema.org', '@graph' => $graph],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG
        );
    }

    protected function organization(): array
    {
        $home = url('/').'/';

        return [
            '@type' => 'Organization',
            '@id' => $home.'#organization',
            'name' => config('arsytech.name'),
            'legalName' => config('arsytech.legal_name'),
            'url' => $home,
            'logo' => asset('assets/images/logo-arsytech.png'),
            'description' => config('arsytech.description'),
            'email' => config('arsytech.contact.email'),
            'telephone' => config('arsytech.contact.phone_schema'),
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => config('arsytech.contact.city'),
                'addressRegion' => config('arsytech.contact.region'),
                'addressCountry' => 'ID',
            ],
            'areaServed' => ['@type' => 'Country', 'name' => 'Indonesia'],
            'sameAs' => array_values(config('arsytech.social')),
        ];
    }

    protected function breadcrumbList(): array
    {
        $items = [['Beranda', url('/').'/']];

        foreach ($this->breadcrumbs as $label => $link) {
            $items[] = [$label, $link ?? url()->current()];
        }

        return [
            '@type' => 'BreadcrumbList',
            'itemListElement' => array_map(fn ($item, $index) => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $this->plain($item[0]),
                'item' => $item[1],
            ], $items, array_keys($items)),
        ];
    }

    protected function faqPage(): array
    {
        return [
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn ($item) => [
                '@type' => 'Question',
                'name' => $this->plain($item['question']),
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $this->plain($item['answer'])],
            ], $this->questions),
        ];
    }

    protected function plain(string $text): string
    {
        return html_entity_decode(strip_tags($text), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}
