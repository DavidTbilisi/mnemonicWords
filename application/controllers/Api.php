<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Api extends Rest_Controller {

	public function __construct() {
		parent::__construct();
		$this->ui = $this->session->userdata('user_id');
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

	public function wordsJson( $start = 0, $limit = 10 , $sort='id', $order = 'desc') {
		$this->db->from( 'words' );
		$this->db->select( ' new_word, connection, meaning, assoc, edited_at, created_at, id' );
		$this->db->where( 'user_id = ' . $this->ui );
		$this->db->order_by( "{$sort} {$order}" );
		$this->db->limit( $limit, $start );
		$words = ( $this->db->get() )->result();

		return $this->json($words);
	}

	public function search( $where='new_word' ) {
		$word = $this->input->post("word");
		if ($word) {
		$this->db->from("words");
		$this->db->like( $where, $word );
		$words = ( $this->db->get() )->result();
//		echo $this->db->last_query();
		return $this->json($words);
		}
		return null;

	}


}
