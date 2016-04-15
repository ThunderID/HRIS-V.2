<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;
use App\API\Connectors\APIEmployee;
use App\API\Connectors\APIBranch;
use App\API\Connectors\APIChart;

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
 * 8. FindEmployeeByName()                : ajax search Employee by name
 * 
 */

class EmployeeController extends BaseController 
{
	//init 
	protected $view_source_root                     = 'pages.employee';
	
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
															'branchname',
															'department',
															'position',
															'currentgrade',
															'workstatus',
															'currentmaritalstatus',
															'workstart',
															'workend',
														];
		//dummy
		$this->page_attributes->sorts               =   [
															'nama'          => $SortList->getSortingList('nama')
														];       
		//2. get data parameter
		$data_parameter                             = $this->setPageDataParameter();

		//3. get data
		$APIEmployee								= new APIEmployee;
		$search                                     = array_merge(
															['nameornik' => $data_parameter['search']],
															$data_parameter['filter']
														);
		$APIEmployee									= new APIEmployee;

		$APIOrg										= new APIOrg;
		$organisation								= $APIOrg->getShow($org_id);

		$data                                       = $APIEmployee->getIndex($org_id, [
														'search'    => $search,
														'sort'      => $data_parameter['sort'],
														'take'      => $data_parameter['take'],
														'skip'      => ($data_parameter['page'] - 1) * $data_parameter['take'],
														]);

		$APIBranch									= new APIBranch;
		$APIChart									= new APIChart;

		$branches									= $APIBranch->getIndex($org_id, [
														]);
		$positions									= $APIChart->getPositions($org_id, [
														]);
		$departments								= $APIChart->getDepartments($org_id, [
														]);
		$maritalstatuses							= $APIEmployee->getMaritalStatuses($org_id, [
														]);
		$grades										= $APIEmployee->getGrades($org_id, [
														]);
		//4. set page datas
		$this->page_datas->datas['employees']		= $data['data']['data'];
		$this->page_datas->datas['branches']		= $branches['data']['data'];
		$this->page_datas->datas['positions']		= $positions['data'];
		$this->page_datas->datas['departments']		= $departments['data'];
		$this->page_datas->datas['maritalstatuses']	= $maritalstatuses['data'];
		$this->page_datas->datas['grades']			= $grades['data'];
		
		$this->page_datas->datas['id']				= $org_id;
		$this->page_datas->datas['name']			= $organisation['data']['name'];
		$this->page_datas->datas['code']			= $organisation['data']['code'];

		//5. generate view
		$this->page_attributes->breadcrumb          = array_merge(
															$this->page_attributes->breadcrumb,
															[
																$organisation['data']['name'] => route('org.show', ['id' => $org_id]),
																'Karyawan' => route('employee.index', ['org_id' => $org_id]),
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

		$APIEmployee								= new APIEmployee;
		$data                                       = $APIEmployee->getShow($org_id, $id);  

		$employees									= $APIEmployee->getIndex($org_id, [
														]);

		$APIBranch									= new APIBranch;
		$APIChart									= new APIChart;

		$branches									= $APIBranch->getIndex($org_id, [
														]);
		$positions									= $APIChart->getPositions($org_id, [
														]);
		$departments								= $APIChart->getDepartments($org_id, [
														]);
		$maritalstatuses							= $APIEmployee->getMaritalStatuses($org_id, [
														]);
		$grades										= $APIEmployee->getGrades($org_id, [
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

		$APIEmployee								= new APIEmployee;

		$employees									= $APIEmployee->getIndex($org_id, [
														]);

		$APIBranch									= new APIBranch;
		$APIChart									= new APIChart;

		$branches									= $APIBranch->getIndex($org_id, [
														]);
		$positions									= $APIChart->getPositions($org_id, [
														]);
		$departments								= $APIChart->getDepartments($org_id, [
														]);
		$maritalstatuses							= $APIEmployee->getMaritalStatuses($org_id, [
														]);
		$grades										= $APIEmployee->getGrades($org_id, [
														]);

		if(!is_null($id))
		{
			//2. get data
			$data                                    = $APIEmployee->getShow($org_id, $id);  

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

		$APIEmployee									= new APIEmployee;
		$employees									= $APIEmployee->getIndex($org_id, [
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
			$APIEmployee							= new APIEmployee;
			$data									= $APIEmployee->getShow($org_id,$id)['data'];

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
		$APIEmployee								= new APIEmployee;
		$result										= $APIEmployee->postData($org_id,$data);

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
	public function Update($org_id = null, $id = null)
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
	public function Destroy($org_id = null, $id = null)
	{
		//1.post delete 
		$APIEmployee                                  = new APIEmployee;

		$result                                     = $APIEmployee->deleteData($org_id, $id);

		//2. return response
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}

		$this->page_attributes->msg                 = "Data Karyawan telah dihapus";
		
		return $this->generateRedirectRoute('org.show', ['org_id' => $org_id]); 
	}

	/**
	 * { FindEmployeeByName }
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
	public function FindEmployeeByName($org_id = null, $name = null)
	{
		//1. get data
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		$APIEmployee                                  	= new APIEmployee;
		$search                                     	= array_merge(
															['name' => $name]
														);

		$Employee                                       = $APIEmployee->getIndex($org_id,[
														'search'    => $search,
														]);

		//2. validate
		if($Employee['status'] != 'success')
		{
			return abort(404);
		}

		//3. returning data
		$datas                                      = [];
		foreach ($Employee['data']['data'] as $key => $dt) 
		{
			$datas[$key]['id']                      = $dt['id'];
			$datas[$key]['name']                    = ucwords($dt['name']);
		}                                       

		return $datas;
	}

	/**
	 * { generateNIK }
	 *
	 * @param     
	 *1. code
	 *2. id
	 *3. join year
	 *
	 * @return
	 * 1. nik
	 * 
	 * Step:
	 * 1. get data
	 * 2. validate
	 * 3. returning data
	 */
	public function generateNIK($code = null, $id = null)
	{
		//1. get data
		if(is_null($code))
		{
			App::abort(403, 'code Organisasi tidak ada');
		}

		if(Input::has('join_year'))
		{
			$join_year 		= \Carbon\Carbon::parse(Input::get('join_year'))->format('y');
		}
		else
		{
			$join_year 		= \Carbon\Carbon::now()->format('y');
		}

		$APIEmployee		= new APIEmployee;

		$Employee			= $APIEmployee->getNIK($code, $id, $join_year);

		//2. validate
		if($Employee['status'] != 'success')
		{
			return abort(404);
		}

		//3. returning data

		return $Employee['data']['nik'];
	}

	/**
	 * { generateUsername }
	 *
	 * @param     
	 *1. code
	 *2. name
	 *
	 * @return
	 * 1. username
	 * 
	 * Step:
	 * 1. get data
	 * 2. validate
	 * 3. returning data
	 */
	public function generateUsername($code = null, $id = 0)
	{
		//1. get data
		if(is_null($code) || !Input::has('name'))
		{
			App::abort(403, 'code Organisasi tidak ada');
		}

		$name 				= Input::get('name');

		$APIEmployee		= new APIEmployee;

		$Employee			= $APIEmployee->getUsername($code, $id, $name);

		//2. validate
		if($Employee['status'] != 'success')
		{
			return abort(404);
		}

		//3. returning data

		return $Employee['data']['username'];
	}

	/**
	 * { resendActivationMail }
	 *
	 * @param     
	 *1. code
	 *2. name
	 *
	 * @return
	 * 1. username
	 * 
	 * Step:
	 * 1. get data
	 * 2. validate
	 * 3. returning data
	 */
	public function resendActivationMail($org_id = 0, $id = 0)
	{
		//1. get data
		if(is_null($id))
		{
			App::abort(403, 'Person ID Tidak ada');
		}

		$name 				= Input::get('name');

		$APIEmployee		= new APIEmployee;

		$result				= $APIEmployee->resendActivationMail($id);

		//2. validate
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

		//3. returning data

		return $this->generateRedirectRoute('employee.show', ['org_id' => $org_id, 'id' => $id]); 
	}

	/**
	 * { getImport }
	 *
	 * @param     
	 *
	 * @return
	 * 1. response
	 * 
	 * steps
	 * 1. get data
	 * 2. return response
	 */
	public function getImport()
	{
		//2. post data
		$APIEmployee							= new APIEmployee;
		$result									= $APIEmployee->getImportTemplate();

		//4. return response 
		if($result['status'] != 'success')
		{
			$this->errors						= $result['message'];
		}

		$template 								= $result['data']['employee'];

		Excel::create('Template Import Karyawan', function($excel) use ($template) 
		{
			// Set the title
			$excel->setTitle('Template Import');
			// Call them separately
			$excel->setDescription('Template Import Karyawan');
			$excel->sheet('Sheetname', function ($sheet) use ($template) 
			{
				$sheet->loadView('import_template.document')->with('data', $template);
			});
		})->export('xls');	

		return $this->generateRedirectRoute('org.index');
	}

	/**
	 * { postImport }
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
	 * 1. get input
	 * 2. post data
	 * 3. return response
	 */
	public function postImport()
	{
		//1. get input
		$input										= Input::file('employee');

		if(!Input::hasFile('employee'))
		{
			$this->errors                           = 'TIdak ada data import';
		}
		else
		{
			$input 									= Excel::load($input)->toArray();
			$data 									= [];

			foreach ($input as $key => $value) 
			{
				foreach ($value as $key2 => $value2) 
				{
					if (preg_match('/profile_/',$key2))
					{
						$data[$key]['profile'][str_replace('profile_', '', $key2)] 	= $value2;
					}
					elseif (preg_match('/work_/',$key2))
					{
						$data[$key]['work'][str_replace('work_', '', $key2)] 	= $value2;
					}
					elseif (preg_match('/relatives_/',$key2))
					{
						$real_data 	= str_replace('relatives_', '', $key2);
						$index 		= explode('_content_', $real_data);
						$title 		= str_replace($index[0].'_content_', '', $real_data);

						$data[$key]['relatives'][$index[0]][$title] 	= $value2;
					}
					elseif (preg_match('/document_/',$key2))
					{
						$real_data 	= str_replace('document_', '', $key2);
						$index 		= explode('_content_', $real_data);
						$title 		= str_replace($index[0].'_content_', '', $real_data);

						$data[$key]['document'][$index[0]][$title] 	= $value2;
					}
				}
			}

			//2. post data
			$APIEmployee							= new APIEmployee;
			$result									= $APIEmployee->postImportTemplate($data);

			//4. return response 
			if($result['status'] != 'success')
			{
				$this->errors						= $result['message'];
			}
		}

		$this->page_attributes->msg					= "Data Karyawan Telah Ditambahkan";

		return $this->generateRedirectRoute('org.index');
	}

}