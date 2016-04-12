<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;
use App\API\Connectors\APIBranch;
use App\API\Connectors\APIChart;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Helper\SortList;
use Input, Route, Response;

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
 * 
 */

class ChartController extends BaseController 
{
	//init 
	protected $view_source_root                     = 'pages.chart';
	
	public function __construct()
	{
		parent::__construct();

		$this->page_attributes->page_title             = 'Struktur';
		$this->page_attributes->breadcrumb             =    [
																'Perusahaan'    => route('org.index'),
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
	public function index()
	{

	}

	/**
	 * { show }
	 *
	 * @param     
	 *
	 * @return
	 */
	public function show($org_id = null, $branch_id = null, $id = null)
	{
		return $this->update($org_id, $branch_id, $id);
	}

	/**
	 * { create }
	 *
	 * @param     
	 * 1. org_id
	 * 2. branch_id
	 * 3. id
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
	public function create($org_id = null, $branch_id = null, $id = null)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		if(is_null($branch_id))
		{
			App::abort(403, 'Id branch tidak ada');
		}        

		// 2 & 3        
		$APIOrg                                      = new APIOrg;
		$org                                         = $APIOrg->getShow($org_id);  

		if(!is_null($id))
		{
			//2. get data
			$APIChart                                = new APIChart;
			$data                                    = $APIChart->getShow($org_id, $branch_id, $id);  
			$data['data']['organisation_id']         = $org_id;


			//3. set page attributes
			$current_route                           = route(Route::CurrentRouteName(),['org_id' => $org_id,'branch_id' => $branch_id ,'id' => $id]);


			$this->page_attributes->page_subtitle    = 'edit';     
			$this->page_attributes->breadcrumb       = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$org['data']['name'] => route('org.show', ['id' => $org_id]),
																'Edit Struktur ' . $data['data']['name'] => $current_route,
															]
														);                           
		}
		else
		{
			//2. get data
			$data['data']['id']                      = ""; 
			$data['data']['organisation_id']         = $org_id;
			$data['data']['branch_id']               = $branch_id;
			$data['data']['name']                    = null;
			$data['data']['department']              = null;
			$data['data']['path']                    = null;

			//3. set page attributes
			$current_route                           = route(Route::CurrentRouteName(),['org_id' => $org_id, 'branch_id' => $branch_id]);

			$this->page_attributes->page_subtitle    = 'Struktur baru';     
			$this->page_attributes->breadcrumb       = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$org['data']['name'] => route('org.show', ['id' => $org_id]),
																'Cabang Baru' => $current_route,
															]
														);               
		}      

		//4. set page datas
		$this->page_datas->datas                    = $data['data'];

		//5. generate view
		$view_source                                = $this->view_source_root . '.create';
		$route_source                               = $current_route;

		return $this->generateView($view_source, $route_source);        
	}


	/**
	 * { edit }
	 *
	 * @param     
	 * 1. org_id
	 * 2. branch_id
	 * 3. id
	 *
	 * @return
	 * 1. call function create()
	 */
	public function edit($org_id = null, $branch_id = null, $id = null)
	{
		return $this->create($org_id, $branch_id, $id);
	}

	/**
	 * { store }
	 *
	 * @param     
	 * 1. org_id
	 * 2. branch_id
	 * 3. id
	 * 4. input name
	 * 5. input path
	 * 6. input department
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
	public function store($org_id = null, $branch_id = null, $id = null)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}
		if(is_null($branch_id))
		{
			App::abort(403, 'Id branch tidak ada');
		}        

		//2. get input
		$input['name']                              = Input::get('name');                          
		$input['chart_id']							= Input::get('chart_id');
		$input['department']                        = Input::get('department');

		//3. get data
		if(!is_null($id) && $id!=0)
		{
			$APIChart                                = new APIChart;
			$data                                    = $APIChart->getShow($org_id,$branch_id,$id)['data'];

			$data['name']                            = $input['name'];
			$data['chart_id']						 = $input['chart_id'];
			$data['department']                      = $input['department'];
		}
		else
		{
			$data['id']                              = ""; 
			$data['organisation_id']                 = $org_id;
			$data['branch_id']                       = $branch_id;
			$data['name']                            = $input['name'];
			$data['chart_id']						 = $input['chart_id'];
			$data['department']                      = $input['department'];
		}

		//3. post to API
		$APIChart                                   = new APIChart;

		$result                                     = $APIChart->postData($org_id, $branch_id, $data);

		//4. return response 
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}

		if(!empty($id))
		{
		   $this->page_attributes->msg              = "Data Struktur Telah Diedit";
		}
		else
		{
			$this->page_attributes->msg             = "Data Struktur Telah Ditambahkan";           
		}

		return $this->generateRedirectRoute('branch.show',['id' => $org_id, 'branch_id' => $branch_id]);        
	}

	/**
	 * { update }
	 *
	 * @param     
	 * 1. org_id
	 * 2. branch_id
	 * 3. id
	 *
	 * @return
	 * 1. call function store()
	 */
	public function Update($org_id = null, $branch_id = null, $id = null)
	{
		return $this->store($org_id, $branch_id, $id);
	}

	/**
	 * { destroy }
	 *
	 * @param     
	 * 1. org_id
	 * 2. branch_id
	 * 3. id
	 *
	 * @return
	 * 1. response
	 * 
	 * Step:
	 * 1. post delete
	 * 2. return response
	 * 
	 */
	public function Destroy($org_id = null, $branch_id = null, $id = null)
	{
		//1.post delete 
		$APIChart                                   = new APIChart;

		$result                                     = $APIChart->deleteData($org_id, $branch_id, $id);

		//2. return response
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}

		$this->page_attributes->msg                 = "Data struktur telah dihapus";
		
		return $this->generateRedirectRoute('branch.show',['id' => $org_id, 'branch_id' => $branch_id]);        
	}  


	/**
	 * { FindChartByName }
	 *
	 * @param     
	 *1. name
	 *2. org id
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
	public function FindChartByName($org_id = null, $branch_id = null, $name = null)
	{
		//1. get data
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}
		if(is_null($branch_id))
		{
			App::abort(403, 'Id branch tidak ada');
		}


		$APIChart                                  = new APIChart;
		$search                                    = array_merge(
															['name' => $name]
														);

		$chart                                     = $APIChart->getIndex($org_id,$branch_id,[
														'search'    => $search,
														]);

		//2. validate
		if($chart['status'] != 'success')
		{
			return abort(404);
		}

		//3. returning data
		$datas                                      = [];
		foreach ($chart['data']['data'] as $key => $dt) 
		{
			$datas[$key]['id']                      = $dt['id'];
			$datas[$key]['name']                    = ucwords($dt['name']);
		}                                       

		dd($chart);
		return $datas;
	}



	/**
	 * { FindChartByOrganisation }
	 *
	 * @param     
	 *1. name
	 *2. org id
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
	public function FindChartByOrganisation($org_id = null)
	{
		//1. get data
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}
	

		$APIChart                                  = new APIChart;
		$search                                    = array_merge(
															['name' => Input::get('term'), 'branch' => true]
														);

		$chart                                     = $APIChart->getIndex($org_id, 0, [
														'search'    => $search,
														]);

		//2. validate
		if($chart['status'] != 'success')
		{
			return \App::abort(404);
		}

		//3. returning data
		$datas                                      = [];
		foreach ($chart['data']['data'] as $key => $dt) 
		{
			$datas[$key]['id']                      = $dt['id'];
			$datas[$key]['text']                    = ucwords($dt['name'].' cabang '.$dt['branch']['name']);
		}                                       

		return Response::json($datas);
	}
}