<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ArbitraryAttributes;

final class Commit
{
    public function __construct(
        private string $action,
        private string $key,
        private mixed $value,
    ) {
        //
    }

    public static function set(string $key, mixed $value): static
    {
        return new self('set', $key, $value);
    }

    public static function forget(string $key): static
    {
        return new static('forget', $key, null);
    }

    public function action(): string
    {
        return $this->action;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function value(): mixed
    {
        return $this->value;
    }
}
