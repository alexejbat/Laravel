<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                    ->type('title', '1')
                    ->press('Добавить')
                ->assertSee('Количество символов в поле Заголовок новости должно быть не меньше 3.');
        });

    }
}
