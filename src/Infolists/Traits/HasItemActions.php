<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;
use Filament\Actions\ActionGroup;

trait HasItemActions
{
    public Closure | ActionGroup | array | null $itemActions = null;

    public function ItemActions(Closure | ActionGroup | array | null $itemActions): self
    {
        $this->itemActions = $itemActions;
        return $this;
    }

    public function getItemActions($record): mixed
    {
        return $this->evaluate($this->itemActions, [
            'record' => $record,
            'state'  => $this->getState(),
        ]);
    }
}
