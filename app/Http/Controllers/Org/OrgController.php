<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Helper\SortList;
use Input, Route;

/**
 * { OrgController Class }
 * @author Budi
 * 
 * public functions :
 * 1. index()                           : public function display index org
 * 2. show()                            : public function display show org
 * 3. create()                          : public function display create org
 * 4. edit()                            : public function display edit org
 * 5. store()                           : public function store data org
 * 6. update()                          : public function update data org
 * 7. destroy()                         : public function destroy data org
 * 8. FindOrgByName()                   : ajax search org by name
 * 
 */

class OrgController extends BaseController 
{
	//init 
	protected $view_source_root                     = 'pages.org';
	
	public function __construct()
	{
		parent::__construct();

		$this->page_attributes->page_title             = 'Perusahaan';
		$this->page_attributes->breadcrumb             =    [
															];        
	}

	/**
	 * { index }
	 *
	 * @param     
	 *
	 * @return
	 * 1. Layout
	 * 2. page_attributes
	 * 3. page_datas
	 * 
	 * steps
	 * 1. set page attributes
	 * 2. get data parameter
	 * 3. get data
	 * 4. set page datas
	 * 5. generate view
	 */
	public function index()
	{
		//1. set page attributes
		$SortList                                   = new SortList;

		$this->page_attributes->page_subtitle       = 'index';
		//dummy
		$this->page_attributes->filters             =   [
															'b'             => ['ab', 'ba'],
															'c'             => ['ac', 'ca'],
														];
		//dummy
		$this->page_attributes->sorts               =   [
															'nama'          => $SortList->getSortingList('nama')
														];       

		//2. get data parameter
		$data_parameter                             = $this->setPageDataParameter();

		//3. get data
		$APIOrg                                     = new APIOrg;
		if(($data_parameter['search']!=null))
		{
			$search									= array_merge(
															['name' => $data_parameter['search']],
															$data_parameter['filter']
														);
		}
		else
		{
			$search 								= [];
		}

		if(($data_parameter['take']!=null))
		{
			$data									= $APIOrg->getIndex([
														'search'    => $search,
														'sort'      => $data_parameter['sort'],
														'take'      => $data_parameter['take'],
														'skip'      => ($data_parameter['page'] - 1) * $data_parameter['take'],
														]);
		}
		else
		{
			$data									 = $APIOrg->getIndex([
														'search'    => $search,
														'sort'      => $data_parameter['sort'],
														]);
		}


		//4. set page datas
		$this->page_datas->datas                    = $data['data'];

		//5. generate view
		$view_source                                = $this->view_source_root . '.index';
		$route_source                               = route(Route::CurrentRouteName());

		return $this->generateView($view_source, $route_source);
	}

	/**
	 * { show }
	 *
	 * @param     
	 *1. id
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
	public function show($id = null)
	{
		//1. validate
		if(is_null($id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		//2. get data
		$APIOrg                                     = new APIOrg;
		$data                                       = $APIOrg->getShow($id);        

		//3. set page attributes
		$this->page_attributes->page_title			= 'Dashboard';     
		$this->page_attributes->page_subtitle       = 'Dashboard';     
		$this->page_attributes->breadcrumb          = array_merge(
															$this->page_attributes->breadcrumb,
															[$data['data']['name'] => route(Route::CurrentRouteName(),['id' => $id])]
														);

		//4. set page datas
		$this->page_datas->datas                    = $data['data'];
		$this->page_datas->cust_paging              = 0;
		// $this->page_datas->cust_paging              = count($data['data']['branches']);
		
		//5. generate view
		$view_source                                = $this->view_source_root . '.show';
		$route_source                               = route(Route::CurrentRouteName(),['id' => $id]);

		return $this->generateView($view_source, $route_source);
	}  

	/**
	 * { create }
	 *
	 * @param     
	 *1. id
	 *
	 * @return
	 * 1. Layout
	 * 2. page_attributes
	 * 3. page_datas
	 * 
	 * steps
	 * 1. get data
	 * 2. set page attributes
	 * 3. set page datas
	 * 4. generate view
	 */
	public function create($id = null)
	{
		// 1 & 2
		if(!is_null($id))
		{
			//1. get data
			$APIOrg                                  = new APIOrg;
			$data                                    = $APIOrg->getShow($id);  

			//2. set page attributes
			$current_route                           = route(Route::CurrentRouteName(),['id' => $id]);

			$this->page_attributes->page_subtitle    = 'Edit '. $data['data']['name'];     
			$this->page_attributes->breadcrumb       = array_merge(
															$this->page_attributes->breadcrumb,
															['Edit ' . $data['data']['name'] => $current_route]
														);                           
		}
		else
		{
			//1. get data
			$data                                    = null;

			//2. set page attributes
			$current_route                           = route(Route::CurrentRouteName());

			$this->page_attributes->page_subtitle    = 'Perusahaan Baru';     
			$this->page_attributes->breadcrumb       = array_merge(
															$this->page_attributes->breadcrumb,
															['Perusahaan Baru' => $current_route]
														);               
		}      

		//3. set page datas
		$this->page_datas->datas                    = $data['data'];

		//4. generate view
		$view_source                                = $this->view_source_root . '.create';
		$route_source                               = route(Route::CurrentRouteName(),['id' => $id]);

		return $this->generateView($view_source, $route_source);        
	}


