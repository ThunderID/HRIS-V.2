<?php namespace App\Http\Controllers\General;

use App\API\Connectors\APIOrg;

use App\Http\Controllers\BaseController;
use Input, Route;

class DashboardController extends BaseController 
{
	//init 
	protected $view_source_root		= 'pages.dashboard';
	protected $page_title			= 'dashboard';
	protected $breadcrumb			= [];
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//page attributes
		$this->page_attributes->page_title	= $this->page_title;
		$this->page_attributes->filters		= ['b'];

		//get data parameter
		$data_parameter						= $this->setPageDataParameter();

		//data
		$APIOrg								= new APIOrg;
		$data 								= $APIOrg->getIndex([
													'take'	=> $data_parameter['take'],
													'skip'	=> ($data_parameter['page'] - 1) * $data_parameter['take'],
												]);
		//page datas
		$this->page_datas->datas			= $data;


		//generate view

		$view_source						= $this->view_source_root;
		$route_source						= route(Route::CurrentRouteName());

		return $this->generateView($view_source, $route_source);
	}
}