<?php

namespace App\Simulator;

use Exception;

class NoAggregator extends Exception
{
    public static function create()
    {
        return new static('No Aggregator specified');
    }
}
