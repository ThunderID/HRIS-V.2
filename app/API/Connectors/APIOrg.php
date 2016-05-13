<?php 
namespace App\API\Connectors;

use Exception, Session, APIData;

/**
 * { APIOrg }
 * @author Budi
 * 
 * public functions :
 * 1. getIndex() 						: get index from API 
 * 2. postData() 						: save data to API 
 * 3. getShow() 						: get show from API 
 * 4. deleteData() 						: delete data from API 
 */

class APIOrg extends APIData
{
	function __construct() 
	{
		parent::__construct();
	}

	/**
	 * { getIndex }
	 *
	 * @param
	 * 1. $parameter 	: search, filter, sort, pagination     
	 *
	 * @return
	 * 1. index data
	 */
	public function getIndex($parameter = null)
	{
		$this->apiUrl 					= '/organisations';

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
	 * 1. $data 		: input data     
	 *
	 * @return
	 * 1. response
	 */
	public function postData($data)
	{
		$this->apiUrl 					= '/organisation/store';
		$this->apiData 					= array_merge($this->apiData, ["organisation" => $data]);

		return $this->post();
	}	

	/**
	 * { getShow }
	 *
	 * @param
	 * 1. $id 			: data Id    
	 *
	 * @return
	 * 1. data show
	 */
	public function getShow($id)
	{
		$this->apiUrl 					= '/organisation/' . $id;

		return $this->get();
	}	
	
	/**
	 * { deleteData }
	 *
	 * @param
	 * 1. $id 			: data Id    
	 *
	 * @return
	 * 1. data show
	 */	
	public function deleteData($id)
	{
		$this->apiUrl 					= '/organisation/delete/' . $id;
		$this->apiData 					= array_merge($this->apiData,  ["id" => $id]);

		return $this->delete();
	}		
}