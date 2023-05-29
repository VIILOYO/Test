<?php

namespace App\Exceptions;

class NotFoundTokenException extends AppHttpException
{
    /**
     * @var int
     */
    protected $code = 404;

    /**
     * @var string
     */
    protected $message = 'Пользователь с таким токеном не найден';
}
