<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxs extends CI_Controller{

   	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('customers_model');
		$this->load->model('jobs_model');
		$this->load->model('category_model');

	}
	
	
	public function user(){
		extract($_POST);

		if($operate == 'login'){
			$data_login = array(
				'user'=> $user,
				'password'=> $password
				// 'is_active'=> true
			);

			$res = $this->login_model->get_login_data($data_login);

			// echo '<pre>';
			// print_r($res);
			// exit;

			if(!empty($res)){
				$data_session = array(
					'admin_id'=> $res['_id'],
					'name'=> $res['name'],
					'company_key'=> $res['company_key'][0],
					'login'=> true
				);
				$this->session->set_userdata($data_session);
				$response = array(
					'result'=> true,
					'message'=> 'login complete'
				);
			}else{
				$response = array(
					'result'=> false,
					'message'=> 'login fail'
				);
			}
		}else if($operate == 'logout'){
			$response = array();
		}else if($operate == 'forgot'){
			$response = array();
		}

		echo json_encode($response);
	}

	public function jobs(){
		extract($_POST);
		// echo '<pre>';
		// print_r($_POST);
		// exit;

		if($operate == 'get_list'){

			if ($limit === false) {
				$offset = false;
			} elseif ($limit == '') {
				$per_page = $limit = 20;
				$offset = ($limit * $page) - $limit;
				$start_page = 1;
			} else {
				$per_page = $limit;
				$offset = ($limit * $page) - $limit;
			}
			$callback = 'get_jobs_list({{n}})';

			$where_jobs = array(
				'is_active'=> true,
				'company_key'=> array('$in'=> array($this->session->userdata('company_key')))
			);

			// if(!empty($first_category)){
			// 	$where_jobs['first_category'] = new MongoDB\BSON\ObjectId($first_category);
			// }

			if(!empty($category)){
				$where_jobs['category_id'] = new MongoDB\BSON\ObjectId($category);
			}

			if(!empty($job_status)){
				$where_jobs['job_status'] = $job_status;
			}

			if(!empty($text_search)){
				
				$explod_string_cus = explode(' ', trim($text_search) , 2);
				if(strstr( $text_search, '"' )){
					$text_search =  $text_search;
					$text_search =  str_replace('"','', $text_search);
				}else{
					$text_search =  str_replace('"','', $text_search);
					$text_search = new MongoDB\BSON\Regex($text_search, 'i');
				}
				
				if (count($explod_string_cus) > 1) {
					$f_name = $explod_string_cus[0];
					$l_name = $explod_string_cus[1];
					$where_customers['$or'][] = array('first_name' => new MongoDB\BSON\Regex($f_name, 'i'));
					$where_customers['$or'][] = array('last_name' => new MongoDB\BSON\Regex($l_name, 'i'));
				} else {
					$where_customers['$or'][] = array('first_name' => $text_search);
					$where_customers['$or'][] = array('last_name' => $text_search);
				}

				$where_customers['$or'][] = array('email' => $text_search);
				$select_customers = array('_id');
				$res_customers = $this->customers_model->get_customers($where_customers, $select_customers);

				if(count($res_customers) > 0){
					$customer_id_list = array_column($res_customers, '_id');
					$where_jobs['$or'][] = array('customer_id' => array('$in' => $customer_id_list));
				}

				$where_jobs['$or'][] = array('code' => $text_search);
				$where_jobs['$or'][] = array('tel' => $text_search);
			}

			$where = array(
				'where'=> $where_jobs,
				'count'=> true
			);
			$job_count = $this->jobs_model->get_job_list($where);
			$count_all_jobs = $job_count['count'];
			$where = array(
				'where'=> $where_jobs,
				'limit'=> $limit,
				'offset'=> $offset,
				'count'=> false
			);
			$res_jobs = $this->jobs_model->get_job_list($where);

			// $data = array(
			// 	'res'=> $res_jobs,
			// 	'job_count'=> $job_count
			// );

			// echo '<pre>';
			// print_r($data);
			// exit;

			$response = array();
			if(count($res_jobs['result']) > 0){
				#set data
				foreach($res_jobs['result'] as $key => $val){
					$res_jobs['result'][$key]->sla_in = date('d-m-Y H:i', $val->sla_in);
					$res_jobs['result'][$key]->sla_out = date('d-m-Y H:i', $val->sla_out);
					$res_jobs['result'][$key]->job_status = check_job_status_badges($val->job_status);
				}
				$response['result'] = true;
				$response['data'] = $res_jobs['result'];
				$response['pagination'] = pagination($count_all_jobs, $per_page, $page, 'js', $callback);
				$now_record = $per_page * $page;
				$start_record = ($start_page + $now_record) - $per_page;
				if ($now_record > $count_all_jobs) {
					$now_record = $count_all_jobs;
				}
				$response['page_detail'] = 'แสดงผล '.$start_record.' ถึง '.$now_record.' ของ '.$count_all_jobs.' รายการ';
			}else{
				$response['result'] = false;
			}

		}else if($operate == 'get_detail'){
			$response = array();
		}else if($operate == 'get_job_step'){
			if(!empty($category_id)){
				$where = array(
					'category_id'=> new MongoDB\BSON\ObjectId($category_id)
				);
				$job_step = $this->category_model->get_step($where);
				
				if(!empty($job_step)){
					$job_steps = array();
					foreach($job_step as $inx => $value){
						$job_steps[$inx]['group'] = $value['_id'];
						foreach($value['result'] as $key => $val){
							if(!empty($val->group_title)){
								$job_steps[$inx]['group_title'] = $val->group_title->th;
							}
							if(!empty($val->step_data) && $val->step_data == true){
								$where_step_data = array(
									'step_id'=> $val->_id
								);
								$select_step_data = array(
									'title'
								);
								$res_step_data = $this->category_model->get_step_data($where_step_data, $select_step_data);
								if(!empty($res_step_data)){
									$job_steps[$inx]['step_data'][$key]['value'] = $res_step_data;
								}else{
									$job_steps[$inx]['step_data'][$key]['value'] = '';
								}
							}else{
								$job_steps[$inx]['step_data'][$key]['value'] = '';
							}
							if(!empty($val->value)){
								$job_steps[$inx]['step_data'][$key]['value'] = $val->value;
							}
							$job_steps[$inx]['step_data'][$key]['key_of_element'] = $val->key_of_element;
							$job_steps[$inx]['step_data'][$key]['title'] = $val->title->th;
							$job_steps[$inx]['step_data'][$key]['type'] = $val->type;
							$job_steps[$inx]['step_data'][$key]['sort'] = $val->sort;
							$job_steps[$inx]['step_data'][$key]['_id'] = $val->_id;
						}
					}

					$response = array(
						'result'=> true,
						'data'=> $job_steps
					);

				}else{
					$response = array(
						'result'=> false
					);
				}
			}else{
				$response = array(
					'result'=> false
				);
			}
		}else if($operate == 'add_job'){
			$img = array();
			$file = array();
			for ($i = 1; $i <= 5; ++$i) {
				if(isset($_FILES['key_image'.$i])){
					if ($_FILES['key_image'.$i] != ''){
						$res_img_s3 = save_image_s3($_FILES['key_image'.$i], 'tests3555/jobs', $_FILES['key_image'.$i]['name']);
						// $res_img_s3 = save_image_s3($_FILES['key_image'.$i], $this->session->userdata('companykey').'/jobs/', $_FILES['key_image'.$i]['name']);
						if($res_img_s3){
							$img[] = $res_img_s3;
						}else{
							$img = '';
							$result = array(
								'result'=> false,
								'message'=> 'อัปโหลดรูปผิดพลาด'
							);
							echo json_encode($result);
							exit;
						}
					}
				}
			}

			$data = array(
				'img'=> $img,
				'file'=> $file
			);

			echo '<pre>';
			print_r($data);
			exit;

			$data = array(
				'category_id'=> new MongoDB\BSON\ObjectId($job_category),
				'sub_category_id'=> new MongoDB\BSON\ObjectId($job_sub_category),
				'customer_id'=> new MongoDB\BSON\ObjectId($customer_id),
				'customer_address_id'=> new MongoDB\BSON\ObjectId($customer_addr),
				'employee_id'=> '',
				'code'=> '',
				'job_status'=> 'pending',
				'sla_in'=> '',
    			'sla_out'=> '',
				'short_address'=> '',
				'appointment_date'=> '',
				'appointment_time'=> '',
				'created_date'=> date('c'),
				'is_active'=> true,
				'job_img'=> $img,
				'company_key'=> array($this->session->userdata('company_key')),
				'employee_status'=> ''
			);

			$job_step = $this->jobs_model->add_job($data);

			$result = array(
				'result'=> $job_step,
				'message'=> 'ทำรายการสำเร็จ'
			);

			echo json_encode($result);
		}else{
			echo '<pre>';
			print_r($_POST);
			exit;
		}
		
		echo json_encode($response);

	}

	public function category(){
		extract($_POST);

		if($operate == 'get_sub_cat'){
			$select_sub_cat = array('title');
			$where_sub_cat = array(
				'parent_id'=> new MongoDB\BSON\ObjectId($first_category_id)
			);
			$res_model_cat = $this->category_model->get_sub_level_category($where_sub_cat, $select_sub_cat);
			$response = array();
			if(count($res_model_cat) > 0){
				$response['result'] = true;
				$response['data'] = $res_model_cat;
			}else{
				$response['result'] = false;
			}
		}else if($operate == 'get_main_cat'){
			$select_main_cat = array('title');
			$res_model_cat = $this->category_model->get_first_level_category(array(), $select_main_cat);
			if(count($res_model_cat) > 0){
				$response['result'] = true;
				$response['data'] = $res_model_cat;
			}else{
				$response['result'] = false;
			}
		}

		echo json_encode($response);
	}

	public function customer(){
		extract($_POST);

		if($operate == 'get_list'){
			if(!empty($text_search)){
				
				$explod_string_cus = explode(' ', trim($text_search) , 2);
				if(strstr( $text_search, '"' )){
					$text_search =  $text_search;
					$text_search =  str_replace('"','', $text_search);
				}else{
					$text_search =  str_replace('"','', $text_search);
					$text_search = new MongoDB\BSON\Regex($text_search, 'i');
				}
				
				if (count($explod_string_cus) > 1) {
					$f_name = $explod_string_cus[0];
					$l_name = $explod_string_cus[1];
					$where_customers['$or'][] = array('first_name' => new MongoDB\BSON\Regex($f_name, 'i'));
					$where_customers['$or'][] = array('last_name' => new MongoDB\BSON\Regex($l_name, 'i'));
				} else {
					$where_customers['$or'][] = array('first_name' => $text_search);
					$where_customers['$or'][] = array('last_name' => $text_search);
				}

				$where_customers['$or'][] = array('email' => $text_search);
				$where_customers['$or'][] = array('contact_number' => $text_search);
				$res_customers = $this->customers_model->get_customers($where_customers);

				$response = array();
				if(!empty($res_customers)){
					$response['result'] = true;
					foreach($res_customers as $val){
						$response['data'][] = array("id" => $val['_id'], "name" => $val['full_name']);
					}
				}else{
					$response['result'] = false;
				}

			}
		}else if($operate == 'get_detail'){
			if(!empty($customer_id)){
				$where_customers = array(
					'_id'=> new MongoDB\BSON\ObjectId($customer_id),
				);
				$res_customers = $this->customers_model->get_customers($where_customers);
				$where_customers_addr = array(
					'customer_id'=> new MongoDB\BSON\ObjectId($customer_id),
				);
				$res_customers_addr = $this->customers_model->get_customers_address($where_customers_addr);
	
				if(!empty($res_customers)){
					$response['result'] = true;
					$customer_detail = array(
						'name'=> $res_customers[0]['full_name'],
						'tel'=> $res_customers[0]['contact_number'],
						'email'=> $res_customers[0]['email'],
						'company_key'=> $res_customers[0]['company_key'],
						'_id'=> $res_customers[0]['_id']
					);
	
					$customer_addr = array();
					foreach($res_customers_addr as $key=> $val){
						$customer_addr[$key]['_id'] = $val['_id'];
						$customer_addr[$key]['address'] = $val['address'];
					}
					$response['customer_detail'] = $customer_detail;
					$response['customer_addr'] = $customer_addr;
	
				}else{
					$response['result'] = false;
				}
			}else{
				$response['result'] = false;
			}
		}
		
		echo json_encode($response);
	}

}
