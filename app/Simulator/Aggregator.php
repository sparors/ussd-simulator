<?php

namespace App\Simulator;

interface Aggregator
{
    /* Create the request to send */
    public static function formRequest(
        $sessionId,
        $phoneNumber,
        $network,
        $input,
        $sequence
    );

    /* Decode the response received */
    public static function intepretResponse($response);
}
