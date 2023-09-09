<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;
use Thiktak\FilamentSimpleListEntry\Infolists\Enums\SimpleListListStyle;

trait HasListStyle
{
    public Closure | bool | null $inline = true;
    public Closure | SimpleListListStyle | string | null $listStyle = SimpleListListStyle::list;

    public function listStyle($listStyle = SimpleListListStyle::list): self
    {
        $this->listStyle = $listStyle;
        return $this;
    }

    public function getListStyle(): string
    {
        return SimpleListListStyle::fromName($this->evaluate($this->listStyle));
    }

    public function inline($inline): self
    {
        $this->listStyle('inline');
        $this->inline = $inline;
        return $this;
    }

    public function getInline(): bool
    {
        return (bool) $this->evaluate($this->inline);
    }
}
