<?php

namespace App\Filament\Pages\Auth;

use App\Filament\Components\PasswordField;
use App\Filament\Components\PersonalDetailSchema;
use App\Models\User;
use Filament\Auth\Events\Registered;
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Throwable;

class Register extends BaseRegister
{

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Login Detail')
                            ->icon(Heroicon::User)
                            ->schema([
                                ToggleButtons::make('role')
                                    ->inlineLabel()
                                    ->label('Register as')
                                    ->inline()
                                    ->grouped()
                                    ->options([
                                        'I' => 'Investor',
                                        'E' => 'Entrepreneur',
                                    ])
                                    ->default('I'),
                                TextInput::make('name')
                                    ->required()
                                    ->label('Full name'),

                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->unique(table: 'users', column: 'email')
                                    ->label('Email'),
                                PasswordField::make('password', 'Password'),
                                PasswordField::make('password_confirmation', 'Confirm Password', true),
                                Checkbox::make('terms_accepted')
                                    ->label(new HtmlString(
                                        'I accept the <a href="/terms-service" target="_blank" class="text-primary-600 hover:text-primary-500 underline">Terms and Conditions </a>'
                                    ))
                                    ->accepted()
                                    ->required()
                                    ->validationMessages([
                                        'accepted' => 'You must accept the terms and condition to register.',
                                        'required' => 'You must accept the terms and condition to register.',
                                    ]),
                            ]),
                        Tab::make('Personal Detail')
                            ->icon(Heroicon::User)
                            ->schema(PersonalDetailSchema::make())->inlineLabel(),

                    ])->contained(false),
            ]);
    }

    /**
     * @throws Throwable
     */
    public function register(): ?RegistrationResponse
    {
        try {
            $data = $this->form->getState();

            // Start transaction for data integrity
            DB::beginTransaction();

            // Create User (without mobile)
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
            ]);

            // Create Personal Details with mobile
            $user->personalDetail()->create([
                'nationality' => $data['nationality'],
                'dob' => $data['dob'],
                'gender' => $data['gender'],
                'mobile' => $data['mobile'],
                'city_id' => $data['city_id'],
                'street' => $data['street'],
                'wardno' => $data['wardno'],
                'linkedin' => $data['linkedin'],
            ]);

            // Create Documents record
            $user->document()->create();

            // Create Legal Agreements record
            $user->legalAgreement()->create([
                'terms_accepted' => true,
            ]);

            // Create Investor or Entrepreneur record based on role
            if ($data['role'] == 'I') {
                $user->investor()->create();
            } else {
                $user->entrepreneur()->create();
            }

            DB::commit();

            // Fire registered event (optional)
            event(new Registered($user));

            // Prevent auto-login and show success message
            $this->afterRegister($user);

            return app(RegistrationResponse::class);

        } catch (\Exception $e) {
            DB::rollBack();

            Notification::make()
                ->title('Registration Failed')
                ->body('Please fill all the required field.')
                ->danger()
                ->send();

            throw $e;
        }

    }

    protected function afterRegister(): void
    {
        // Prevent Filament from logging in the user
        auth()->logout();

        // Show success message
        Notification::make()
            ->title('Thank you for registering!')
            ->body('We have received your registration. Our team will review your account and contact you soon.')
            ->success()
            ->send();

    }
}
