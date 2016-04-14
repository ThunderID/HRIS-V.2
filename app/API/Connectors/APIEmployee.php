<?php 
namespace App\API\Connectors;

use Exception, Session;

/**
 * { APIEmployee }
 * @author Chelsy
 * 
 * public functions :
 * 1. getIndex() 						: get index from API 
 * 2. postData() 						: save data to API 
 * 3. getShow() 						: get show from API 
 * 4. deleteData() 						: delete data from API 
 */

class APIEmployee extends APIData
{
	function __construct() 
	{
		parent::__construct();
	}

	/**
	 * { getIndex }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 * 2. $parameter 	: search, filter, sort, pagination     
	 *
	 * @return
	 * 1. index data
	 */
	public function getIndex($org_id = 0, $parameter = null)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/employees';

		if(!is_null($parameter))
		{
			$this->apiData 				= array_merge($this->apiData, $parameter);
		}

		return $this->get();
	}	

	/**
	 * { postData }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 * 2. $data 		: input data     
	 *
	 * @return
	 * 1. response
	 */
	public function postData($org_id = 0, $data)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/employee/store';
		$this->apiData 					= array_merge($this->apiData, ["employee" => $data]);

		return $this->post();
	}	

	/**
	 * { getShow }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 * 2. $id 			: data Id    
	 *
	 * @return
	 * 1. data show
	 */
	public function getShow($org_id = 0, $id)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/employee/' . $id;

		return $this->get();
	}	
	
	/**
	 * { deleteData }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 * 2. $id 			: data Id    
	 *
	 * @return
	 * 1. data show
	 */	
	public function deleteData($org_id = 0, $id)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/employee/delete/' . $id;
		$this->apiData 					= array_merge($this->apiData,  ["id" => $id]);

		return $this->delete();
	}

	/**
	 * { getGrade }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 *
	 * @return
	 * 1. distinct data
	 */
	public function getGrades($org_id = 0)
	{
		$this->apiUrl 					= '/organisation/'.$org_id.'/grades';

		return $this->get();
	}	

	/**
	 * { getMaritalStatus }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 *
	 * @return
	 * 1. distinct data
	 */
	public function getMaritalStatuses($org_id = 0)
	{
		$this->apiUrl 					= '/organisation/'.$org_id.'/marital/statuses';

		return $this->get();
	}	


	/**
	 * { getNik }
	 *
	 * @param
	 * 1. $code 		: org code    
	 * 2. $id 			: employee id    
	 * 3. $join_year	: 2 digits of joined year (start work)    
	 *
	 * @return
	 * 1. nik
	 */
	public function getNik($code = 0, $id = 0, $join_year = 00)
	{
		$this->apiUrl 					= '/organisation/'.$code.'/nik/'.$id.'/'.$join_year;

		return $this->get();
	}	

	/**
	 * { getUsername }
	 *
	 * @param
	 * 1. $code 		: org code    
	 * 2. $name 		: employee full name    
	 *
	 * @return
	 * 1. nik
	 */
	public function getUsername($code = 0, $id = 0, $name = 0)
	{
		$this->apiUrl 					= '/organisation/'.$code.'/username/'.$id.'?name='.$name;

		return $this->get();
	}	

	/**
	 * { getDocumentTemplates }
	 *
	 * @param
	 * 1. $code 		: org code    
	 * 2. $name 		: employee full name    
	 *
	 * @return
	 * 1. nik
	 */
	public function getDocumentTemplates()
	{
		$this->apiUrl 					= '/document/templates';

		return $this->get();
	}	
}