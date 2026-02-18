<?php

namespace App\Filament\Resources\Heritages\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeritageDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'heritage_details';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('qlink_tag')
                            ->required(),
                        RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        FileUpload::make('audio')
                            ->directory(fn (HeritageDetailsRelationManager $livewire) => 'audio/' . $livewire->getOwnerRecord()->site_id),
                    ])->columns(2)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('Sno')
                    ->rowIndex(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('audio')
                    ->placeholder('NONE'),
                TextColumn::make('qlink_tag'),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ;
    }
}
