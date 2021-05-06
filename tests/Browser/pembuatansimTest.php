<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class pembuatansimTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group pembuatansim
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'user@gmail.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home')
                ->clickLink('SIM')
                ->clickLink('Pembuatan')
                ->assertSee('No Registrasi');
        });
    }
}
