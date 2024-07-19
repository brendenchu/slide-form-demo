<?php

namespace App\Traits;

use App\Interfaces\Uuidable;
use Illuminate\Support\Str;

trait HasPublicId
{
    /**
     * The "booting" method of the trait.
     */
    protected static function bootHasPublicId(): void
    {
        static::creating(function ($model) {
            if ($model instanceof Uuidable) {
                $model->public_id = Str::lower(Str::uuid());
            } else {
                $model->public_id = Str::random(12);
            }
        });
    }

    /**
     * Get the public id attribute.
     */
    public function getPublicIdAttribute(): string
    {
        return $this->attributes['public_id'];
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'public_id';
    }
}
