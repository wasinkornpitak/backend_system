<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_customers($where = array(), $select = array()){

		$where['is_active'] = true;
		$where['company_key'] = array('$in'=> array($this->session->userdata('company_key')));

		$result = $this->mongo_db
				->select($select)
				->where($where)
				->get('customers');

		return $result;

	}

	public function get_customers_address($where = array(), $select = array()){

		$where['is_active'] = true;
		$where['company_key'] = array('$in'=> array($this->session->userdata('company_key')));

		$result = $this->mongo_db
				->select($select)
				->where($where)
				->get('customer_address');

		return $result;

	}

}
