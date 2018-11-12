<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/29/2018
 * Time: 9:23 PM
 */
class Dashboard extends Back_Controller {

	private $user;
	public function __construct() {
		parent::__construct();
		// print_r($this->user);
		$this->all['data'] = $this->data;
		$this->all['user'] = $this->ion_auth->user()->row();

	}

	public function index(  ) {

		$this->load->view('incs/header',["data"=>$this->all]);
		$this->load->view('admin/dashboard');
		$this->load->view('incs/footer');
	}

	public function settings(  ) {
		$this->load->view('incs/header',["data"=>$this->all]);
		$this->load->view('admin/settings');
		$this->load->view('incs/footer');
	}
	public function getuser(){
//		return $this->user;
		if ( isset($_POST['uuuser']) ) {
			echo json_encode($this->user, JSON_UNESCAPED_UNICODE);
		}
	}


	public function users(  ) {
		$users = $this->ion_auth->users()->result();
		$this->load->view('incs/header',["data"=>$this->all, 'users' => $users]);
		$this->load->view('admin/users');
		$this->load->view('incs/footer');
	}
}