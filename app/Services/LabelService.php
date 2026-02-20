<?php

namespace App\Services;

class LabelService
{
    public static function gallery(?string $langCode): string
    {
        return match ($langCode) {
            'np' => 'फोटो',
            'nb' => 'किपा',
            'in' => 'गैलरी',
            'cn' => '画廊',
            'jp' => 'ギャラリー',
            'es' => 'Galería',
            'fr' => 'Galerie',
            default => 'Gallery',
        };
    }

    public static function researcher(?string $langCode): string
    {
        return match ($langCode) {
            'np', 'nb', 'in' => 'अनुसन्धानकर्ता',
            'cn' => '研究员',
            'jp' => '研究員',
            'es' => 'Investigadora',
            'fr' => 'chercheuse',
            default => 'Researcher',
        };
    }

    public static function photographer(?string $langCode): string
    {
        return match ($langCode) {
            'np', 'nb', 'in' => 'फोटोग्राफर',
            'cn' => '摄影师',
            'jp' => 'フォトグラファー',
            'es' => 'fotógrafo',
            'fr' => 'photographe',
            default => 'Photographer',
        };
    }

    public static function coordinator(?string $langCode): string
    {
        return match ($langCode) {
            'np', 'nb' => 'समन्वय',
            default => 'Coordinator',
        };
    }
}
