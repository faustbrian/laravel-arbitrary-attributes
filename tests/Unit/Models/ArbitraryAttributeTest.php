<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Models;

use Tests\Fixtures\User;

it('should belong to a model', function (): void {
    $user = User::create([]);

    $attribute = $user->arbitraryAttributes()->create([
        'key' => 'hello',
        'value' => 'world',
    ]);

    expect($attribute->model_id)->toBe($user->id);
    expect($attribute->model_type)->toBe(User::class);
    expect($attribute->model)->toBeInstanceOf(User::class);
});
