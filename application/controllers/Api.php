<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Api extends Rest_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$user = $this->ion_auth->user()->row();
		return $this->json($user);
	}

	public function user($thing = null){
		$user = $this->ion_auth->user()->row();
		if ($thing == null){
			return $this->json($user);
		}
		return $this->json($user->$thing);
	}

	public function users(  ) {
		$users = $this->ion_auth->users()->result_array();
		return $this->json($users);
	}


}
