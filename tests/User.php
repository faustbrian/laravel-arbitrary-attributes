<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use PreemStudio\ArbitraryAttributes\Concerns\HasArbitraryAttributes;

final class User extends Model
{
    use HasArbitraryAttributes;

    public $guarded = false;
}
