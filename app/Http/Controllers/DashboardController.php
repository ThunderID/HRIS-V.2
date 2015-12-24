<?php namespace App\Http\Controllers;

use Input, Session, DB, Redirect, Response, Auth, Validator, View;

class DashboardController extends Controller 
{
	/**
     * Instantiate a new UserController instance.
     */
    
    public function __construct()
    {
        // $this->middleware('passwordneeded', ['only' => ['store']]);

    	// parent::__construct();
    }

	public function index()
	{
        $absences					= \App\Libraries\APIResponse::httppost(env('API_ORGS_G', 'localhost:9000/organisations'), ['absencetoday' => 1]);

		return view('dashboard.index', compact('absences'));
	}

    public function show($code = null)
    {
        $organisation               = \App\Libraries\APIResponse::httppost(env('API_ORGS_G', 'localhost:9000/organisations'), ['code' => $code]);

        View::share('organisation', $organisation[0]);

        return view('dashboard.show');
    }
}