<?php

namespace App\Enums;

enum RoleTypes: int
{

    case ADMIN = 1;
    case MANAGER = 2;
    case CLIENT = 3;

    /**
     * @return string
     */
    public function label(): string
    {
        return self::getLabel($this);
    }

    /**
     * @param  RoleTypes  $value
     * @return string
     */
    public static function getLabel(self $value): string
    {
        return match ($value) {
            RoleTypes::ADMIN => 'admin',
            RoleTypes::MANAGER => 'manager',
            RoleTypes::CLIENT => 'client',
        };
    }

}
