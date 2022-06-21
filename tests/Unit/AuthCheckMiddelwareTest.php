<?php

namespace Taheri\Todolist\Tests\Unit;

use Illuminate\Http\Request;
use Taheri\Todolist\Tests\TestCase;
use Taheri\Todolist\Http\Middleware\AuthCheckMiddleware;

class AuthCheckMiddelwareTest extends TestCase {
  

    /** @test **/
    public function check_token_request(){
  	
  		$request= new Request();
  		$request->merge(['token'=>'my-secret-token']);
  		$author = User::create([
            'name' => 'mohammad',
            'email' => 'taheri',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'token'=>'my-secret-token',
            'remember_token' => \Illuminate\Support\Str::random(10),
       ]);
         $request->merge(['user'=>$author]);
  	  (new AuthCheckMiddleware)->handle($request, function($request){
    	$this->assertEquals($request->token,'my-secret-token');
      });
    }
}

?>