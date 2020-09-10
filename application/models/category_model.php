<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_first_level_category($where = array(), $select = array()){

		$where['first_level'] = true;
		$where['is_active'] = true;
		$where['company_key'] = $this->session->userdata('company_key');

		$result = $this->mongo_db
				->select($select)
				->where($where)
				->get('category');

		return $result;

	}

	public function get_sub_level_category($where = array(), $select = array()){

		$result = $this->mongo_db
				->select($select)
				->where($where)
				->get('category');
		return $result;

	}

	public function get_step($where = array()){

		$where['is_active'] = true;
		$where['company_key'] = $this->session->userdata('company_key');

		$result = $this->mongo_db->aggregate('category_steps', array(
			array('$match'=> $where),
			array('$sort'=> array(
				'sort'=> 1
			)), 
			array('$group'=> array(
				'_id'=> '$step',
				'result'=> array('$push'=> '$$ROOT')
			))
		));

		return $result;
	}

	public function get_step_data($where = array(), $select = array()){

		$where['is_active'] = true;
		$where['company_key'] = $this->session->userdata('company_key');

		$result = $this->mongo_db
				->select($select)
				->where($where)
				->get('step_datas');
		return $result;

	}

}
