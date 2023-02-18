<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

uses(TestCase::class)->beforeEach(function (): void {
    $this->app['config']->set('database.default', 'testbench');
    $this->app['config']->set('database.connections.testbench', [
        'driver'   => 'sqlite',
        'database' => ':memory:',
        'prefix'   => '',
    ]);

    Schema::dropIfExists('users');

    Schema::create('users', function (Blueprint $table): void {
        $table->id();
        $table->timestamps();
    });

    Schema::create('arbitrary_attributes', function (Blueprint $table): void {
        $table->id();
        $table->morphs('model');
        $table->string('key')->index();
        $table->text('value')->nullable();
        $table->timestamps();

        $table->unique(['model_id', 'model_type', 'key']);
    });
})->in(__DIR__);
