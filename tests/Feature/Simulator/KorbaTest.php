<?php

namespace Tests\Feature\Simulator;

use App\Simulator\Korba;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KorbaTest extends TestCase
{
    use WithFaker;

    public function networks()
    {
        return [
            ['airteltigo', '06'],
            ['glo', '00'],
            ['mtn', '01'],
            ['vodafone', '02'],
        ];
    }

    /** @dataProvider networks */
    public function testItComposesTheCorrectInitialRequest($networkName, $networkValue)
    {
        $sessionId = $this->faker->uuid;
        $phoneNumber = sprintf('0%d', $this->faker->randomNumber(9, true));
        $input = $this->faker->randomDigit;

        $request = Korba::formRequest(
            $sessionId,
            $phoneNumber,
            $networkName,
            $input,
            1
        );

        $this->assertEquals($request, [
            'sessionID' => $sessionId,
            'msisdn' => '233' . substr($phoneNumber, 1),
            'network' => $networkValue,
            'ussdString'=> $input,
            'ussdServiceOp' => 1,
        ]);
    }

    /** @dataProvider networks */
    public function testItComposesTheCorrectContinuesRequest($networkName, $networkValue)
    {
        $sessionId = $this->faker->uuid;
        $phoneNumber = sprintf('0%d', $this->faker->randomNumber(9, true));
        $input = $this->faker->randomDigit;
        $sequence = $this->faker->numberBetween(2);

        $request = Korba::formRequest(
            $sessionId,
            $phoneNumber,
            $networkName,
            $input,
            $sequence
        );

        $this->assertEquals($request, [
            'sessionID' => $sessionId,
            'msisdn' => '233' . substr($phoneNumber, 1),
            'network' => $networkValue,
            'ussdString'=> $input,
            'ussdServiceOp' => 18,
        ]);
    }

    public function testItParsesTheCorrectResponseWithInput()
    {
        $message = 'Hello World';

        $response = Korba::intepretResponse([
            'message' => $message,
            'ussdServiceOp' => 2,
        ]);

        $this->assertEquals($response, [
            'message' => $message,
            'action' => 'input'
        ]);
    }

    public function testItParsesTheCorrectResponseWithoutInput()
    {
        $message = 'Hello World';

        $response = Korba::intepretResponse([
            'message' => $message,
            'ussdServiceOp' => $this->faker->randomElement([17, 29, null]),
        ]);

        $this->assertEquals($response, [
            'message' => $message,
            'action' => 'prompt'
        ]);
    }
}
