<?php

namespace App\Filament\Widgets;

use App\Enums\UserStatusEnum;
use App\Models\Entrepreneur;
use App\Models\Investor;
use App\Models\Site;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Sites', Site::count())
                ->description('Heritage Sites')
                ->icon('heroicon-o-map')
                ->color('success')
                ->chart([1,1,1,1]),


        ];
    }
}
