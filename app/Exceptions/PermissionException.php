<?php

namespace App\Exceptions;

use Exception;

class PermissionException extends Exception
{
    /**
     * @var int
     */
    protected $code = 403;

    /**
     * @var string
     */
    protected $message = 'Ошибка, нет доступа';
}
