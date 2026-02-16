<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Heritage extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected function casts(): array
    {
        return [
            'source' => 'array',
            'publish' => 'boolean',
        ];
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function lang(): BelongsTo
    {
        return $this->belongsTo(Lang::class);
    }

    public function heritage_details(): HasMany
    {
        return $this->hasMany(HeritageDetail::class);
    }

    #[Scope]
    protected function published(Builder $query): void
    {
        $query->wherePublish(true);
    }

    public static function getLanguagesBySite(string $url_code): \Illuminate\Support\Collection
    {
        $site_id = self::whereUrlCode($url_code)->firstOrFail()->site_id;

        return self::with('lang')
            ->where('site_id', $site_id)
            ->wherePublish(true)
            ->get()
            ->pluck('lang')
            ->unique('id')
            ->values()
            ->map(fn($lang) => $lang->only(['name', 'code', 'icon']));
    }

}
