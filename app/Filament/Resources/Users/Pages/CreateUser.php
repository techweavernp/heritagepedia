<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        $user = $this->record;

        $user->personalDetail()->create([
            'nationality' => 'Nepali',
            'mobile' => 'null',
            'city_id' => 299,
        ]);

        $user->document()->create();

        $user->legalAgreement()->create([
            'terms_accepted' => true,
        ]);

        if ($user->role == 'I') {
            $user->investor()->create();
        } else {
            $user->entrepreneur()->create();
        }
    }
}
