<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testRouteParameter()
    {
        $this->get('/products/1')
            ->assertSeeText("Products : 1");

        $this->get('/products/1/items/xxx')
            ->assertSeeText('Products : 1 Items : xxx');
    }

    public function testRouteParameterRegex()
    {
        $this->get('/categories/12345')
            ->assertSeeText("Categories : 12345");

        $this->get('/categories/salah')
            ->assertSeeText("404");
    }

    public function testRouteOptionalParameter()
    {
        $this->get('/users/')
            ->assertSeeText("Users : 404");

        $this->get('/users/12345')
            ->assertSeeText("Users : 12345");
    }

    public function testRoutingConfict()
    {
        $this->get('/conflict/ujang')
            ->assertSeeText("Conflict ujang");

        $this->get('/conflict/miftah')
            ->assertSeeText("Conflict miftah");
    }

    public function testNamed()
    {
        $this->get('/produk/12345')->assertSeeText('products/12345');
        $this->get('/produk-redirect/12345')->assertSeeText('products/12345');
    }
}
