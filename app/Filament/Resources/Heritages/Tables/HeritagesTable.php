<?php

namespace App\Filament\Resources\Heritages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class HeritagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('lang.name')
                    ->label('Language')
                    ->sortable(),

                ImageColumn::make('feature_image'),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('url_code')
                    ->searchable(),
                IconColumn::make('publish')
                    ->boolean(),

            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ;
    }
}
