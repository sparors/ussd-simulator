<?php

namespace Tests\Feature\Simulator;

use App\Simulator\Engine;
use App\Simulator\NoAggregator;
use App\Simulator\UnknownMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EngineTest extends TestCase
{
    use WithFaker;

    public function testItThrowsAnExceptionWithInvalidAggregator()
    {
        $this->expectException(NoAggregator::class);

        Engine::run(
            $this->faker->uuid,
            $this->faker->url,
            $this->faker->randomElement(['GET', 'POST']),
            $this->faker->randomElement(['airteltigo', 'mtn', 'glo', 'vodafone']),
            sprintf('0%d', $this->faker->randomNumber(9, true)),
            'wrong_aggregrator',
            $this->faker->randomDigit,
            $this->faker->randomDigit
        );
    }

    public function testItThrowsAnExceptionWithInvalidMethod()
    {
        $this->expectException(UnknownMethod::class);

        Engine::run(
            $this->faker->uuid,
            $this->faker->url,
            'PUT',
            $this->faker->randomElement(['airteltigo', 'mtn', 'glo', 'vodafone']),
            sprintf('0%d', $this->faker->randomNumber(9, true)),
            'korba',
            $this->faker->randomDigit,
            $this->faker->randomDigit
        );
    }
}
