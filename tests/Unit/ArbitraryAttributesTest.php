<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\User;

beforeEach(function (): void {
    $this->user       = User::create([]);
    $this->attributes = $this->user->getArbitraryAttributes();
});

it('should get, set and forget an attribute', function (): void {
    expect($this->attributes->get('key'))->toBeNull();
    expect($this->attributes->count())->toBe(0);

    $this->attributes->set('key', 'value');

    expect($this->attributes->get('key'))->toBe('value');
    expect($this->attributes->count())->toBe(1);

    $this->attributes->forget('key');

    expect($this->attributes->get('key'))->toBeNull();
    expect($this->attributes->count())->toBe(0);
});

it('should not commit attribute changes without calling commit', function (): void {
    $this->attributes->set('key', 'value');

    expect($this->user->arbitraryAttributes)->toHaveLength(1);

    $userFresh = $this->user->fresh();

    expect($userFresh->arbitraryAttributes)->toHaveLength(0);
});

it('should commit all attribute changes', function (): void {
    expect($this->user->arbitraryAttributes)->toHaveLength(0);
    expect($this->user->fresh()->arbitraryAttributes)->toHaveLength(0);

    $this->attributes->set('key', 'value');

    expect($this->user->arbitraryAttributes)->toHaveLength(1);
    expect($this->user->fresh()->arbitraryAttributes)->toHaveLength(0);

    $this->attributes->commit();

    expect($this->user->fresh()->arbitraryAttributes)->toHaveLength(1);
});
