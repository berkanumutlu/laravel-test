<?php

namespace app\Contracts;

use Closure;
use Illuminate\Contracts\Cache\Repository;

class CustomCache implements Repository
{
    protected $storage = [];

    public function get($key, mixed $default = null): mixed
    {
        return $this->storage[$key] ?? null;
    }

    public function put($key, $value, $ttl = null)
    {
        $this->storage[$key] = $value;
    }

    public function set(string $key, mixed $value, \DateInterval|int|null $ttl = null): bool
    {
        // TODO: Implement set() method.
    }

    public function delete(string $key): bool
    {
        // TODO: Implement delete() method.
    }

    public function clear(): bool
    {
        // TODO: Implement clear() method.
    }

    public function getMultiple(iterable $keys, mixed $default = null): iterable
    {
        // TODO: Implement getMultiple() method.
    }

    public function setMultiple(iterable $values, \DateInterval|int|null $ttl = null): bool
    {
        // TODO: Implement setMultiple() method.
    }

    public function deleteMultiple(iterable $keys): bool
    {
        // TODO: Implement deleteMultiple() method.
    }

    public function has(string $key): bool
    {
        // TODO: Implement has() method.
    }

    public function pull($key, $default = null)
    {
        // TODO: Implement pull() method.
    }

    public function add($key, $value, $ttl = null)
    {
        // TODO: Implement add() method.
    }

    public function increment($key, $value = 1)
    {
        // TODO: Implement increment() method.
    }

    public function decrement($key, $value = 1)
    {
        // TODO: Implement decrement() method.
    }

    public function forever($key, $value)
    {
        // TODO: Implement forever() method.
    }

    public function remember($key, $ttl, Closure $callback)
    {
        // TODO: Implement remember() method.
    }

    public function sear($key, Closure $callback)
    {
        // TODO: Implement sear() method.
    }

    public function rememberForever($key, Closure $callback)
    {
        // TODO: Implement rememberForever() method.
    }

    public function forget($key)
    {
        // TODO: Implement forget() method.
    }

    public function getStore()
    {
        // TODO: Implement getStore() method.
    }
}
