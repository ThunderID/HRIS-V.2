<?php 
namespace App\API\Connectors;

use Exception, Session;

class APIOrg extends APIData
{
	function __construct() 
	{
		parent::__construct();
	}

	public function getIndex($parameter = null)
	{
		$this->apiUrl 					= '/organisations';

		if(!is_null($parameter))
		{
			$this->apiData 				= array_merge($this->apiData, $parameter);
		}

		return $this->get();
	}	

	public function postData($data)
	{
		$this->apiUrl 					= '/organisation/store';
		$this->apiData 					= array_merge($this->apiData, ["organisation" => $data]);

		return $this->post();
	}	

	public function getShow($id)
	{
		$this->apiUrl 					= '/organisation/' . $id;

		return $this->get();
	}	
	
	public function deleteData($id)
	{
		$this->apiUrl 					= '/organisation/delete/' . $id;
		$this->apiData 					= array_merge($this->apiData,  ["id" => $id]);

		return $this->delete();
	}		
}