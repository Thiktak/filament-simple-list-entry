<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;

trait HasItemLabel
{
    public Closure | string | null $itemLabel = null;

    public Closure | string | null $itemDescription = null;

    public function itemLabel(Closure | string | null $itemLabel): self
    {
        $this->itemLabel = $itemLabel;

        return $this;
    }

    public function getItemLabel($record): mixed
    {
        return $this->evaluate($this->itemLabel ?: $record, [
            'record' => $record,
            'state' => $this->getState(),
        ]);
    }

    public function itemDescription(Closure | string | null $itemDescription): self
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }

    public function getItemDescription($record): mixed
    {
        return $this->evaluate($this->itemDescription, [
            'record' => $record,
            'state' => $this->getState(),
        ]);
    }
}
