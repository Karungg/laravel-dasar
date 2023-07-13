<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLTest extends TestCase
{
    public function testCurrent()
    {
        $this->get('/url/current?name=Miftah')
            ->assertSeeText('/url/current?name=Miftah');
    }

    public function testNamed()
    {
        $this->get('/url/named')
            ->assertSeeText('/redirect/name/Miftah');
    }

    public function testAction()
    {
        $this->get('/url/action')
            ->assertSeeText('form');
    }
}
