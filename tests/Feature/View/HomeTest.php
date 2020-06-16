<?php

namespace Tests\Feature\View;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testHomeViewHasLivewireSimulatorComponent()
    {
        $response = $this->get('/');

        $response->assertOk();

        $response->assertSeeLivewire('simulator');
    }

    public function testStaticWordsAreDesplayed()
    {
        $response = $this->get('/');

        $response->assertSee('USSD');

        $response->assertSee('Simulator');

        $response->assertSee('yawmanford');

        $response->assertSee('isaacadzahsai');

        $response->assertSee('maxxsas');
    }
}
