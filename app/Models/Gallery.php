<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
