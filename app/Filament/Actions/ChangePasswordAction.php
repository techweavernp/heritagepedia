<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAction extends Action
{
    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->label('Reset Password')
            ->color('warning')
            ->icon('heroicon-o-key')
            ->modalHeading('Reset Password')
            ->modalWidth('sm')
            ->modalSubmitActionLabel('Reset Password')
            ->closeModalByClickingAway(false)
            ->schema([
                TextInput::make('password')
                    ->label('New Password')
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
            ])
            ->action(function (array $data, $record) {
                $record->update([
                    'password' => Hash::make($data['password']),
                ]);

                Notification::make()
                    ->title('Password reset successfully!')
                    ->success()
                    ->send();
            });
    }
}
