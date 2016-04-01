<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Helper\SortList;
use Input, Route;

/**
 * { OrgController Class }
 * @author Chelsy
 * 
 * public functions :
 * 1. index()                           : public function display index org
 * 
 */

class PolicyController extends BaseController 
{
	//init 
	protected $view_source_root                     = 'pages.policy';
	
	public function __construct()
	{
		parent::__construct();

		$this->page_attributes->page_title             = 'Kebijakan';
		$this->page_attributes->breadcrumb             =    [
															];        
	}

	/**
	 * { index }
	 *
	 * @param     
	 *
	 * @return
	 */
	public function index($org_id = 0)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		//2. get data
		$SortList                                   = new SortList;

		$this->page_attributes->page_subtitle       = 'index';
		//dummy
		$this->page_attributes->filters             =   [
														];
		//dummy
		$this->page_attributes->sorts               =   [
														];       

		//2. get data parameter
		$data_parameter                             = $this->setPageDataParameter();

		//3. get data
		$search                                     = array_merge(
															['name' => $data_parameter['search']],
															$data_parameter['filter']
														);
		$APIOrg										= new APIOrg;
		$organisation								= $APIOrg->getShow($org_id);

		//4. set page datas
		$this->page_datas->datas['id']				= $org_id;
		$this->page_datas->datas['name']			= $organisation['data']['name'];

		//5. generate view
		$this->page_attributes->breadcrumb          = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$organisation['data']['name'] => route('org.show', ['id' => $org_id]),
																'Kebijakan' => route('policy.index', ['org_id' => $org_id]),
															]
														);

		$view_source                                = $this->view_source_root . '.index';
		$route_source                               = route(Route::CurrentRouteName());

		return $this->generateView($view_source, $route_source);
	}
}