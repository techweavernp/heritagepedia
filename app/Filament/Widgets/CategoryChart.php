<?php

namespace App\Filament\Widgets;

use App\Enums\KnowAboutEnum;
use App\Models\Site;
use App\Models\UserDetail;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CategoryChart extends ChartWidget
{
    protected ?string $heading = 'Category Chart';
    protected static ?int $sort = 2;
    protected static bool $isLazy = true;
    //protected int | string | array $columnSpan = 'full';
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Site::join('categories', 'sites.category_id', '=', 'categories.id')
            ->select('categories.name', DB::raw('count(*) as count'))
            ->groupBy('categories.name')
            ->pluck('count', 'categories.name')
            ->toArray();

        $colorMap = [
            'Temple' => '#5B2727',    // Deep brown/maroon
            'Mahabir' => '#EEA429',   // Golden/amber
            'Bahah' => '#0284c7',     // Sky blue
            'Bahi' => '#003893',      // Deep blue
        ];

        $labels = array_keys($data);

        // Map colors based on label names (fallback to gray if not found)
        $backgroundColors = array_map(
            fn($label) => $colorMap[$label] ?? '#6B7280',
            $labels
        );

        return [
            'datasets' => [
                [
                    'label' => 'Sites',
                    'data' => array_values($data),
                    'backgroundColor' => $backgroundColors,
                    'hoverOffset' => 4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
