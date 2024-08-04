<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Components;

use Closure;
use Filament\Support\Concerns\HasBadge;
use Filament\Infolists\Components\Entry;
use Filament\Support\Concerns\HasExtraAttributes;
use Thiktak\FilamentSimpleListEntry\Infolists\Traits;

class SimpleListEntry extends Entry
{
    use HasBadge;
    use HasExtraAttributes;
    use Traits\HasEmptyState;
    use Traits\HasItemActions;
    use Traits\HasItemExtraAttributes;
    use Traits\HasItemIcon;
    use Traits\HasItemLabel;
    use Traits\HasItems;
    use Traits\HasItemUrl;
    use Traits\HasListStyle;

    protected string $view = 'thiktak-filament-simple-list-entry::infolists.components.simple-list-entry';

    public Closure | string | null $separator = ', ';
}
