<?php

namespace App\Simulator;

use Exception;

class NoFalseValue extends Exception
{
    public static function create()
    {
        return new static('No False Value Allowed');
    }
}
