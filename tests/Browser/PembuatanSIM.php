<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PembuatanSIM extends DuskTestCase
{
    /**
     * A Dusk test example.
     * 
     * @test
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    // ->click('span', 'Login')
                    ->assertSee('Website')


                    // ->assertSee('Data Permohonan')
                    // ->type('text', '12345678')
                    // ->type('text', 'Pembuatan SIM')
                    // ->click('radio', 'A')
                    // ->click('select', 'Jawa Timur')
                    // ->click('select', 'Option #1')
                    // ->type('text', 'Bandung')
                    // ->click('button', 'Selanjutnya')            
                    ;
        });
    }
}
