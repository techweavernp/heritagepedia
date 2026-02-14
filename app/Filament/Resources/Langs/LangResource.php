<?php

namespace App\Filament\Resources\Langs;

use App\Filament\Resources\Langs\Pages\CreateLang;
use App\Filament\Resources\Langs\Pages\EditLang;
use App\Filament\Resources\Langs\Pages\ListLangs;
use App\Filament\Resources\Langs\Schemas\LangForm;
use App\Filament\Resources\Langs\Tables\LangsTable;
use App\Models\Lang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LangResource extends Resource
{
    protected static ?string $model = Lang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return LangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LangsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLangs::route('/'),
        ];
    }
}
