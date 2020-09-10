<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_job_status(){

		$data = array(
			'pending'=> 'รอดำเนินการ', 
			'processing'=> 'กำลังดำเนินการ',
			'complete'=> 'เสร็จสิ้น', 
			'cancel'=> 'ยกเลิก' 
		);

		return $data;

	}

}
