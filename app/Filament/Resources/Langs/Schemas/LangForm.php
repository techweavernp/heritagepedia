<?php

namespace App\Filament\Resources\Langs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LangForm
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
                    TextInput::make('code')
                        ->required(),
                    TextInput::make('icon')
                        ->required(),
                ])->columns(1)

            ]);
    }
}
