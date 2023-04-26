<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BombenProdukt\ArbitraryAttributes\Concerns\HasArbitraryAttributes;
use Illuminate\Database\Eloquent\Model;

final class User extends Model
{
    use HasArbitraryAttributes;

    public $guarded = false;
}
