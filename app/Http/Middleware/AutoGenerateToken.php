<?php

namespace App\Http\Middleware;

use Closure;
use Session, App;
use Carbon\Carbon;

use Illuminate\Contracts\Auth\Guard;
use App\API\Connectors\APIAuth;

class AutoGenerateToken
{
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//1. check expired
		if(Session::get('expired_at') <= Carbon::now()->format('Y-m-d H:i:s'))
		{
			$tokens['access_token']	= Session::get('access_token');
			$tokens['refresh_token']= Session::get('refresh_token');
			$tokens['grant_type']	= 'refresh_token';

			$APIAuth						= new APIAuth;

			$result							= $APIAuth->loggedIn($tokens);

			if($result['status'] != 'success')
			{
				App::abort(404);
			}

			Session::put('access_token', $result['data']['access_token']);
			Session::put('refresh_token', $result['data']['refresh_token']);
			Session::put('expired_at', $result['data']['expired_at']);
		}

		return $next($request);
	}
}
