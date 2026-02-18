<?php

namespace App\Filament\Resources\Sites\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
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
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required(),
                    TextInput::make('name')
                        ->required(),
                    Group::make()
                        ->columnSpanFull()
                        ->schema([
                            Select::make('city_id')
                                ->relationship('city', 'name')
                                ->required(),
                            TextInput::make('ward')
                                ->numeric(),
                            TextInput::make('street'),
                        ])->columns(3),
                    FileUpload::make('image')
                        ->label('Cover Image')
                        ->directory('site')
                        ->image()
                        ->columnSpanFull(),
                    TextInput::make('notes')
                        ->columnSpanFull(),
                ])->columns(2)

            ]);
    }
}
