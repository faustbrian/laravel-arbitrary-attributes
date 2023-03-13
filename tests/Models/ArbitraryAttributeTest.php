<?php

declare(strict_types=1);

namespace Tests\Models;

use Tests\User;

it('should belong to a model', function (): void {
    $user = User::create([]);

    $attribute = $user->arbitraryAttributes()->create([
        'key'   => 'hello',
        'value' => 'world',
    ]);

    expect($attribute->model_id)->toBe($user->id);
    expect($attribute->model_type)->toBe(User::class);
    expect($attribute->model)->toBeInstanceOf(User::class);
});
