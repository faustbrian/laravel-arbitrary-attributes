<?php

declare(strict_types=1);

namespace PreemStudio\ArbitraryAttributes\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use PreemStudio\ArbitraryAttributes\ArbitraryAttributes;
use PreemStudio\ArbitraryAttributes\Models\ArbitraryAttribute;

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
