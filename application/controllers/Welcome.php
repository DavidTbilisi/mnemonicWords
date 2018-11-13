<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Welcome extends Front_Controller {

	public $words_count;
	public $timestemp;
	public function __construct() {
		parent::__construct();
		$this->timestemp = "Y-m-d G:i:s";
		$this->load->library( 'rb' );
		$this->load->model( 'users_m' );
		$this->load->model( 'words_m' );

		// SET LANGUAGE
		$lang = $this->session->userdata("lang");
		$this->lang->load('welcome', isset($lang) ? $lang:'georgian');

		// USER ID
		$this->ui = $this->session->userdata('user_id');
		//
		$this->db->from( 'words' );
		$this->db->where( 'user_id = ' . $this->ui );
		$this->db->order_by( 'id desc' );
		$this->words_count = ( $this->db->get() )->result();
	}

	public function index( $start = 0, $limit = 10, $sort = "id desc") {
		$this->session->flashdata('message');
		$this->db->from( 'words' );
		$this->db->where( 'user_id = ' . $this->ui );
		$this->db->order_by( $sort );
		$this->db->limit( $limit, $start );
		$words = ( $this->db->get() )->result();



		$this->load->view( 'incs/header', [ "data" => $this->data ] );
		$this->load->view( 'read', [
			'words'       => $words,
			'isLogged'    => $this->ion_auth->logged_in(),
			'start'       => $start,
			'words_count' => count($this->words_count),
		] );
		$this->load->view( 'incs/footer' );
	}

	public function setLang( $lang ) {
		$this->load->library('user_agent');
		$this->session->lang = $lang;
		echo $this->session->userdata("lang");
		if ($this->agent->is_referral())
		{
			redirect($this->agent->referrer());
		} else {
			redirect($_SERVER['HTTP_REFERER']);
		}

	}



	public function wordJson( $id = null) {

		$this->db->from( 'words' );
		$this->db->where( 'user_id = ' . $this->ion_auth->get_user_id() );
		$this->db->where( 'id = ' . $id );
		$words = ( $this->db->get() )->row();

		$this->output->set_content_type( 'application/json' )
		             ->set_output( json_encode( $words, JSON_UNESCAPED_UNICODE ) )
		             ->set_status_header( 200 );
	}
	public function returnJson( $data = null, $no_data = [ 'error' => '404' ] ) {
		$this->output->set_content_type( 'application/json' );
		if ( $data != null )
		{
			$this->output->set_output( json_encode( $data, JSON_UNESCAPED_UNICODE ) );

			return $this->output->set_status_header( 200 );
		}
		else
		{
			$this->output->set_output( json_encode( $no_data, JSON_UNESCAPED_UNICODE ) );

			return $this->output->set_status_header( 404 );
		}

	}



	// SEARCH
	public function searchResult( $search = null ) {
		$word  = $search == null ? $this->input->post( 'search' ) : $search;
		$words = json_decode( $this->search( $word ) );
		$this->load->view( 'incs/header', [ "data" => $this->data ] );
		$this->load->view( 'read', [ 'words' => $words, 'isLogged' => $this->ion_auth->logged_in(), ] );
		$this->load->view( 'incs/footer' );
	}
	public function search( $search = null ) {
		$word = $search == null ? $this->input->post( 'search' ) : $search;
		$this->db->group_start();
		$this->db->select( '*' );
		$this->db->like( 'newWord', $word );
		$this->db->or_like( 'connection', $word );
		$this->db->or_like( 'meaning', $word );
		$this->db->or_like( 'assoc', $word );
		$this->db->group_end();

		$this->db->where( 'user_id', $this->ion_auth->get_user_id() );
		$this->db->from( 'words' );
		$this->db->limit( 10 );
		$query = $this->db->get();
		$words = $query->result();

		return json_encode( $words, JSON_UNESCAPED_UNICODE );
	}

	// DEBUGGING
	public function fillWords($words = 5) {
		$this->load->helper( 'string' );
		for ( $i = 0; $i < $words; $i ++ )
		{
			$data = array(
				'newWord'    => random_string( 'alpha', random_int( 3, 15 ) ) . '_' . $i,
				'assoc'      => random_string( 'alpha', random_int( 4, 15 ) ) . '_' . $i,
				'connection' => random_string( 'alpha', random_int( 10, 30 ) ) . '_' . $i,
				'meaning'    => random_string( 'alpha', random_int( 5, 15 ) ) . '_' . $i,
				'user_id'    => $this->ion_auth->get_user_id()

			);
			$this->words_m->save( $data );
		}
		redirect(base_url());
	}


	// CRUD WORD
	public function save( $id = null ) {
		$post = $this->input->post();
		if ( $post['save'] )
		{
			$data = array(
				'new_word'    => $post["new_word"],
				'assoc'      => $post["assoc"],
				'connection' => $post["connection"],
				'meaning'    => $post["meaning"],
				'edited_at'    => date($this->timestemp),
				'user_id'    => $this->ion_auth->get_user_id()
			);
			if ( $id != null )
			{
				$this->words_m->save( $data, $id );
			}
			else
			{
				$this->words_m->save( $data );
			}
			echo 'saved';
			redirect( site_url() );
		}
	}
	public function delete( $id ) {
		if (isset($id)&&$id!=null&&!is_null($id)) {
			$this->words_m->delete( $id );
			// print_r($id);
		}
		$this->output->set_content_type( 'application/json' )
		             ->set_output( json_encode( ['result'=>'deleted'], JSON_UNESCAPED_UNICODE ) )
		             ->set_status_header( 200 );
	}

	public function wordSet(  ) {
			$this->timestemp = date('Y-m-d G:i:s');

		$w = R::find('words','id > 0');

	foreach ($w as $word):
$word->	edited_at = $this->timestemp;
$word->	created_at = $this->timestemp;
		R::store($word);

	endforeach;
	}


	// CRUD WORD_DETAILS
	public function detailsSave($id = null) {
		$post = $this->input->post();
		if ( $post['words_id'] )
		{
			$data = ['text' => $post["text"], 'words_id'=> $id];

			$this->db->from('details');
			$this->db->where('words_id',$id);

			$num = $this->db->count_all_results();
			echo $num;
			if ( $num < 1):
				$this->db->insert('details', $data);
			else:
				$this->db->update('details', $data, "words_id  =  {$id}");
			endif;
		};

	}
	public function details ($wordId = 171) {


		$this->db->from('details');
		$this->db->where('words_id',$wordId);

		$num = $this->db->count_all_results();

		$this->db->from('words');
		$this->db->where('words.id',$wordId);
		if ($num)
		{
			$this->db->join( 'details', 'details.words_id = words.id' );
		}
		$query = $this->db->get();

		$word = $query->row();

		$this->load->view( 'incs/header',[ "data" => $this->data ]  );

		$this->load->view( 'details', ['word'=>$word, 'isLogged' => $this->ion_auth->logged_in()]);

		$this->load->view( 'incs/footer' );

	}


	public function routesToJson() {
		$path = HOME . "/assets/js/routes.json";
		// echo $path;
		file_put_contents( $path, json_encode( $this->router->routes ) );
	}


}
