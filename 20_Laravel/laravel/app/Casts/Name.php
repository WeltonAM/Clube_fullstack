<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Name implements CastsAttributes
{
    function get($model, string $key, $value, array $attributes)
    {
        return "CFS_{$value}";
    }

    function set($model, string $key, $value, array $attributes)
    {
        return "CFS_{$value}";
    }
}
