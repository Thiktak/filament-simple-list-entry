<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @php
        $items = $getItems();
        $inline = $getInline();
        $badge = null;
        $hasBadge = null;
        $shouldOpenUrlInNewTab = $shouldOpenUrlInNewTab();

        $isStyleInline = $getListStyle() == 'inline';
        $isStyleList = $getListStyle() == 'list';

        if ($isStyleList) {
            $hasBadge = false;
            $separator = null;

            $l1Class = 'divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10';
            $l2Class = 'flex items-center w-full p-3 gap-x-3 text-gray-700 outline-none transition duration-75 hover:bg-gray-100 focus:bg-gray-100 dark:text-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/5';
        } else {
            $badge = $getBadge();
            $hasBadge = !empty($badge);
            $separator = $getSeparator();

            $l1Class = 'flex flex-wrap items-center ' . ($hasBadge ? 'gap-1.5' : '');
            $l2Class = 'flex items-center ' . ($hasBadge ? '' : 'gap-0.5');
            $inline = false;
        }

    @endphp
    <div data-l="1" class="{{ $l1Class }}">
        @forelse ($items as $itemKey => $itemElement)
            @php
                $tagHref = $getItemUrl($itemElement);
                $tag = $tagHref ? 'a' : 'div';
                $target = ($shouldOpenUrlInNewTab && $tagHref) ? 'target="_blank"' : '';

                $tagAttributes = $attributes->merge(['class' => $l2Class])->merge($getItemExtraAttributes($itemElement), escape: false);
            @endphp
            <div data-l="2" {{ $tagAttributes }} class="{{ $inline ? 'inline-block' : 'block' }}">

                @if ($hasBadge)
                    <{{ $tag }} href="{{ $tagHref }}" {{ $target }}>
                        <x-filament::badge :color="$getBadgeColor()" :icon="$getItemIcon($itemElement)" :href="$tagHref">
                            {{ $getItemLabel($itemElement) }}
                        </x-filament::badge>
                        </{{ $tag }}>
                    @else
                        <{{ $tag }} href="{{ $tagHref }}" {{ $target }}>
                            @if ($icon = $getItemIcon($itemElement))
                                <x-filament::icon class="w-5 h-5 text-custom-600" :icon="$icon"
                                    style="{{ \Filament\Support\get_color_css_variables($getItemIconColor($itemElement), shades: [50, 300, 400, 500, 600]) }}" />
                            @endif
                            </{{ $tag }}>
                            <{{ $tag }} href="{{ $tagHref }}" {{ $target }} class="inline-block truncate">
                                {{ $getItemLabel($itemElement) }}
                                <p class="text-xs text-gray-500">
                                    {{ $getItemDescription($itemElement) }}
                                </p>
                                </{{ $tag }}>
                @endif

                @php
                    $itemActions = $getItemActions($itemElement);
                @endphp
                @if ($itemActions)
                    <div class="-me-1.5 ms-auto flex gap-1.5">
                        @if (is_array($itemActions))
                            @foreach ($itemActions as $action)
                                {{ $action }}
                            @endforeach
                        @else
                            {{ $itemActions }}
                        @endif
                    </div>
                @endif
            </div>
            @if (!$loop->last && !$hasBadge)
                <span>{{ $separator }}</span>
            @endif
        @empty
            @if ($getEmptyStateEnabled())
                @if ($isStyleList)
                    <x-filament::section
                        class="fi-ta-empty-state-content mx-auto grid max-w-lg justify-items-center text-center">
                        <div>
                            <div
                                class="fi-ta-empty-state-icon-ctn mb-4 rounded-full bg-gray-100 p-3 dark:bg-gray-500/20 inline-block">
                                <x-filament::icon :icon="$getEmptyStateIcon()"
                                    class="fi-ta-empty-state-icon h-6 w-6 text-gray-500 dark:text-gray-400" />
                            </div>
                        </div>
                        <h4
                            class="fi-ta-empty-state-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                            {{ $getEmptyStateHeading() }}
                        </h4>
                        <p class="fi-ta-empty-state-description text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ $getEmptyStateDescription() }}
                        </p>
                        {{-- Content --}}
                    </x-filament::section>
                @else
                    <p class="fi-ta-empty-state-heading text-base font-normal text-gray-500 dark:text-white/50">
                        {{ $getEmptyStateHeading() }}
                    </p>
                @endif
            @endif
        @endforelse
    </div>
</x-dynamic-component>
