<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Api extends Rest_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$intro = new stdClass();
		$intro->welcome = 'THIS IS GUIDE';
		$intro->user = 'api/user - გვაძლევს შემოსული მომხმარებლის პარამეტრებს';
		$intro->users = 'api/users - გვაძლევს ყველა მომხმარებლის პარამეტრებს';
		$intro->groups = 'api/groups - გვაძლევს ყველა არსებულ ჯგუფს';
		$intro->groups_id = 'api/groups/{id} - გვაძლევს ერთ კონკრეტულ ჯგუფს';
		return $this->json($intro);
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

	public function groups( $group_id = null ) {
		if ($group_id == null):
		$groups = $this->ion_auth->groups()->result();
		return $this->json($groups);
		else:
		$group = $this->ion_auth->group($group_id)->row();
		return $this->json($group);
		endif;
	}


}
