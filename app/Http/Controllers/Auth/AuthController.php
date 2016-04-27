<?php namespace App\Http\Controllers\Auth;

use App\API\Connectors\APIAuth;

use App\Http\Controllers\BaseController;
use Input, Route, Session;

class AuthController extends BaseController 
{
	//init 
	protected $view_source_root	= 'pages.auth';
	protected $page_title		= 'Auth';
	protected $breadcrumb		= [];
	
	public function __construct()
	{
		parent::__construct();
	}

	public function getLogin()
	{
		//page attributes
		$this->page_attributes->page_title	= $this->page_title;

		//generate view
		$view_source                       = $this->view_source_root.'.login';
		$route_source                      = route(Route::CurrentRouteName());

		return $this->generateView($view_source, $route_source);
	}

	public function postLogin()
	{
		$credentials 					= Input::only('username', 'password');

		$credentials['key']				= env('OAUTH_KEY', 'localhost');
		$credentials['secret']			= env('OAUTH_SECRET', 'localhost');
		$credentials['grant_type']		= 'password';

		$APIAuth						= new APIAuth;

		$result							= $APIAuth->loggedIn($credentials);

		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}
		else
		{
			Session::put('access_token', $result['data']['access_token']);
			Session::put('refresh_token', $result['data']['refresh_token']);
			Session::put('expired_at', $result['data']['expired_at']);

			if(isset($result['data']['whoami']))
			{
				Session::put('whoami', $result['data']['whoami']);
			}
		}

		$this->page_attributes->msg		= "Login Sukses";

		return $this->generateRedirectRoute('org.index');        
	}

	public function getLogout()
	{
		$APIAuth						= new APIAuth;
		$credentials['grant_type']		= 'destroy_session';

		$result							= $APIAuth->loggedOut($credentials);

		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}
		else
		{
			Session::flush();
		}

		$this->page_attributes->msg		= "Logged Out";

		return $this->generateRedirectRoute('auth.login.get');        
	}
}