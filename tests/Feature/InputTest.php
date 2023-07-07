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

    public function testInputType()
    {
        $this->post('/input/type', [
            'name'  => 'Miftah',
            'married'   => 'true',
            'birth_date'    => '2004-11-27'
        ])->assertSeeText('Miftah')
            ->assertSeeText('true')
            ->assertSeeText('2004-11-27');
    }

    public function testFilterOnly()
    {
        $this->post('/input/filter/only', [
            "name"  => [
                "first" => "Miftah",
                "middle"    => "Karung",
                "last"  => "Fadilah"
            ]
        ])->assertSeeText("Miftah")
            ->assertDontSeeText("Karung")
            ->assertSeeText("Fadilah");
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/except', [
            "username"  => "Miftah Fadilah",
            "admin" => "true",
            "password"  => "rahasia"
        ])->assertSeeText("Miftah Fadilah")
            ->assertSeeText("rahasia")
            ->assertDontSeeText("admin");
    }

    public function testFilterMerge()
    {
        $this->post('/input/filter/merge', [
            "username"  => "Miftah Fadilah",
            "admin" => "true",
            "password"  => "rahasia"
        ])->assertSeeText("Miftah Fadilah")
            ->assertSeeText("rahasia")
            ->assertSeeText("admin")
            ->assertSeeText("false");
    }
}
