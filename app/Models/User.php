<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Enums\UserStatusEnum;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\ValidationException;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'role', 'status', 'blocked_reason',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => RoleEnum::class,
            'status' => UserStatusEnum::class,
        ];
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === RoleEnum::SUPER;
    }

    public function isInvestor(): bool
    {
        return $this->role === RoleEnum::INVESTOR;
    }

    public function isEntrepreneur(): bool
    {
        return $this->role === RoleEnum::ENTREPRENEUR;
    }

    public function personalDetail(): HasOne
    {
        return $this->hasOne(PersonalDetail::class);
    }

    public function document(): HasOne
    {
        return $this->hasOne(Document::class);
    }

    public function legalAgreement(): HasOne
    {
        return $this->hasOne(LegalAgreement::class);
    }

    public function investor(): HasOne
    {
        return $this->hasOne(Investor::class);
    }

    public function entrepreneur(): HasOne
    {
        return $this->hasOne(Entrepreneur::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->status == UserStatusEnum::ACTIVE) {
            return true;
        } else {
            auth()->logout();
            throw ValidationException::withMessages([
                'data.email' => 'Account verification in progress',
            ]);
        }
    }
}
