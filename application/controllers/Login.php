<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Front_Controller{

	public function  __construct() {
		parent::__construct();
		$this->load->model('users_m');
	}

	public function index()
	{
		$this->load->view('incs/header',["data"=>$this->data]);

//		$this->output->enable_profiler(TRUE);
		$this->load->view('login');
		$this->load->view('incs/footer');

	}





}
