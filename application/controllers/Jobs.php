<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->view('check_login');
	}

	public function list(){

		$this->load->model('category_model');
		$select_cat = array('title');
		$where_cat = array();
		$data['category'] = $this->category_model->get_first_level_category($where_cat, $select_cat);
		$this->load->model('status_model');
		$data['status'] = $this->status_model->get_job_status();

		$data['js'] = array('js/source/jobs.js', 'js/source/category.js');
		$this->load->template('jobs/list', $data);

	}

	public function detail($job_id){

		$this->load->model('jobs_model');
		$this->load->model('customers_model');
		$this->load->model('employee_model');
		$this->load->model('category_model');
		$where = array(
			'_id'=> new MongoDB\BSON\ObjectId($job_id),
			'is_active'=> true,
			'company_key'=> array('$in'=> array($this->session->userdata('company_key')))
		);
		$res_job = $this->jobs_model->get_job_detail($where);

		$where_customers = array(
			'_id'=> $res_job['customer_id']
		);
		
		$res_employee = '';
		if(!empty($res_job['employee_id'])){
			$where_employee = array(
				'_id'=> $res_job['employee_id']
			);
			$res_employee = $this->employee_model->get_employee($where_employee);
		}
		
		$select_customers_address = array('address', 'lat', 'long');
		$where_customers_address = array(
			'_id'=> $res_job['customer_address_id']
		);

		$where_sub_cat = array(
			'_id'=> $res_job['category_id']
		);

		$res_customers = $this->customers_model->get_customers($where_customers);
		$res_customers_address = $this->customers_model->get_customers_address($where_customers_address, $select_customers_address);
		$res_sub_cat = $this->category_model->get_sub_level_category($where_sub_cat);

		$where_first_cat = array(
			'_id'=> $res_sub_cat[0]['parent_id']
		);

		$res_main_cat = $this->category_model->get_first_level_category($where_first_cat);

		$data = array(
			'job_data'=> array(
				'code'=> $res_job['code'],
				'job_status'=> check_job_status_badges($res_job['job_status']),
				'created_date'=> $res_job['created_date']->toDateTime()->format('Y-m-d H:i'),
				'created_date'=> thai_date(date('Y-m-d H:i', strtotime($res_job['created_date']->toDateTime()->format('Y-m-d H:i')))),
				'appointment_date'=> thai_date(date('Y-m-d H:i', strtotime($res_job['appointment_date'].' '.$res_job['appointment_time']))),
				'sla_in'=> thai_date(date('Y-m-d H:i', $res_job['sla_in'])),
				'sla_out'=> thai_date(date('Y-m-d H:i', $res_job['sla_out'])),
				'main_category_title'=> $res_main_cat[0]['title']->th,
				'sub_category_title'=> $res_sub_cat[0]['title']->th
			),
			'customers_data'=> array(
				'name'=> $res_customers[0]['full_name'], 
				'email'=> $res_customers[0]['email'], 
				'contect_number'=> $res_customers[0]['contact_number']
			)
		);

		if(!empty($res_employee)){
			$data['employee_data'] = array(
				'name'=> $res_employee[0]['full_name'],
				'contact_number'=> $res_employee[0]['contact_number']
			);
		}else{
			$data['employee_data'] = '';
		}

		// echo '<pre>';
		// print_r($data);
		// exit;

		// $data['js'] = array('js/source/jobs.js', 'js/source/category.js');
		$this->load->template('jobs/detail', $data);
	}

	public function add(){

		$data['js'] = array('js/source/customer.js', 'js/source/category.js', 'js/source/jobs.js', 'js/pages/forms_pickers.js');
		// $data['js'] = array('js/source/customer.js', 'js/source/category.js', 'js/source/jobs.js');
		$this->load->template('jobs/add', $data);
	}
}
