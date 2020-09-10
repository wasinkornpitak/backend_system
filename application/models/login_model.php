<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_login_data($where = array()){

		$data = $this->mongo_db->where(array('user_name'=> $where['user'], 'password'=> $where['password'], 'is_active'=> true))->get('admin');
		return $data[0];

	}


}
