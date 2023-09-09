<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;

trait HasItemIcon
{
    public Closure | string | null $itemIcon = null;
    public Closure | string | null $itemIconColor = null;

    public function itemIcon(Closure | string | null $itemIcon): self
    {
        $this->itemIcon = $itemIcon;
        return $this;
    }

    public function getItemIcon($record): mixed
    {
        return $this->evaluate($this->itemIcon, [
            'record' => $record,
            'state'  => $this->getState(),
        ]);
    }

    public function itemIconColor(Closure | string | null $itemIconColor): self
    {
        $this->itemIconColor = $itemIconColor;
        return $this;
    }

    public function getItemIconColor($record): mixed
    {
        return $this->evaluate($this->itemIconColor, [
            'record' => $record,
            'state'  => $this->getState(),
        ]);
    }
}
