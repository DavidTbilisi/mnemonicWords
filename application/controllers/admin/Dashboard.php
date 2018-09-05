<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/29/2018
 * Time: 9:23 PM
 */
class Dashboard extends Back_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(  ) {
		$this->load->view('incs/header',["data"=>$this->data]);
		$this->load->view('admin/nav');
		$this->load->view('admin/dashboard');
		$this->load->view('incs/footer');
}

}