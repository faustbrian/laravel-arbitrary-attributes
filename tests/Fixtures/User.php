<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Fixtures;

use BaseCodeOy\ArbitraryAttributes\Concerns\HasArbitraryAttributes;
use Illuminate\Database\Eloquent\Model;

final class User extends Model
{
    use HasArbitraryAttributes;

    public $guarded = false;
}
