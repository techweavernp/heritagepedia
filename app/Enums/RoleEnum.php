<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum RoleEnum: string implements HasLabel
{
    case SUPER = 'S';
    case ADMIN = 'A';
    case INVESTOR = 'I';
    case ENTREPRENEUR = 'E';

    public function getLabel(): ?string
    {
        return match ($this){
            self::SUPER => 'super-admin',
            self::ADMIN => 'admin',
            self::INVESTOR => 'investor',
            self::ENTREPRENEUR => 'entrepreneur',
        };
    }
}
