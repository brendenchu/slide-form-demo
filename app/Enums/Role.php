<?php

namespace App\Enums;

enum Role: string
{
    case SuperAdmin = 'super-admin';
    case Admin = 'admin';
    case Consultant = 'consultant';
    case Client = 'client';

    public static function getInstances(): array
    {
        return [
            self::SuperAdmin,
            self::Admin,
            self::Consultant,
            self::Client,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::Admin => 'Admin',
            self::Consultant => 'Consultant',
            self::Client => 'Client',
        };
    }
}
