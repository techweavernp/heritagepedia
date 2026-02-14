<?php

namespace App\Filament\Components;

use Filament\Forms\Components\TextInput;

class PasswordField
{
    public static function make(string $name, string $label, bool $confirmPassword = false): TextInput
    {
        $field = TextInput::make($name)
            ->label($label)
            ->password()
            ->revealable()
            ->required();

        if($confirmPassword){
            return $field;
        }

        return $field
            ->live()
            ->partiallyRenderAfterStateUpdated()
            ->belowContent(
                fn ($state) => match (true) {
                    strlen($state) > 12 => ' 👍 Awesome',
                    strlen($state) > 8 => ' 😀 Yeah okay',
                    strlen($state) > 4 => ' 🥹 Try harder',
                    default => ' ',
                }
            );

    }

}
