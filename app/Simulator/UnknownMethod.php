<?php

namespace App\Simulator;

use Exception;

class UnknownMethod extends Exception
{
    public static function create()
    {
        return new static('The method specified is not known');
    }
}
