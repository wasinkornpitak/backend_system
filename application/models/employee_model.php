<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_employee($where = array(), $select = array()){

		$filter['is_active'] = true;
		$filter['company_key'] = array('$in'=> array($this->session->userdata('company_key')));

		$result = $this->mongo_db
				->select($select)
				->where($where)
				->get('employees');

		return $result;

	}

}
