<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ArbitraryAttributes\Concerns;

use BaseCodeOy\ArbitraryAttributes\ArbitraryAttributes;
use BaseCodeOy\ArbitraryAttributes\Models\ArbitraryAttribute;
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
