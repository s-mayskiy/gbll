<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test()
    {

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('nav-link active');

        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSeeText('Корень админки');
        $response->assertSee('nav-link active');

        $response = $this->get('/admin/downloadNewsByCategory');
        $response->assertStatus(200);

        $response = $this->get('/categories');
        $response->assertStatus(200);
        $response->assertSeeText('Категории');
        $response->assertSee('nav-link active');

        $response = $this->get('/news');
        $response->assertStatus(200);
        $response->assertSeeText('Все новости');
        $response->assertSee('nav-link active');

        $response = $this->get('/news/1');
        $response->assertStatus(200);
        $response->assertSeeText('Футбола у нас больше нет');

        $response = $this->get('/admin/create');
        $response->assertStatus(200);
        $response->assertSee('form');
        $response->assertSee('submit');

        $response = $this->get('/categories/sport');
        $response->assertStatus(200);
        $response->assertSeeText('Спорт');
    }
}
