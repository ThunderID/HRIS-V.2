<?php namespace App\Libraries;

class APIResponse 
{
	public static function httpPost($url, $params = null)
	{
		$channel 			= curl_init();

		curl_setopt($channel,CURLOPT_URL,$url);
		curl_setopt($channel,CURLOPT_POST, 0);                //0 for a get request
		curl_setopt($channel,CURLOPT_POSTFIELDS, $params);
		curl_setopt($channel,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($channel,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($channel,CURLOPT_TIMEOUT, 20);

		$response 			= curl_exec($channel);

		$response 			= json_decode($response, true);

		if($response['status']=='success')
		{
			return $response['data'];
		}
		
		curl_close ($channel);
	}
}