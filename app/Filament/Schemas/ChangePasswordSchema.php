<?php

namespace App\Filament\Schemas;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class ChangePasswordSchema
{
    public static function make(bool $forModal = false, $record = null): array
    {
        return [
            TextInput::make('current_password')
                ->label('Current Password')
                ->password()
                ->revealable()
                ->required()
                ->rule(self::getCurrentPasswordRule($forModal, $record)),

            TextInput::make('password')
                ->label('New Password')
                ->confirmed('password_confirmation')
                ->password()
                ->revealable()
                ->live()
                ->partiallyRenderAfterStateUpdated()
                ->belowContent(
                    fn ($state) => match (true) {
                        strlen($state) > 12 => ' 👍 Awesome',
                        strlen($state) > 7 => ' 😀 Yeah okay',
                        strlen($state) > 4 => ' 🥹 Try harder',
                        default => ' ',
                    }
                )
                ->required(),

            TextInput::make('password_confirmation')
                ->password()
                ->label('Confirm New Password')
                ->revealable()
                ->required(),
        ];
    }

    protected static function getCurrentPasswordRule(bool $forModal, $record = null): callable
    {
        if ($forModal && $record) {
            // For modal with record (admin changing user's password)
            return function ($record) {
                return function ($attribute, $value, $fail) use ($record) {
                    if (!Hash::check($value, $record->password)) {
                        $fail('The current password is incorrect.');
                    }
                };
            };
        }

        // For self password change (no record, validate against logged-in user)
        return function () {
            return function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('The current password is incorrect.');
                }
            };
        };
    }
}
