<?php

namespace App\Simulator;

class Nsano implements Aggregator
{
    public static function formRequest(
        $sessionId,
        $phoneNumber,
        $network,
        $input,
        $sequence
    ) {
        return [
            'UserSessionID' => $sessionId,
            'msisdn' => '233' . substr($phoneNumber, 1),
            'network' => (function ($network) {
                switch($network) {
                    case 'airteltigo':
                        return '06';
                    break;
                    case 'glo':
                        return '03';
                    break;
                    case 'mtn':
                        return '01';
                    break;
                    case 'vodafone':
                        return '07';
                    break;
                    default:
                        return '00';
                }
            })($network),
            'msg' => $input,
        ];
    }

    public static function intepretResponse($response)
    {
        return [
            'message' => strlen($response['USSDResp']['menus']) === 0
                ? $response['USSDResp']['title']
                : $response['USSDResp']['title']
                    . array_reduce(
                        $response['USSDResp']['menus'],
                        function ($carry, $item) {
                            return $carry .= "\n$item";
                        }
                    ),
            'action' => $response['USSDResp']['action'] == 'prompt'
                ? 'prompt'
                : 'input',
        ];
    }
}
