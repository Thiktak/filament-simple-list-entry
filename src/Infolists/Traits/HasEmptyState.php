<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;

trait HasEmptyState
{
    public Closure | bool | null $emptyStateEnabled = true;

    public Closure | string | null $emptyStateHeading = 'No result'; // @TODO: Translate or get filament logic

    public Closure | string | null $emptyStateDescription = null;

    public Closure | string | null $emptyStateIcon = 'heroicon-o-x-mark';

    public function emptyStateEnabled(Closure | string | null $emptyStateEnabled): self
    {
        $this->emptyStateEnabled = $emptyStateEnabled;

        return $this;
    }

    public function getEmptyStateEnabled(): mixed
    {
        return $this->evaluate($this->emptyStateEnabled);
    }

    public function emptyStateHeading(Closure | string | null $emptyStateHeading): self
    {
        $this->emptyStateHeading = $emptyStateHeading;

        return $this;
    }

    public function getEmptyStateHeading(): mixed
    {
        return $this->evaluate($this->emptyStateHeading);
    }

    public function emptyStateDescription(Closure | string | null $emptyStateDescription): self
    {
        $this->emptyStateDescription = $emptyStateDescription;

        return $this;
    }

    public function getEmptyStateDescription(): mixed
    {
        return $this->evaluate($this->emptyStateDescription);
    }

    public function emptyStateIcon(Closure | string | null $emptyStateIcon): self
    {
        $this->emptyStateIcon = $emptyStateIcon;

        return $this;
    }

    public function getEmptyStateIcon(): mixed
    {
        return $this->evaluate($this->emptyStateIcon);
    }
}
