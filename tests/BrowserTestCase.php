<?php
namespace Taheri\Todolist\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class BrowserTestCase extends Orchestra\Testbench\Dusk\TestCase{
use DatabaseMigrations;

  protected static $baseServeHost = '127.0.0.1';
  protected static $baseServePort = 9000;

/**
 * Define environment setup.
 *
 * @param  Illuminate\Foundation\Application  $app
 *
 * @return void
 */
protected function getEnvironmentSetUp($app)
{
        // Setup default database to use sqlite :memory:
    // $app['config']->set('database.default', 'testbench');
    // $app['config']->set('database.connections.testbench', [
    //     'driver'   => 'sqlite',
    //     'database' => ':memory:'
    // ]);
}

public function create_test_index(){

 $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
} DLS2R#KKZEM_Ncu