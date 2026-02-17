<?php

namespace App\Exceptions;

use App\Exceptions\Support\RenderSupport;
use Exception;

class DefinedFault extends Exception
{
    use RenderSupport;

    public function __construct($message = null, $code = 400, ?Exception $previous = null)
    {
        $message['message'] ??= 'Bad request.';
        parent::__construct(json_encode($message), $code, $previous);
    }
}
