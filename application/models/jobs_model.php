<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_job_list($where = array()){

		if($where['count']){
			$result = $this->mongo_db->aggregate('jobs', array(
				array('$match'=> $where['where']),
				array('$group'=> array(
					'_id'=> null,
					'count'=> array('$sum'=> 1)
				))
			));
		}else{
			$result = $this->mongo_db->aggregate('jobs', array(
				array('$match'=> $where['where']),
				array('$lookup'=> array(
					'from'=> 'customers',
					'localField'=> 'customer_id',
					'foreignField'=> '_id',
					'as'=> 'docs_customer'
				)),
				array('$lookup'=> array(
					'from'=> 'category',
					'localField'=> 'category_id',
					'foreignField'=> '_id',
					'as'=> 'docs_sub_category'
				)),
				array('$unwind'=> '$docs_sub_category'),
				array('$lookup'=> array(
					'from'=> 'category',
					'localField'=> 'docs_sub_category.parent_id',
					'foreignField'=> '_id',
					'as'=> 'docs_category'
				)),
				array('$lookup'=> array(
					'from'=> 'customer_address',
					'localField'=> 'customer_address_id',
					'foreignField'=> '_id',
					'as'=> 'docs_customer_address'
				)),
				array('$lookup'=> array(
					'from'=> 'employees',
					'localField'=> 'employee_id',
					'foreignField'=> '_id',
					'as'=> 'docs_employees'
				)),
				array('$unwind'=> '$docs_customer'),
				array('$unwind'=> '$docs_category'),
				array('$unwind'=> '$docs_customer_address'),
				array('$unwind'=> array(
					'path'=> '$docs_employees',
					'preserveNullAndEmptyArrays'=> true
				)),
				array('$project'=> array(
					'code'=> '$code',
					'sla_in'=> '$sla_in',
					'sla_out'=> '$sla_out',
					'job_status'=> '$job_status',
					'category'=> '$docs_category.title.th',
					'sub_category'=> '$docs_sub_category.title.th',
					'customer_address'=> '$docs_customer_address.address',
					'employees_firstname'=> '$docs_employees.first_name',
					'employees_lastname'=> '$docs_employees.last_name',
				)),
				array('$group'=> array(
					'_id'=> null,
					'result'=> array('$push'=> '$$ROOT')
				)),
				array('$project'=> array(
					'result'=> array('$slice'=> array('$result', $where['offset'], $where['limit']))
				))
			));
		}

		return $result[0];

	}

	public function get_job_detail($where = array()){

		$result = $this->mongo_db->where($where)->get('jobs');
		return $result[0];

	}

	public function add_job($data = array()){

		$res = $this->mongo_db->insert('jobs', $data);
		return $res;
	}

}
