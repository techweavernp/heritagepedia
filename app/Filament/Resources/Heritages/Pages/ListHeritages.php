<?php

namespace App\Filament\Resources\Heritages\Pages;

use App\Filament\Resources\Heritages\HeritageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeritages extends ListRecords
{
    protected static string $resource = HeritageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
