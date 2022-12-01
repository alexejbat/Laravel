<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{
  //  use DatabaseMigrations;
  //  use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddNews()
    {


        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'тестовый заголовок')
                ->select('category_id', 1)
                ->type('text', 'тестовая новость')
                ->press('Добавить')
                ->assertSee('Новость успешно добавлена!');
        });

    }
}
