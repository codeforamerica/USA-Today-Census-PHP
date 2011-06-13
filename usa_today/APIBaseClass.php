<?php
class APIBaseClass {
	protected $_root, $_http, $api_key, $api_param_name, $format;
	
	// removing construct method to allow the APIBaseClass to make a 'new_request'
	// api libraries extend this base class, and then call self::new_request('http://apikeyurl.com');
	
	public function new_request($api_key, $http = false) {
		$this->api_key = $api_key;
		if($http) {
			$this->_http = $http;
		} else {
			$this->_http = curl_init();
			curl_setopt($this->_http, CURLOPT_RETURNTRANSFER, 1);
		}
	}
	
	protected function _request($path, $method, $params=false, $headers=false) {
		# URL encode any available data
        if ($params) $query = http_build_query($params);
		
		// these statements could be combined.. but not ready to take the leap
		if(in_array(strtolower($method), array('get','delete'))) 
			# Add urlencoded data to the path as a query if method is GET or DELETE
			if($params) $path = $path.'?'.$query;
		else {
			# If method is POST or PUT, put the query data into the body
			$body = ($params) ? $query : '';
			curl_setopt($this->_http, CURLOPT_POSTFIELDS, $body);
		}
		#add API key
		if($this->api_key){
			if(!$params) $path .= "?";
			$path .= $this->api_param_name . "=" . $this->api_key;
		}
		
		$url = $this->_root . $path;		
		
		curl_setopt($this->_http, CURLOPT_URL, $url);
		if($headers) curl_setopt($this->_http, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($this->_http, CURLOPT_CUSTOMREQUEST, $method);

		$result = curl_exec($this->_http);
	
		if($result === false) {	
			echo 'Curl error: ' . curl_error($this->_http) . "\n";
		} 
		
		if($this->format == "json") $result = json_decode($result);
		elseif($this->format == "xml") $result = new SimpleXMLElement($result);
		
		return $this->response($result);
		
	}
	
	public function response($result){
		return $result;
	}
	
	public function get($path, $params, $headers = null) {
		return $this->_request($path, 'GET', $params, $headers);
	}
	public function post($path, $params, $headers = null) {
		return $this->_request($path, 'POST', $params, $headers);
	}
	public function put($path, $params, $headers = null) {
		return $this->_request($path, 'PUT', $params, $headers);
	}
	public function delete($path, $params, $headers = null) {
		return $this->_request($path, 'DELETE', $params, $headers);
	}
	public function __destruct(){
		curl_close($this->_http);
	}
}