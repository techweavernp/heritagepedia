<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum UserStatusEnum: int implements HasLabel, HasColor
{
    case BLOCKED = 0;
    case PENDING = 1;
    case ACTIVE = 2;

    public function getLabel(): ?string
    {
        return match ($this){
            self::BLOCKED => 'Blocked',
            self::PENDING => 'Pending',
            self::ACTIVE => 'Active',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this){
            self::BLOCKED => Color::Red,
            self::PENDING => Color::Gray,
            self::ACTIVE => Color::Green,
        };
    }
}
