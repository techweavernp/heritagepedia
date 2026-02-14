<?php

namespace App\Filament\Widgets;

use App\Enums\UserStatusEnum;
use App\Models\Entrepreneur;
use App\Models\Investor;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Pending', User::whereStatus(UserStatusEnum::PENDING->value)->count())
                ->description('Pending users')
                ->icon('heroicon-o-user-group')
                ->color('warning')
                ->chart([7, 2, 10, 3, 15, 4, 10]),


        ];
    }
}
