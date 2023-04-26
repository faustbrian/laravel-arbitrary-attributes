<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use BombenProdukt\ArbitraryAttributes\Concerns\HasArbitraryAttributes;

final class User extends Model
{
    use HasArbitraryAttributes;

    public $guarded = false;
}
