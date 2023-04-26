<?php

declare(strict_types=1);

namespace BombenProdukt\ArbitraryAttributes\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use BombenProdukt\ArbitraryAttributes\ArbitraryAttributes;
use BombenProdukt\ArbitraryAttributes\Models\ArbitraryAttribute;

trait HasArbitraryAttributes
{
    public function arbitraryAttributes(): MorphMany
    {
        return $this->morphMany(ArbitraryAttribute::class, 'model');
    }

    public function getArbitraryAttributes(): ArbitraryAttributes
    {
        return new ArbitraryAttributes($this);
    }
}
