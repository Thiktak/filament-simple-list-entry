<img src="https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/4744075f-944e-493d-8df9-4ccbffb80446" width="100%" alt="Preview" class="filament-hidden" />


# Simple List Entry (filament InfoList plugin)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/Thiktak/filament-simple-list-entry.svg?style=flat-square)](https://packagist.org/packages/Thiktak/filament-simple-list-entry)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/Thiktak/filament-simple-list-entry/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/Thiktak/filament-simple-list-entry/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/Thiktak/filament-simple-list-entry/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/Thiktak/filament-simple-list-entry/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/Thiktak/filament-simple-list-entry.svg?style=flat-square)](https://packagist.org/packages/Thiktak/filament-simple-list-entry)


Plugin for FilamentPHP v3.


## Installation

You can install the package via composer:

```bash
composer require Thiktak/filament-simple-list-entry
```

## Usage

Use it in your Infolist section.

```php
// use Thiktak\FilamentSimpleListEntry\Infolists\Components\SimpleListEntry;

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                SimpleListEntry::make('users')
                    ->label('Default with Icon')
                    ->itemIcon('heroicon-o-check'),
            ]);
    }
```

All methods:

* Generic:
    * ```->label('Define top section label')```
    * ```->inline(true)``` change the listStyle to inline. Activate separator.
    * ```->badge(true)``` activate the badge for each line. Desactivate itemActions, itemDescription
    * ```->separator(',')``` change the separator, by default ```, ``` (coma space)
    * ```->getStateUsing(['a', 'b', 'c'])``` specify manually the data to be used oterwize use the relationship
    * ```->emptyStateEnabled(true)``` activate or not the Empty State. Default true
    * ```->emptyStateHeading('No data')``` change the Heading of the Empty State
    * ```->emptyStateDescription('There is nothing')``` change the Description of the Empty State
    * ```->emptyStateIcon('heroicon-o-x-mark')``` change the Icon of the Empty State

* Record specific (all are Closure compatible):
    * ```->itemLabel(fn ($record) => $record->item)``` specify the label. By default, will try to stringify the record
    * ```->itemDescription(fn ($record) => sprintf('Percentage: %s%%', $record['score'] * 100))``` add description under the label
    * ```->itemIcon(fn($record) => 'heroicon-o-check')``` define an icon.
    * ```->itemIconColor(fn($record) => 'warning')``` define a color for the icon.
    * ```->itemUrl(fn($record) => '#')``` define a link if the user click on the icon, label or description.
    * ```->itemActions(fn($record) => ...)``` define Actions and ActionGroups at the right of the line. See Filament Actions documentation.

## List of examples

<table>
    <tr>
        <td> Example </td> <td> Code </td>
    </tr>
    <!-- Example 1 -->
    <tr>
        <td valign="top">
            Default with Icon

![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/7e0ed37a-d4a2-495b-9256-97ed259c6db9)
        </td>
        <td>

```php
SimpleListEntry::make('')
    ->label('Default with Icon')
    ->getStateUsing(['a', 'b', 'c'])
    ->itemIcon('heroicon-o-check'),
```
</td>
    </tr>
    <!-- Example 2 -->
    <tr>
        <td valign="top">
            Inline badges list with icons & links

![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/d3d065a6-a6d1-4ae9-a14c-16ec4caa8897)
        </td>
        <td>

```php
SimpleListEntry::make('')
    ->inline(true)
    ->label('Inline badge with icon & link')
    ->getStateUsing(['a', 'b', 'c'])
    ->itemIcon('heroicon-o-check')
    ->itemUrl(fn ($record) => '#' . $record)
    ->badge(true),
```
</td>
    </tr>
    <!-- Example -->
    <tr>
        <td valign="top">
            Inline list with custom separator

![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/f5ed573c-0e89-4314-964c-a9c50117a1af)
        </td>
        <td>

```php
SimpleListEntry::make('')
    ->listStyle('inline')
    ->label('inline simple +')
    ->getStateUsing(['a', 'b', 'c'])
    ->separator(' + '),
```
</td>
    </tr>
    <!-- Example -->
    <tr>
        <td valign="top">
            Inline list with Icon
            
![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/abd4f68d-8704-4d3f-a8c9-90f8eeeaca11)
        </td>
        <td>

```php
SimpleListEntry::make('')
    ->listStyle('inline')
    ->label('inline with Icon')
    ->getStateUsing(['a', 'b', 'c'])
    ->itemIcon('heroicon-o-check'),
```
</td>
    </tr>
    <!-- Example -->
    <tr>
        <td valign="top">
            Complexe list with actions

![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/84737aa3-4a3f-440e-92a7-829ae7cfce3c)
        </td>
        <td>

```php
SimpleListEntry::make('scoresTop5')
    ->listStyle('list')
    ->itemLabel(fn ($record) => $record->item)
    ->itemUrl(fn ($record) => '#Url-' . $record->id)
    ->itemActions(
        fn ($record) => ActionGroup::make([
            Action::make('view'),
            Action::make('edit'),
            Action::make('delete'),
        ])
            ->size(ActionSize::Small)
    ),
```
</td>
    </tr>
    <!-- Example -->
    <tr>
        <td valign="top">
            Complexe list with custom data, and all options

![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/43716a49-84ea-4d80-bfcd-6d5b0bfa9624)
        </td>
        <td>

```php
SimpleListEntry::make('checklist')
    ->listStyle('list')
    ->getStateUsing([
        ['name' => 'Complete profile #1', 'score' => 1],
        ['name' => 'Complete profile #2', 'score' => .75]
    ])
    ->itemIcon(fn ($record) => match (true) {
        $record['score'] >= 1 => 'heroicon-o-check',
        default => 'heroicon-o-exclamation-triangle'
    })
    ->itemIconColor(fn ($record) => match (true) {
        $record['score'] >= 1 => 'success',
        default => 'danger'
    })
    ->itemActions(
        fn ($record) => [
            ViewAction::make('view1')
                    ->url('#View1-' . $record['name']),
            ActionGroup::make([
                Action::make('view2')
                    ->url('#View2-' . $record['name']),
                Action::make('edit'),
                Action::make('delete'),
            ])
                ->size(ActionSize::Small)
        ]
    )
    ->itemUrl(fn ($record) => '#Url-' . $record['name'])
    ->itemLabel(fn ($record) => $record['name'])
    ->itemDescription(function ($record) {
      return sprintf('Percentage: %s%%', $record['score'] * 100)
    }),
```
</td>
    </tr>
</table>

## Dark mode support

This plugin is compatible with Light mode and Dark mode.

![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/081f067c-dba6-4f58-a080-334de72b5041)
![image](https://github.com/Thiktak/filament-simple-list-entry/assets/1201486/53171918-7c13-4c14-99af-63cc42ff9a95)



## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

(Do not hesitate to contribute !)

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Thiktak](https://github.com/:Thiktak)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
