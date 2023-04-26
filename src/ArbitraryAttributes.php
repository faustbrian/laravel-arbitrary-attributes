<?php

declare(strict_types=1);

namespace BombenProdukt\ArbitraryAttributes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use BombenProdukt\ArbitraryAttributes\Models\ArbitraryAttribute;

final class ArbitraryAttributes
{
    private Collection $collection;

    private array $commits = [];

    public function __construct(private Model $model)
    {
        $this->model = $model;

        $this->loadAttributes();
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->collection->get($key, $default);
    }

    public function set(string $key, mixed $value): static
    {
        $this->collection->put($key, $value);

        $this->commits[] = Commit::set($key, $value);

        return $this;
    }

    public function forget(array|string $keys): static
    {
        $keys = Arr::wrap($keys);

        $this->collection->forget($keys);

        foreach ($keys as $key) {
            $this->commits[] = Commit::forget($key);
        }

        return $this;
    }

    public function flush(): void
    {
        $this->forget($this->collection->keys()->toArray());
    }

    public function count(): int
    {
        return $this->collection->count();
    }

    public function commit(): void
    {
        $rows = [];

        foreach ($this->commits as $commit) {
            if ($commit->action() === 'set') {
                $rows[] = [
                    'model_id' => $this->model->id,
                    'model_type' => $this->model::class,
                    'key' => $commit->key(),
                    'value' => $commit->value(),
                ];
            }

            if ($commit->action() === 'forget') {
                $this->model->arbitraryAttributes()->where($commit->key())->delete();
            }
        }

        if (\count($rows) > 0) {
            ArbitraryAttribute::upsert($rows, ['model_id', 'model_type', 'key']);
        }

        $this->commits = [];

        $this->loadAttributes();
    }

    private function loadAttributes(): void
    {
        $this->collection = $this->model->arbitraryAttributes;
    }
}
