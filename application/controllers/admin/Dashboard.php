<?php


class Dashboard extends Back_Controller {

	public function __construct() {
		parent::__construct();
		$this->usr = $this->ion_auth->user()->row();
	}

	public function index(  ) {
		$this->load->view('incs/header',["data"=>$this->data, 'user' => $this->usr,]);
		$this->load->view('admin/dashboard');
		$this->load->view('incs/footer');
	}

}