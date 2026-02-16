<?php

namespace App\Filament\Resources\Heritages;

use App\Filament\Resources\Heritages\Pages\CreateHeritage;
use App\Filament\Resources\Heritages\Pages\EditHeritage;
use App\Filament\Resources\Heritages\Pages\ListHeritages;
use App\Filament\Resources\Heritages\RelationManagers\HeritageDetailsRelationManager;
use App\Filament\Resources\Heritages\Schemas\HeritageForm;
use App\Filament\Resources\Heritages\Tables\HeritagesTable;
use App\Models\Heritage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeritageResource extends Resource
{
    protected static ?string $model = Heritage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingLibrary;
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return HeritageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeritagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            HeritageDetailsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHeritages::route('/'),
            'create' => CreateHeritage::route('/create'),
            'edit' => EditHeritage::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
