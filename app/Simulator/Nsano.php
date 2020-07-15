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
                        return 'AirtelTigo';
                    break;
                    case 'glo':
                        return 'Glo';
                    break;
                    case 'mtn':
                        return 'MTN';
                    break;
                    case 'vodafone':
                        return 'Vodafone';
                    break;
                    default:
                        return null;
                }
            })($network),
            'msg' => str_replace("#", "", $input),
        ];
    }

    public static function intepretResponse($response)
    {
        return [
            'message' => ! is_array($response['USSDResp']['menus'])
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
