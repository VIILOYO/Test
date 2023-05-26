<?php

namespace App\Exceptions;

class LoginException extends AppHttpException
{
    /**
     * @var int
     */
    protected $code = 408;

    /**
     * @var string
     */
    protected $message = 'Ошибка в заполнении данных';
}
