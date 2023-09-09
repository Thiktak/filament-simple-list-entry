<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Traits;

use Closure;
use Illuminate\View\ComponentAttributeBag;

trait HasItemExtraAttributes
{
    /**
     * @var array<array<mixed> | Closure>
     */
    protected array $itemExtraAttributes = [];

    /**
     * @param  array<mixed> | Closure  $attributes
     */
    public function itemExtraAttributes(array | Closure $attributes, bool $merge = false): static
    {
        if ($merge) {
            $this->itemExtraAttributes[] = $attributes;
        } else {
            $this->itemExtraAttributes = [$attributes];
        }

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getItemExtraAttributes($record): array
    {
        $temporaryAttributeBag = new ComponentAttributeBag();

        foreach ($this->itemExtraAttributes as $itemExtraAttributes) {
            $temporaryAttributeBag = $temporaryAttributeBag->merge($this->evaluate($itemExtraAttributes, [
                'record' => $record,
            ]));
        }

        return $temporaryAttributeBag->getAttributes();
    }

    public function getItemExtraAttributeBag($record): ComponentAttributeBag
    {
        return new ComponentAttributeBag($this->getItemExtraAttributes($record));
    }
}
