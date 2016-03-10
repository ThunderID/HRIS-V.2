<?php 
namespace App\API\Connectors;

use Exception, Session;

class APIBranch extends APIData
{
	function __construct() 
	{
		parent::__construct();
	}

	public function getIndex($org_id = 0, $parameter = null)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/branches';

		if(!is_null($parameter))
		{
			$this->apiData 				= array_merge($this->apiData, $parameter);
		}

		return $this->get();
	}	

	public function postData($org_id = 0, $data)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/branch/store';
		$this->apiData 					= array_merge($this->apiData, ["branch" => $data]);

		return $this->post();
	}	

	public function getShow($org_id = 0, $id)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/branch/' . $id;

		return $this->get();
	}	
	
	public function deleteData($org_id = 0, $id)
	{
		$this->apiUrl 					= '/organisation'.'/'.$org_id.'/branch/delete/' . $id;
		$this->apiData 					= array_merge($this->apiData,  ["id" => $id]);

		return $this->delete();
	}		
}