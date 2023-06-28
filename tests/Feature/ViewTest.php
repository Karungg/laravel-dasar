<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Hello Miftah Fadilah');

        $this->get('/hello-again')
            ->assertSeeText('Hello Miftah Fadilah');
    }

    public function testViewNested()
    {
        $this->get('/world')
            ->assertSeeText('World Gadis Syalwa Dedisyah Putri');
    }

    public function testViewWithoutRoute()
    {
        $this->view('hello', ['name' => 'Miftah Fadilah'])
            ->assertSeeText('Hello Miftah Fadilah');
    }
}
