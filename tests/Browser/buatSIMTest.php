<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class buatSIM extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group sim
     * @test
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/buat')
                ->assertSee('Masuk')
                ->type('email', 'fitrianiannisa741@gmail.com')
                ->type('password', '12345678')
                ->press('Login')
                // ->click('a', 'SIM')
                // ->click('a', 'Pembuatan')
                // ->assertPathIs('/buat');
                
                ->assertSee('Pembuatan SIM')
                ->type('no_regis', '82553148')
                ->type('jenis_pelayanan', 'Pembuatan SIM')
                ->radio('A')
                ->select('polda_kedatangan', 'Jawa Timur')
                ->select('satpas_kedatangan', 'Option #1')
                ->type('alamat_satpas', 'Bandung')
                ->click('button', 'Selanjutnya')
                ;
            
        });
    }
}
