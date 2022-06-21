<?php

namespace Taheri\Todolist;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Taheri\Todolist\Http\Middleware\AuthCheckMiddleware;

class TodoListServiceProvider extends ServiceProvider{

public function register(){
    $this->mergeConfigFrom(__DIR__.'/../config/config.php','todolist');
	}

	public function boot(){
    $router= $this->app->make(Router::class);
    $router->aliasMiddleware('token-check',AuthCheckMiddleware::class);
	   $this->loadViewsFrom(__DIR__.'/../resources/views','todolist');
	   $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
       $this->registerRoutes();
      if ($this->app->runningInConsole()) {
       $this->publishes([
     __DIR__.'/../resources/views' => resource_path('views/vendor/todolist'),
        ] , 'views');

        // Publish assets
  		$this->publishes([
    	__DIR__.'/../resources/assets' => public_path('todolist'),
  		], 'assets');
      }
	}

	protected function registerRoutes(){
		Route::group($this->routeConfiguration(), function() {
		    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
		});
	}
	protected function routeConfiguration(){
		return [
 			'prefix'=>config('todolist.prefix'),
 			'middleware'=>config('todolist.middleware')
		];
	}
}