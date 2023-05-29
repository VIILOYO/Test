<?php

namespace App\Enums;

enum RoleEnum: string
{
    const USER = 'user';
    const WORKER = 'worker';
    const ADMIN = 'admin';
}
