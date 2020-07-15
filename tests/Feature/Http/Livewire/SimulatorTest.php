<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\Simulator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SimulatorTest extends TestCase
{
    use WithFaker;

    protected $url;
    protected $method;
    protected $network;
    protected $phoneNumber;
    protected $aggregator;
    protected $input;

    protected function setUp(): void
    {
        parent::setUp();

        $this->url = $this->faker->url;
        $this->method = $this->faker->randomElement(['GET', 'POST']);
        $this->network = $this->faker->randomElement(['airteltigo', 'glo', 'mtn', 'vodafone']);
        $this->phoneNumber = sprintf('0%d', $this->faker->randomNumber(9, true));
        $this->aggregator = $this->faker->randomElement(['korba', 'nsano']);
        $this->input = $this->faker->randomDigit;
    }

    public function falseValues()
    {
        return [
            ['wrong url', null, null, null, null, null,],
            [null, 'PUT', null, null, null, null,],
            [null, null, 15, null, null, null,],
            [null, null, null, '4323423', null, null,],
            [null, null, null, null, 'unknown network', null,],
            [null, null, null, null, null, '',],
        ];
    }

    /** @dataProvider falseValues */
    public function testDisplaysExceptionWhenThereAFalseValue(
        $url,
        $method,
        $network,
        $phoneNumber,
        $aggregator,
        $input
    ) {
        $url = $url ?? $this->url;
        $method = $method ?? $this->method;
        $network = $network ?? $this->network;
        $phoneNumber = $phoneNumber ?? $this->phoneNumber;
        $aggregator = $aggregator ?? $this->aggregator;
        $input = $input ?? $this->input;

        Livewire::test(Simulator::class)
            ->set('url', $url)
            ->set('method', $method)
            ->set('network', $network)
            ->set('phoneNumber', $phoneNumber)
            ->set('aggregator', $aggregator)
            ->set('input', $input)
            ->call('sendRequest')
            ->assertSet('output', "An Exception Occured\nPlease check your request and try again.")
            ->assertSee("An Exception Occured\nPlease check your request and try again.");
    }

    public function testTheSessionIdCanBeReset()
    {
        Http::fakeSequence()
            ->push([
                'message' => 'Hello World 1',
                'ussdServiceOp' => 1,
            ])
            ->push([
                'message' => 'Hello World 2',
                'ussdServiceOp' => 18,
            ])
            ->push([
                'message' => 'Hello World 3',
                'ussdServiceOp' => 18,
            ]);

        $sessionId = null;

        Livewire::test(Simulator::class)
            ->set('url', $this->url)
            ->set('method', 'POST')
            ->set('network', $this->network)
            ->set('phoneNumber', $this->phoneNumber)
            ->set('aggregator', 'korba')
            ->set('input', $this->input)
            ->call('sendRequest')
            ->assertSet('output', "Hello World 1")
            ->assertSee("Hello World 1")
            ->tap(function ($livewire) use (&$sessionId) {
                $sessionId = $livewire->get('sessionId');
            })
            ->call('sendRequest')
            ->assertSet('output', "Hello World 2")
            ->assertSee("Hello World 2")
            ->assertSet('sessionId', $sessionId)
            ->call('cancelRequest')
            ->assertSet('sessionId', null)
            ->call('sendRequest')
            ->assertNotSet('sessionId', null)
            ->assertNotSet('sessionId', $sessionId)
            ->assertSet('sequence', 1);
    }
}
