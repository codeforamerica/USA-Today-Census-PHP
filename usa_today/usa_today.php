<?php
require('APIBaseClass.php');

class USA_Today_Census extends APIBaseClass {
	protected $_root = "http://api.usatoday.com/open/census";	
	protected $api_param_name = "api_key";
	protected $format = "json";
	
	public function __construct($api_key){
		$this->new_request($api_key);
	}
	
	public function ethnicity($params = false) {
		return $this->_request('ethnicity', 'GET', $params);
	}

	public function housing($params = false) {
		return $this->_request('housing', 'GET', $params);
	}

	public function population($params = false) {
		return $this->_request('population', 'GET', $params);
	}

	public function race($params = false) {
		return $this->_request('race', 'GET', $params);
	}

	public function locations($params = false) {
		return $this->_request('locations', 'GET', $params);
	}
	
	public function response($result){
		return $result->response;
	}
	


}