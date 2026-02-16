<?php

namespace App\Filament\Resources\Heritages\Schemas;

use App\Filament\Resources\Heritages\RelationManagers\HeritageDetailsRelationManager;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeritageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        Select::make('site_id')
                            ->relationship('site', 'name')
                            ->required(),
                        Select::make('lang_id')
                            ->relationship('lang', 'name')
                            ->required(),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('location')
                            ->required(),
                        FileUpload::make('feature_image')
                            ->directory(fn (HeritageDetailsRelationManager $livewire) => 'heritage/' . $livewire->getOwnerRecord()->site_id)
                            ->image()
                            ->required()
                            ->columnSpan(2),
                        KeyValue::make('source')
                            ->columnSpan(2),
                        TextInput::make('url_code')
                            ->required(),
                        Toggle::make('publish')
                            ->required(),
                    ])->columns(4)
            ]);
    }
}
