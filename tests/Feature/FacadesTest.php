<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadesTest extends TestCase
{
    public function testConfig()
    {
        $firstName1 = config("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");

        self::assertEquals($firstName1, $firstName2);

        var_dump(Config::all());
    }

    public function testConfigDependency()
    {
        $config = $this->app->make("config");
        $firstName1 = $config->get("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");

        self::assertEquals($firstName1, $firstName2);

        var_dump(Config::all());
    }

    public function testConfigMock()
    {
        config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Miftah Keren');

        $firstName1 = Config::get("contoh.author.first");

        self::assertEquals("Miftah Keren", $firstName1);
    }
}
