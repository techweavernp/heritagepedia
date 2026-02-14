<?php

namespace App\Filament\Components;

use App\Enums\GenderEnum;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Manohar\Address\Models\City;

class PersonalDetailSchema
{
    public static function make(): array
    {
        return [
            TextInput::make('nationality')
                ->default('Nepali')
                ->required(),
            ToggleButtons::make('gender')
                ->inlineLabel()
                ->options(GenderEnum::class)
                ->inline()
                ->default(GenderEnum::MALE)
                ->required(),
            DatePicker::make('dob')
                ->date()
                ->native(false),
            TextInput::make('mobile')
                ->required()
                ->unique(table: 'personal_details', column: 'mobile')
                ->label('Mobile')
                ->length(10)
                ->mask(9999999999),
            Select::make('city_id')
                ->label('City')
                ->placeholder('Select City')
                ->options(City::getCityCache())
                ->preload()
                ->searchable()
                ->required(),
            TextInput::make('street')
                ->required(),
            Select::make('wardno')
                ->label('Ward No.')
                ->options(collect(range(1, 32))->mapWithKeys(fn ($num) => [$num => "$num"]))
                ->required(),
            TextInput::make('linkedin')
                ->label('LinkedIn Profile')
                ->placeholder('https://www.linkedin.com/in/username'),
        ];
    }
}
