<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testResponse()
    {
        $this->get('/response/hello')
            ->assertStatus(200)
            ->assertSeeText("Hello Response");
    }

    public function testHeader()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText('Miftah')->assertSeeText('Fadilah')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'Programmer Zaman Now')
            ->assertHeader('App', 'Belajar Laravel');
    }

    public function testResponseView()
    {
        $this->get('/response/type/view')
            ->assertSeeText("Hello Miftah");
    }

    public function testResponseJson()
    {
        $this->get('/response/type/json')
            ->assertJson(['firstName'   => "Miftah", 'lastName' => "Fadilah"]);
    }

    public function testResponseFile()
    {
        $this->get('/response/type/file')
            ->assertHeader("Content-Type", "image/jpeg");
    }

    public function testResponseDonwload()
    {
        $this->get('/response/type/download')
            ->assertDownload("Miftah.jpg");
    }
}
