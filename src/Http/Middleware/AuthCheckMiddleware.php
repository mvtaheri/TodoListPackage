<?php

namespace Taheri\Todolist\Http\Middleware;

use Illuminate\Http\Request;
use \Closure;
use App\Models\User;
class AuthCheckMiddleware {

     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

	public function handle($request ,Closure $next){
  //        $user=\User::where('token',$request->token)->first();
		// if (!$user) {     
  //           return abort(403, 'Unauthorized action.');
  //       }
 
        return $next($request);
	}
}