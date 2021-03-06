<?php

namespace Bazar\Repositories;

use Illuminate\Support\Collection;

abstract class Repository
{
    /**
     * The repository items.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $items;

    /**
     * Create a new repository instance.
     *
     * @param  array  $items
     * @return void
     */
    public function __construct(array $items = [])
    {
        $this->items = Collection::make($items);
    }

    /**
     * Remove the item by the given name.
     *
     * @param  string  $name
     * @return void
     */
    public function remove(string $name): void
    {
        $this->items->forget($name);
    }

    /**
     * Dynamically call methods.
     *
     * @param  string  $method
     * @param  array  $arguments
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        return $this->items->{$method}(...$arguments);
    }
}
