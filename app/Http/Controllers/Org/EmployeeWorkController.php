<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;
use App\API\Connectors\APIEmployee;

use App\Http\Controllers\BaseController;
use Input, Route;
use Carbon\Carbon;

/**
 * { EmployeeWorkController Class }
 * @author Chelsy
 * 
 * public functions :
 * 1. delete()                         : public function destroy data org
 * 
 */

class EmployeeWorkController extends BaseController 
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
	 * { store }
	 *
	 * @param     
	 * 1. id
	 * 2. org_id
	 * 3. input name
	 *
	 * @return
	 * 1. response
	 * 
	 * steps
	 * 1. validate
	 * 2. get data
	 * 3. post to API
	 * 4. return response
	 */
	public function store($org_id = null, $employee = null)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		$input 									= Input::all();

		//2. get data
		$APIEmployee							= new APIEmployee;
		$data									= $APIEmployee->getShow($org_id,$employee)['data'];

		if(empty($input['id']))
		{
			$data['works'][] 			= $input;
		}
		else
		{
			foreach ($data['works'] as $key => $value) 
			{
				if($value['id']==$input['id'])
				{
					$data['works'][$key] 			= $input;
				}
			}
		}

		//3. post to API
		$APIEmployee								= new APIEmployee;
		$result										= $APIEmployee->postData($org_id, $data);

		//4. return response 
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}
		$this->page_attributes->msg             = "Data Pekerjaan Telah Dihapus";           

		return $this->generateRedirectRoute('org.show',['id' => $org_id]);        
	}

	/**
	 * { delete }
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
	 * 2. get data
	 * 3. post to API
	 * 4. return response
	 */
	public function delete($org_id = null, $employee = null, $id = null)
	{
		//1. validate
		if(is_null($org_id))
		{
			App::abort(403, 'Id Organisasi tidak ada');
		}

		//2. get data
		$APIEmployee							= new APIEmployee;
		$data									= $APIEmployee->getShow($org_id,$employee)['data'];

		foreach ($data['works'] as $key => $value) 
		{
			if($value['id']==$id)
			{
				unset($data['works'][$key]);
			}
		}
		
		if(empty($data['works']))
		{
			$data['works'] 		= null;
		}
		
		//3. post to API
		$APIEmployee								= new APIEmployee;
		$result										= $APIEmployee->postData($org_id, $data);

		//4. return response 
		if($result['status'] != 'success')
		{
			$this->errors                           = $result['message'];
		}
		$this->page_attributes->msg             = "Data Pekerjaan Telah Dihapus";           

		return $this->generateRedirectRoute('org.show',['id' => $org_id]);        
	}

}