<?php

namespace App\Filament\Resources\Heritages\Pages;

use App\Filament\Resources\Heritages\HeritageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditHeritage extends EditRecord
{
    protected static string $resource = HeritageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //DeleteAction::make(),
            //ForceDeleteAction::make(),
            //RestoreAction::make(),
        ];
    }
}
