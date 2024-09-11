<?php

namespace App\Enums;

enum SupportStatus:string
{
    case A = "Open";
    case P = "Pendent";
    case C = "Closed";

    public static function fromValue(string $statusRequest):string
    {
        foreach (self::cases() as $status) {
            if($statusRequest === $status->name)
                return $status->value;
        }

        throw new \ValueError("$statusRequest is not a valid");
        // return array_column(self::cases(), 'value', 'name')[$value];
    }
}
