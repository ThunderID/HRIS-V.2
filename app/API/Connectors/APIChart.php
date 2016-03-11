<?php 
namespace App\API\Connectors;

use Exception, Session;

/**
 * { APIChart }
 * @author Budi
 * 
 * public functions :
 * 1. getIndex() 						: get index from API 
 * 2. postData() 						: save data to API 
 * 3. deleteData() 						: delete data from API 
 */

class APIChart extends APIData
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
	 * 2. $org_id 		: branch id    
	 * 3. $parameter 	: search, filter, sort, pagination     
	 *
	 * @return
	 * 1. index data
	 */
	public function getIndex($org_id = 0, $branch_id = 0,  $parameter = null)
	{
		$this->apiUrl 					= '/organisation/'.$org_id.'/branches/'.$branch_id.'/charts' ;

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
	 * 2. $org_id 		: branch id      
	 * 3. $data 		: input data     
	 *
	 * @return
	 * 1. response
	 */
	public function postData($org_id = 0, $branch_id = 0, $data)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/branch/'.$branch_id.'/chart/store';
		$this->apiData 					= array_merge($this->apiData, ["chart" => $data]);

		return $this->post();
	}	

	/**
	 * { getShow }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 * 2. $org_id 		: branch id      
	 * 3. $data 		: input data     
	 *
	 * @return
	 * 1. response
	 */
	public function getShow($org_id = 0, $branch_id = 0, $id)
	{
		$this->apiUrl 					= '/organisation/'.$org_id.'/branch/'.$branch_id.'/chart/'.$id;

		return $this->get();
	}			

	
	/**
	 * { deleteData }
	 *
	 * @param
	 * 1. $org_id 		: org id    
	 * 2. $org_id 		: branch id      
	 * 3. $id 			: data Id    
	 *
	 * @return
	 * 1. data show
	 */	
	public function deleteData($org_id = 0, $branch_id = 0, $id)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/branch/'.$branch_id.'/chart/delete/' . $id;
		$this->apiData 					= array_merge($this->apiData);

		return $this->delete();
	}		
}