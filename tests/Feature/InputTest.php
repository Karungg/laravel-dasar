<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Miftah')->assertSeeText("Hello Miftah");
        $this->post('/input/hello', ['name' => 'Miftah'])->assertSeeText("Hello Miftah");
    }

    public function testNestedInput()
    {
        $this->post('/input/hello', [
            'name' =>
            [
                'first' => 'Miftah'
            ]
        ])->assertSeeText("Hello Miftah");
    }

    public function testInputAll()
    {
        $this->post('/input/hello', [
            'name'  => [
                'first' => 'Miftah',
                'last'  => 'Fadilah'
            ]
        ])->assertSeeText("name")
            ->assertSeeText("first")
            ->assertSeeText("Miftah")
            ->assertSeeText("last")
            ->assertSeeText("Fadilah");
    }

    public function testArrayInput()
    {
        $this->post('/input/hello/array', [
            'products'  => [
                ['name'  => 'Iphone 14 Pro Max'],
                ['name'  => 'Samsung Galaxy S23 Ultra']
            ]
        ])->assertSeeText("Iphone 14 Pro Max")
            ->assertSeeText("Samsung Galaxy S23 Ultra");
    }
}
