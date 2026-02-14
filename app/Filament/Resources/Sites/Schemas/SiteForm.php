<?php

namespace App\Filament\Resources\Sites\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->columnSpanFull()
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    Select::make('city_id')
                        ->relationship('city', 'name')
                        ->required(),
                    TextInput::make('ward')
                        ->numeric(),
                    TextInput::make('street'),
                    FileUpload::make('image')
                        ->directory('site')
                        ->image()
                        ->columnSpan(2),
                    TextInput::make('notes')
                        ->columnSpan(2),
                ])->columns(4)

            ]);
    }
}
