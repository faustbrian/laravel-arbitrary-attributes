<?php

declare(strict_types=1);

namespace BombenProdukt\ArbitraryAttributes\Concerns;

use BombenProdukt\ArbitraryAttributes\ArbitraryAttributes;
use BombenProdukt\ArbitraryAttributes\Models\ArbitraryAttribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
