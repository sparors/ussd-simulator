<?php

namespace App\Simulator;

class Korba implements Aggregator
{
    public static function formRequest(
        $sessionId,
        $phoneNumber,
        $network,
        $input,
        $sequence
    ) {
        return [
            'sessionID' => $sessionId,
            'msisdn' => '+233' . substr($phoneNumber, 1),
            'network' => (function ($network) {
                switch($network) {
                    case 'airteltigo':
                        return '06';
                    break;
                    case 'mtn':
                        return '01';
                    break;
                    case 'vodafone':
                        return '02';
                    break;
                    default:
                        return '00';
                }
            })($network),
            'ussdString' => $input,
            'ussdServiceOp' => $sequence === 1 ? 1 : 18,
        ];
    }

    public static function intepretResponse($response)
    {
        return [
            'message' => $response['message'],
            'action' => $response['ussdServiceOp'] === 2 ? 'input': 'prompt',
        ];
    }
}
