<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class EnvirontmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGetEnv()
    {
        $youtube = env('YOUTUBE');

        self::assertEquals('Miftah Fadilah', $youtube);
    }

    public function testDefaultValue()
    {
        $author = env("AUTHOR", "Miftah");

        self::assertEquals("Miftah", $author);
    }

    public function testEnvirontment()
    {
        if (App::environment("testing")) {
            echo "LOGIC IN TESTING ENV" . PHP_EOL;
            self::assertTrue(true);
        }
    }
}
