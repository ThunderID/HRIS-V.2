<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;
use App\API\Connectors\APICalendar;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Helper\SortList;
use Input, Route;
use Carbon\Carbon;
use Excel;

/**
 * { OrgController Class }
 * @author Chelsy
 * 
 * public functions :
 * 1. index()                           : public function display index org
 * 2. show()                            : public function display show org
 * 3. create()                          : public function display create org
 * 4. edit()                            : public function display edit org
 * 5. store()                           : public function store data org
 * 6. update()                          : public function update data org
 * 7. destroy()                         : public function destroy data org
 * 
 */

class CalendarController extends BaseController 
{
	//init 
	protected $view_source_root                     = 'pages.calendar';
	
	public function __construct()
	{
		parent::__construct();

		$this->page_attributes->page_title             = 'Karyawan';
		$this->page_attributes->breadcrumb             =    [
															];
		$this->middleware('password.needed', ['only' => ['destroy']]);
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
															'nama'          => $SortList->getSortingList('nama')
														];       
		//2. get data parameter
		$data_parameter                             = $this->setPageDataParameter();

		//3. get data
		$APICalendar								= new APICalendar;
		$search                                     =  ['name' => $data_parameter['search']]; 
		$APICalendar								= new APICalendar;

		$APIOrg										= new APIOrg;
		$organisation								= $APIOrg->getShow($org_id);

		$data                                       = $APICalendar->getIndex($org_id, [
														'search'    => $search,
														'sort'      => $data_parameter['sort'],
														'take'      => $data_parameter['take'],
														'skip'      => ($data_parameter['page'] - 1) * $data_parameter['take'],
														]);


		//4. set page datas
		$this->page_datas->datas['calendars']		= $data['data']['data'];
		
		$this->page_datas->datas['id']				= $org_id;
		$this->page_datas->datas['name']			= $organisation['data']['name'];
		$this->page_datas->datas['code']			= $organisation['data']['code'];

