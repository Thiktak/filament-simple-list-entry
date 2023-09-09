<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Components;

use Closure;
use Filament\Actions\ActionGroup;
use Filament\Actions\Concerns\HasBadge;
use Filament\Support\Concerns\HasDescription;
use Filament\Infolists\Components\Entry;
use Filament\Support\Concerns\HasHeading;
use Filament\Support\Concerns\HasIcon;
use Filament\Support\Concerns\HasIconColor;
use Filament\Support\Concerns\HasExtraAttributes;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\ComponentAttributeBag;
use Thiktak\FilamentSimpleListEntry\Infolists\Enums\SimpleListListStyle;
use Thiktak\FilamentSimpleListEntry\Infolists\Traits;

class SimpleListEntry extends Entry
{
    //use HasHeading;
    use HasExtraAttributes;
    use HasBadge;
    use Traits\HasListStyle;
    use Traits\HasItems;
    use Traits\HasItemlabel;
    use Traits\HasItemUrl;
    use Traits\HasItemIcon;
    use Traits\HasItemActions;
    use Traits\HasItemExtraAttributes;

    protected string $view = 'infolists.components.simple-list-entry';

    public Closure | string | null $separator = ', ';
}
