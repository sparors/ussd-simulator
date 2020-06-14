<?php

namespace Tests\Feature\Simulator;

use App\Simulator\Nsano;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NsanoTest extends TestCase
{
    use WithFaker;

    public function networks()
    {
        return [
            ['airteltigo', 'AirtelTigo'],
            ['glo', 'Glo'],
            ['mtn', 'MTN'],
            ['vodafone', 'Vodafone'],
        ];
    }

    /** @dataProvider networks */
    public function testItComposesTheCorrectRequest($networkName, $networkValue)
    {
        $sessionId = $this->faker->uuid;
        $phoneNumber = sprintf('0%d', $this->faker->randomNumber(9, true));
        $input = $this->faker->randomDigit;
        $sequence = $this->faker->numberBetween(1);

        $request = Nsano::formRequest(
            $sessionId,
            $phoneNumber,
            $networkName,
            $input,
            $sequence
        );

        $this->assertEquals($request, [
            'msisdn' => '233' . substr($phoneNumber, 1),
            'msg'=> $input,
            'network' => $networkValue,
            'UserSessionID' => $sessionId,
        ]);
    }

    public function testItParsesTheCorrectResponseWithInput()
    {
        $message = 'Hello World';

        $response = Nsano::intepretResponse([
            'USSDResp' => [
                'action' => 'input',
                'menus' => '',
                'title' => $message,
            ],
        ]);

        $this->assertEquals($response, [
            'message' => $message,
            'action' => 'input'
        ]);
    }

    public function testItParsesTheCorrectResponseWithShowMenu()
    {
        $message = 'Hello World';
        $menus = ['1.Option1', '2.Option2'];

        $response = Nsano::intepretResponse([
            'USSDResp' => [
                'action' => 'showMenu',
                'menus' => $menus,
                'title' => $message,
            ],
        ]);

        $this->assertEquals($response, [
            'message' => sprintf("%s\n%s\n%s", $message, ...$menus),
            'action' => 'input'
        ]);
    }

    public function testItParsesTheCorrectResponseWithPrompt()
    {
        $message = 'Hello World';

        $response = Nsano::intepretResponse([
            'USSDResp' => [
                'action' => 'prompt',
                'menus' => '',
                'title' => $message,
            ],
        ]);

        $this->assertEquals($response, [
            'message' => $message,
            'action' => 'prompt'
        ]);
    }
}
