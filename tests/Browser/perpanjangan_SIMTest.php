<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class perpanjangan_simTest extends DuskTestCase
{/**
     * A basic browser test example.
     * @group Laravel
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
            
            ->type ('email','limlimutu@gmail.com')
            ->type ('password', 'galaxyj5')
            ->press ('Login')
           
            ->click('span', 'SIM')
            ->click('a','Perpanjangan SIM')
                    ;
        });
    }
}