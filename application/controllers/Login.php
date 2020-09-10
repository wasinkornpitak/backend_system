<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index(){

		if($this->session->userdata('login') == true){
			$page = site_url("dashboard");
			header('location: '.$page);
			exit;
		}

		$data['js'] = array('js/source/login.js');
		$this->load->view('templates/header');
		$this->load->view('login', $data);
		$this->load->view('templates/footer');
	}
}
