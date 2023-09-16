<?php

namespace App\ENUM;

enum SupportStatus: string
{
    case A = "Open";
    case C = "Closed";
    case P = "Pendent";

    public static function fromValue(string $name)
    {
        foreach (self::cases() as $status) {
            if (strtolower($status->name) === $name) {
                return $status->value;
            }
        }
        throw new \ValueError("$status->name is not a valid");
    }
}
