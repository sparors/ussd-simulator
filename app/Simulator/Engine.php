<?php

namespace App\Simulator;

use App\Simulator\NoAggregator;
use App\Simulator\UnknownMethod;
use Exception;
use Illuminate\Support\Facades\Http;

class Engine
{
    public static function run(
        $sessionId,
        $url,
        $method,
        $network,
        $phoneNumber,
        $aggregatorName,
        $input,
        $sequence
    ) {
        $response = null;
        $aggregator = static::getAggregator($aggregatorName);

        if ($aggregator === null) {
            throw NoAggregator::create();
        }

        if ($method == 'GET') {
            $response = Http::get(
                $url,
                $aggregator::formRequest(
                    $sessionId,
                    $phoneNumber,
                    $network,
                    $input
                )
            );
        }

        if ($method == 'POST') {
            $response = Http::post(
                $url,
                $aggregator::formRequest(
                    $sessionId,
                    $phoneNumber,
                    $network,
                    $input,
                    $sequence
                )
            );

            info(json_encode(
                $aggregator::formRequest(
                    $sessionId,
                    $phoneNumber,
                    $network,
                    $input,
                    $sequence
                )
                ));
        }

        if ($response === null) {
            throw UnknownMethod::create();
        }

        return $aggregator::intepretResponse($response->json());
    }

    protected static function getAggregator($aggregatorName)
    {
        if ($aggregatorName === 'korba') {
            return Korba::class;
        }

        if ($aggregatorName === 'nsano') {
            return Nsano::class;
        }

        return null;
    }
}
