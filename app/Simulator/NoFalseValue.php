<?php

namespace App\Simulator;

use Exception;

class NoFalseValue extends Exception
{
    public static function create()
    {
        return new static('Please check your request and try again.');
    }
}
