<?php

namespace App\Exceptions;

use Exception;

class NonVerificatedException extends Exception
{
    /**
     * @var int
     */
    protected $code = 406;

    /**
     * @var string
     */
    protected $message = 'Вы не подтвердили почту';
}