		//5. generate view
		$this->page_attributes->breadcrumb          = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$organisation['data']['name'] => route('org.show', ['id' => $org_id]),
																'Jadwal Kerja' => route('calendar.index', ['org_id' => $org_id]),
															]
														);

		$view_source                                = $this->view_source_root . '.index';
		$route_source                               = route(Route::CurrentRouteName());

		return $this->generateView($view_source, $route_source);
	}

	/**
	 * { show }
	 *
	 * @param     
	 * 1. id
	 * 2. org_id
	 *
	 * @return
	 * 1. Layout
	 * 2. page_attributes
	 * 3. page_datas
	 * 
	 * steps
	 * 1. validate
	 * 2. get data
	 * 3. set page attributes
	 * 4. set page datas
	 * 5. generate view
	 */
	public function show($org_id = null, $id = null)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}
		if(is_null($id))
		{
			App::abort(403, 'Id Karyawan tidak ada');
		}        

		//2. get data
		$APIOrg										= new APIOrg;
		$organisation								= $APIOrg->getShow($org_id);

		$APICalendar								= new APICalendar;
		$data                                       = $APICalendar->getShow($org_id, $id);  

		$employees									= $APICalendar->getIndex($org_id, [
														]);

		$APIBranch									= new APIBranch;
		$APIChart									= new APIChart;

		$branches									= $APIBranch->getIndex($org_id, [
														]);
		$positions									= $APIChart->getPositions($org_id, [
														]);
		$departments								= $APIChart->getDepartments($org_id, [
														]);
		$maritalstatuses							= $APICalendar->getMaritalStatuses($org_id, [
														]);
		$grades										= $APICalendar->getGrades($org_id, [
														]);


		//3. set page attributes
		$this->page_attributes->page_title			= $data['data']['name'];     
		$this->page_attributes->page_subtitle       = $data['data']['name'];     
		$this->page_attributes->breadcrumb          = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$organisation['data']['name'] => route('org.show', ['id' => $org_id]),
																'Karyawan' => route('employee.index', ['org_id' => $org_id]),
																$data['data']['name'] => route(Route::CurrentRouteName(), ['org_id' => $org_id, 'id' => $id]),
															]
														);

		//4. set page datas
		$this->page_datas->datas['branches']		= $branches['data']['data'];
		$this->page_datas->datas['positions']		= $positions['data'];
		$this->page_datas->datas['departments']		= $departments['data'];
		$this->page_datas->datas['maritalstatuses']	= $maritalstatuses['data'];
		$this->page_datas->datas['grades']			= $grades['data'];
		$this->page_datas->datas['employees']		= $employees['data']['data'];
		$this->page_datas->datas['employee']		= $data['data'];
		$this->page_datas->datas['id']				= $org_id;
		$this->page_datas->datas['name']			= $organisation['data']['name'];
		$this->page_datas->datas['code']			= $organisation['data']['code'];
		$this->page_datas->cust_paging              = 0;
		
		//5. generate view
		$view_source                                = $this->view_source_root . '.show';
		$route_source                               = route(Route::CurrentRouteName(),['org_id' => $org_id, 'id' => $id]);

		return $this->generateView($view_source, $route_source);
	}  

	/**
	 * { create }
	 *
	 * @param     
	 * 1. id
	 * 2. org_id
	 *
	 * @return
	 * 1. Layout
	 * 2. page_attributes
	 * 3. page_datas
	 * 
	 * steps
	 * 1. validate
	 * 2. get data
	 * 3. set page attributes
	 * 4. set page datas
	 * 5. generate view
	 */
	public function create($org_id = null, $id = null)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		// 2 & 3        
		$APIOrg										= new APIOrg;
		$organisation								= $APIOrg->getShow($org_id);

		$APICalendar								= new APICalendar;

		$employees									= $APICalendar->getIndex($org_id, [
														]);

		$APIBranch									= new APIBranch;
		$APIChart									= new APIChart;

		$branches									= $APIBranch->getIndex($org_id, [
														]);
		$positions									= $APIChart->getPositions($org_id, [
														]);
		$departments								= $APIChart->getDepartments($org_id, [
														]);
		$maritalstatuses							= $APICalendar->getMaritalStatuses($org_id, [
														]);
		$grades										= $APICalendar->getGrades($org_id, [
														]);

		if(!is_null($id))
		{
			//2. get data
			$data                                    = $APICalendar->getShow($org_id, $id);  

			//3. set page attributes
			$current_route                           = route(Route::CurrentRouteName(),['org_id' => $org_id ,'id' => $id]);


			$this->page_attributes->page_subtitle    = 'Edit Karyawan '.$data['data']['name'];     
			$this->page_attributes->breadcrumb       = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$organisation['data']['name'] => route('org.show', ['id' => $org_id]),
																'Karyawan' => route('employee.index', ['org_id' => $org_id]),
																'Edit Karyawan ' . $data['data']['name'] => $current_route,
															]
														);                           
		}
		else
		{
			//2. get data
			$data['data']							 = null; 

			//3. set page attributes
			$current_route                           = route(Route::CurrentRouteName(),['org_id' => $org_id]);

			$this->page_attributes->page_subtitle    = 'Karyawan Baru';     
			$this->page_attributes->breadcrumb       = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$organisation['data']['name'] => route('org.show', ['id' => $org_id]),
																'Karyawan' => route('employee.index', ['org_id' => $org_id]),
																'Karyawan Baru' => $current_route,
															]
														);               
		}      

		$APICalendar									= new APICalendar;
		$employees									= $APICalendar->getIndex($org_id, [
														]);

		//4. set page datas
		$this->page_datas->datas['branches']		= $branches['data']['data'];
		$this->page_datas->datas['positions']		= $positions['data'];
		$this->page_datas->datas['departments']		= $departments['data'];
		$this->page_datas->datas['maritalstatuses']	= $maritalstatuses['data'];
		$this->page_datas->datas['grades']			= $grades['data'];
		$this->page_datas->datas['employees']		= $employees['data']['data'];
		$this->page_datas->datas['employee']		= $data['data'];
		$this->page_datas->datas['id']				= $org_id;
		$this->page_datas->datas['name']			= $organisation['data']['name'];
		$this->page_datas->datas['code']			= $organisation['data']['code'];

		//5. generate view
		$view_source                                = $this->view_source_root . '.create';
		$route_source                               = $current_route;

		return $this->generateView($view_source, $route_source);        
	}


	/**
	 * { edit }
	 *
	 * @param     
	 * 1. id
	 * 2. org_id
	 *
	 * @return
	 * 1. call function create()
	 */
	public function edit($org_id = null, $id = null)
	{
		return $this->create($org_id, $id);
	}

	/**
	 * { store }
	 *
	 * @param     
	 * 1. id
	 * 2. org_id
	 * 3. input name
	 * 4. input address
	 * 5. input email
	 * 6. input phone
	 *
	 * @return
	 * 1. response
	 * 
	 * steps
	 * 1. validate
	 * 2. get input
	 * 3. get data
	 * 4. post to API
	 * 5. return response
	 */
	public function store($org_id = null, $id = null)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		//2. get input
		$input										= Input::all();

		//3. get data
		if(!is_null($id))
		{
			$APICalendar							= new APICalendar;
			$data									= $APICalendar->getShow($org_id,$id)['data'];

			$data									= $input;
			$data['id']								= $id;
		}
		else
		{
			$data									= $input;
			$data['id']								= '';
			$data['works'][0]['id']					= '';
			$data['maritalstatuses'][0]['id']		= '';
			$data['maritalstatuses'][0]['status']	= $input['current_marital_status'];
			$data['maritalstatuses'][0]['ondate']	= Carbon::now()->format('Y-m-d H:i:s');

			if(empty($input['works'][0]['end']))
			{
				$data['works'][0]['end']			= '0000-00-00 00:00:00';
			}
		}

		//3. post to API
		$APICalendar								= new APICalendar;
		$result										= $APICalendar->postData($org_id,$data);

		//4. return response 
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}

		if(!empty($id))
		{
		   $this->page_attributes->msg              = "Data Karyawan Telah Diedit";
		}
		else
		{
			$this->page_attributes->msg             = "Data Karyawan Telah Ditambahkan";
		}

		return $this->generateRedirectRoute('org.show',['id' => $org_id]);        
	}

	/**
	 * { update }
	 *
	 * @param     
	 * 1. id
	 * 2. org_id
	 *
	 * @return
	 * 1. call function store()
	 */
	public function update($org_id = null, $id = null)
	{
		return $this->store($org_id, $id);
	}

	/**
	 * { destroy }
	 *
	 * @param     
	 * 1. id
	 * 2. org_id
	 *
	 * @return
	 * 1. response
	 * 
	 * Step:
	 * 1. post delete
	 * 2. return response
	 * 
	 */
	public function destroy($org_id = null, $id = null)
	{
		//1.post delete 
		$APICalendar                                  = new APICalendar;

		$result                                     = $APICalendar->deleteData($org_id, $id);

		//2. return response
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}

		$this->page_attributes->msg                 = "Data Karyawan telah dihapus";
		
		return $this->generateRedirectRoute('org.show', ['org_id' => $org_id]); 
	}
}