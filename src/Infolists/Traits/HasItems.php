<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;
use Illuminate\Support\Collection;

trait HasItems
{
    public Closure | Collection | array | null $items = [];

    public function items(Closure | Collection | array | null $items = []): self
    {
        $this->items = $items;
        return $this;
    }

    public function getItems(): Collection
    {
        return collect($this->evaluate($this->items) ?: $this->getState());
    }
}
