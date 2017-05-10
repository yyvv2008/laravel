<?php 

namespace App\Http\Middleware;

use Closure;

/**
* 
*/
class Active
{
	public function handle($request, Closure $next)
	{
		if (time() < strtotime('2017-06-06')) {
			return redirect('node/active0');
		}

		return $next($request);
	}
}
