<?php

namespace App\Enums;

enum RoleEnum: string
{
    case DIRECTOR               = 'director';
    case EDUCATOR               = 'educator';
    case ADMINISTRATOR          = 'administrator';

    public function label(): string
    {
        return match ($this) {
            self::DIRECTOR              => 'Direktor',
            self::EDUCATOR              => 'Tarbiyachi',
            self::ADMINISTRATOR         => 'Administrator',
        };
    }
}
