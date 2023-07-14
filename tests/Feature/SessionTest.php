<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
    public function testCreateSession()
    {
        $this->get('/session/create')
            ->assertSeeText("OK")
            ->assertSessionHas('UserId', 'Miftah Fadilah')
            ->assertSessionHas('IsMember', 'true');
    }

    public function testGetSession()
    {
        $this->withSession([
            'UserId'    => 'Miftah Fadilah',
            'IsMember'  => 'true'
        ])->get('/session/get')
            ->assertSeeText('Miftah Fadilah')->assertSeeText('true');
    }
}
