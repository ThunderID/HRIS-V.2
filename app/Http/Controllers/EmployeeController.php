<?php namespace App\Http\Controllers;

use Input, Session, DB, Redirect, Response, Auth, Validator, View;

class EmployeeController extends Controller 
{
	/**
     * Instantiate a new UserController instance.
     */
    
    public function __construct()
    {
        // $this->middleware('passwordneeded', ['only' => ['store']]);

    	// parent::__construct();
    }

	public function index($code = null)
	{
        $employees					= \App\Libraries\APIResponse::httppost(env('API_EMPS_G', 'localhost:9000/employees'), ['code' => $code]);

        $organisation               = \App\Libraries\APIResponse::httppost(env('API_ORGS_G', 'localhost:9000/organisations'), ['code' => $code]);

        View::share('organisation', $organisation[0]);

		return view('employee.index', compact('employees'));
	}

    public function show($code = null)
    {
        $organisation               = \App\Libraries\APIResponse::httppost(env('API_ORGS_G', 'localhost:9000/organisations'), ['code' => $code]);

        View::share('organisation', $organisation[0]);

        return view('employee.show');
    }
}