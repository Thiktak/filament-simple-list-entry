<?php

namespace Thiktak\FilamentSimpleListEntry\Infolists\Enums;

enum SimpleListListStyle: string
{
    case inline = 'inline';
    case list = 'list';

    public static function fromName($name): string
    {
        foreach (self::cases() as $status) {

            if (is_string($name) && $name === $status->name) {
                return $status->value;
            } else if (is_object($name) && $name === $status) {
                return $status->value;
            }
        }
        throw new \ValueError("$name is not a valid backing value for enum " . self::class);
    }
}
