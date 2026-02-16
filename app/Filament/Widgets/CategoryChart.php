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

        return [
            'datasets' => [
                [
                    'label' => 'Sites',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    'hoverOffset' => 4,
                    //'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
