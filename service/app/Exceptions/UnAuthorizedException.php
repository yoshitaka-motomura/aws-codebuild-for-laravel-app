<?php

namespace App\Exceptions;

use Exception;

class UnAuthorizedException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        $message = $message ?: "UnAuthorized";
        $code = $code ?: 401;
        parent::__construct($message, $code, $previous);
    }
}
