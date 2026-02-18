<?php

namespace App\Filament\Resources\Sites\RelationManagers;

use App\Filament\Resources\Heritages\RelationManagers\HeritageDetailsRelationManager;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleriesRelationManager extends RelationManager
{
    protected static string $relationship = 'galleries';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('image')
                            ->required()
                            ->directory(fn (GalleriesRelationManager $livewire) => 'heritage/' . $livewire->getOwnerRecord()->id),
                        TextInput::make('caption'),
                    ])->columns(1)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('sno')
                    ->rowIndex(),
                ImageColumn::make('image')
                    ->placeholder('NONE'),
                TextColumn::make('caption'),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->modalWidth('lg'),
            ])
            ->recordActions([
                EditAction::make()
                    ->modalWidth('lg'),
            ])
            ;
    }
}
