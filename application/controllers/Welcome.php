<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('test_model');

		$data = $this->test_model->get_test();

		echo '<pre>';
		print_r($data);
		exit;

		$res = array();

		foreach($data as $val){
			$send_data = array(
				'first_name'=> $val['name'],
				'last_name'=> $val['last_name']
			);
			$res[] = test_concat($send_data);
		}

		echo '<pre>';
		print_r($data);
		exit;

		$data['data'] = $res;
		$this->load->view('welcome_message', $data);
	}

	public function session(){
        echo '<pre>';
        print_r($this->session->all_userdata());
        exit;
	}
	
	public function sess_destroy(){
		$this->session->sess_destroy();
		echo '<pre>';
        print_r($this->session->all_userdata());
        exit;
    }
}
