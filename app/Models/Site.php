<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Manohar\Address\Models\City;

class Site extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['location'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class)
            ->with('district');
    }

    /**
     *  Below are attribute.
     */
    protected function location(): Attribute
    {
        return Attribute::make(
            get: function () {
                return "{$this->street} - {$this->ward}, {$this->city->name}";
            }
        );
    }
    /*protected function district(): Attribute
    {
        return Attribute::make(
            get: function () {
                return District::whereCityId($this->city_id)->first()->name;
            },
        );
    }*/
}
