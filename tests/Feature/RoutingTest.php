<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testBasicRouting()
    {
        $this->get("/pzn")
            ->assertStatus(200)
            ->assertSeeText("Miftah Fadilah Keren");
    }

    public function testRedirect()
    {
        $this->get("/youtube")
            ->assertRedirect("/pzn");
    }

    public function testFallback()
    {
        $this->get("/404")
            ->assertSeeText("404");
    }
}
