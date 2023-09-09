<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;

trait HasItemUrl
{
    public Closure | string | null $itemUrl = null;

    public function itemUrl($itemUrl): self
    {
        $this->itemUrl = $itemUrl;

        return $this;
    }

    public function getItemUrl($record): ?string
    {
        return $this->evaluate($this->itemUrl, [
            'record' => $record,
        ]);
    }
}
