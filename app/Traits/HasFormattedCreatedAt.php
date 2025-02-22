<?php

namespace App\Models\Traits;

trait HasFormattedCreatedAt
{
    public function getCreatedAtAttribute($value)
    {
        return verta($value)->format(' %d / %B / %Y');
    }
}

