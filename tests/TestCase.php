<?php

namespace Taheri\Todolist\Tests;

use Taheri\Todolist\TodoListServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    // Code before application created.

    parent::setUp();
    $this->withFactories(__DIR__.'/../database/factories');
  // $this->withFactories(realpath(dirname(__DIR__).'/database/factories'));
    $this->artisan('migrate', [
      '--database' => 'testbench',
      '--realpath' => realpath(dirname(__DIR__).'/../database/migrations'),
    ])->run();
  }
  /* ... */
  
  // protected function resolveApplicationHttpKernel($app)
  // {
  //   // $app->singleton('Illuminate\Contracts\Http\Kernel', 'Acme\Testbench\Http\Kernel');
  //   }
  
/**
 * Ignore package discovery from.
 *
 * @return array
 */
public function ignorePackageDiscoveriesFrom()
{
    return [];
}

/**
 * Get package providers.
 *
 * @param  \Illuminate\Foundation\Application  $app
 *
 * @return array
 */
protected function getPackageProviders($app)
{
    return [
        TodoListServiceProvider::class
    ];
}
/**
* Make sure all integration tests use the same Laravel "skeleton" files.
* This avoids duplicate classes during migrations.
*
* Overrides \Orchestra\Testbench\Dusk\TestCase::getBasePath
*       and \Orchestra\Testbench\Concerns\CreatesApplication::getBasePath
*
* @return string
*/
protected function getBasePath()
{
    // Adjust this path depending on where your override is located.
    return __DIR__.'/../vendor/orchestra/testbench-dusk/laravel'; 
}
/**
 * Define environment setup.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return void
 */
protected function getEnvironmentSetup($app)
{
    // Setup default database to use sqlite :memory:
    $app['config']->set('database.default', 'testbench');
    $app['config']->set('database.connections.testbench', [
        'driver'   => 'sqlite',
        'database' => ':memory:'
    ]);
}
/**
 * Define database migrations.
 *
 * @return void
 */
protected function defineDatabaseMigrations()
{
    $this->loadLaravelMigrations(['--database' => 'testbench']);
}

}
