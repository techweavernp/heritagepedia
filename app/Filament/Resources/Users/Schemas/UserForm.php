<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\RoleEnum;
use App\Enums\UserStatusEnum;
use App\Filament\Components\PasswordField;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class UserForm
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
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        PasswordField::make('password', 'password', false)
                            ->hiddenOn('edit'),

                        ToggleButtons::make('status')
                            ->required()
                            ->inline()
                            ->grouped()
                            ->options(UserStatusEnum::class)
                            ->default(UserStatusEnum::PENDING)
                            ->live(),

                    ])->columns(3),
            ]);
    }
}