	/**
	 * { edit }
	 *
	 * @param     
	 *1. id
	 *
	 * @return
	 * 1. call function create()
	 */
	public function edit($id)
	{
		return $this->create($id);
	}

	/**
	 * { store }
	 *
	 * @param     
	 *1. id
	 *2. input name
	 *3. input code
	 *
	 * @return
	 * 1. response
	 * 
	 * steps
	 * 1. get input
	 * 2. get data
	 * 3. post to API
	 * 4. return response
	 */
	public function store($id = null)
	{
		//1. get input
		$input['name']                              = Input::get('name');                          
		$input['code']                              = Input::get('code');
		$input['logo']                              = Input::get('logo');

		//2. get data
		if(!is_null($id))
		{
			$APIOrg                                  = new APIOrg;
			$data                                    = $APIOrg->getShow($id)['data'];

			$data['name']                            = $input['name'];
			$data['code']                            = $input['code'];
			$data['logo']                            = $input['logo'];
		}
		else
		{
			$data['id']                              = ""; 
			$data['name']                            = $input['name'];
			$data['code']                            = $input['code'];
			$data['logo']                            = $input['logo'];
			$data['branches']                        = [];
			$data['policies']                        = [];
		}

		//3. post to API
		$APIOrg                                     = new APIOrg;
		$result                                     = $APIOrg->postData($data);

		//4. return response 
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}

		if(!empty($id))
		{
		   $this->page_attributes->msg              = "Data Organisasi Telah Diubah";
		}
		else
		{
			$this->page_attributes->msg             = "Data Organisasi Telah Ditambahkan";           
		}

		return $this->generateRedirectRoute('org.index');        
	}

	/**
	 * { update }
	 *
	 * @param     
	 *1. id
	 *
	 * @return
	 * 1. call function store()
	 */
	public function Update($org_id = null, $id = null)
	{
		return $this->store($org_id, $id);
	}

	/**
	 * { destroy }
	 *
	 * @param     
	 *1. id
	 *
	 * @return
	 * 1. response
	 * 
	 * Step:
	 * 1. post delete
	 * 2. return response
	 * 
	 */
	public function Destroy($id)
	{
		//1.post delete 
		$APIOrg                                     = new APIOrg;

		$result                                     = $APIOrg->deleteData($id);

		//2. return response
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}

		$this->page_attributes->msg                 = "Data Perusahaan ".$result['data']['name']." telah dihapus";
		
		return $this->generateRedirectRoute('org.index'); 
	}


	/**
	 * { FindOrgByName }
	 *
	 * @param     
	 *1. name
	 *
	 * @return
	 * 1. id
	 * 2. name
	 * 
	 * Step:
	 * 1. get data
	 * 2. validate
	 * 3. returning data
	 */
	public function FindOrgByName($name = null)
	{
		//1. get data
		$APIOrg                                     = new APIOrg;
		$search                                     = array_merge(
															['name' => $name]
														);

		$org                                       = $APIOrg->getIndex([
														'search'    => $search,
														]);

		//2. validate
		if($org['status'] != 'success')
		{
			return abort(404);
		}

		//3. returning data
		$datas                                      = [];
		foreach ($org['data']['data'] as $key => $dt) 
		{
			$datas[$key]['id']                      = $dt['id'];
			$datas[$key]['name']                    = ucwords($dt['name']);
		}                                       

		return $datas;          
	}
}