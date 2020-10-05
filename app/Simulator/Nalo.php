<?php

namespace App\Simulator;

class Nalo implements Aggregator
{
    public static function formRequest(
        $sessionId,
        $phoneNumber,
        $network,
        $input,
        $sequence
    ) {
        return [
            'USERID' => 'nalotest',
            'MSISDN' => '233' . substr($phoneNumber, 1),
            'USERDATA' => str_replace("#", "", $input),
            'MSGTYPE' => $sequence === 1 ? true : false,
            'NETWORK' => strtoupper($network),
        ];
    }

    public static function intepretResponse($response)
    {
        return [
            'message' => $response['MSG'],
            'action' => $response['MSGTYPE'] === true ? 'input': 'prompt',
        ];
    }
}
