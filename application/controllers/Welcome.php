<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Welcome extends Front_Controller {

	public $words_count;
	/**
	 * Welcome constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model( 'users_m' );
		$this->load->model( 'words_m' );
		$lang = $this->session->userdata("lang");
		$this->lang->load('welcome', isset($lang) ? $lang:'georgian');
		// $this->output->enable_profiler( true );

		$this->db->from( 'words' );
		$this->db->where( 'user_id = ' . $this->ion_auth->get_user_id() );
		$this->db->order_by( 'id desc' );
		$this->words_count = ( $this->db->get() )->result();
	}

	public function index( $start = 0, $limit = 10 ) {
		if ( $this->input->post( 'start' ) )
		{
			$start = $this->input->post( 'start' );
			$limit = $this->input->post( 'limit' );
		}

		$this->db->from( 'words' );
		$this->db->where( 'user_id = ' . $this->ion_auth->get_user_id() );
		$this->db->order_by( 'id desc' );
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

	private function csvToSql($path,$ui) {
		$filename = base_url( $path );
		$handle   = fopen( $filename, "r" );

		while ( fgetcsv( $handle, 1000, "," ) !== false )
		{
			$data = fgetcsv( $handle, 1000, "," );

			$import = "INSERT into words (language,newWord,meaning,user_id)";
			$import .= "values('$data[0]','$data[2]','$data[3]','$ui' );";
			echo $import;
			// $this->db->query($import);
		}

		unlink( $path );
	}

	public function import() {
		$ui = $this->ion_auth->get_user_id();
		$this->load->view( 'incs/header', [ "data" => $this->data ] );


		$this->load->helper( [ 'file', 'form' ] );
		$path = './assets/Phrasebook_ui' . $ui . '.csv';

		if ( file_exists( $path ) )
		{
			// echo '<br>file exists';
			$hasFile = true;
		}
		else
		{
			// echo '<br>file not exists';
			$hasFile = false;
		}




		if ( ! $hasFile ):
			// save to assets
			$this->uploadFile( 'import', $ui );
		else:
			// save to SQL
			$this->csvToSql($path,$ui);
		endif;


		$this->load->view( 'incs/footer' );

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

	private function uploadFile( $view, $user_id ) {
		$config['upload_path']   = './assets/';
		$config['allowed_types'] = 'csv';
		$config['file_name']     = 'Phrasebook_ui' . $user_id;


		$this->load->library( 'upload', $config );

		if ( ! $this->upload->do_upload( 'file' ) )
		{
			$this->load->view( $view, ['error' => $this->upload->display_errors() ] );
		} else {
			$this->load->view( $view, ['datas' => $this->upload->data() ]);
		}
	}

	public function wordsJson( $start = 0, $limit = 10 ) {

		$this->db->from( 'words' );
		$this->db->where( 'user_id = ' . $this->ion_auth->get_user_id() );
		$this->db->order_by( 'id desc' );
		$this->db->limit( $limit, $start );
		$words = ( $this->db->get() )->result();

		$this->output->set_content_type( 'application/json' )
		             ->set_output( json_encode( $words, JSON_UNESCAPED_UNICODE ) )
		             ->set_status_header( 200 );
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

	public function delete( $id ) {
	if (isset($id)&&$id!=null&&!is_null($id)) {
		 $this->words_m->delete( $id );
		// print_r($id);
	}
		$this->output->set_content_type( 'application/json' )
		             ->set_output( json_encode( ['result'=>'deleted'], JSON_UNESCAPED_UNICODE ) )
		             ->set_status_header( 200 );
	}

	public function fillWords($words =5) {
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

	public function save( $id = null ) {
		$post = $this->input->post();
		if ( $post['save'] )
		{
			$data = array(
				'newWord'    => $post["newWord"],
				'assoc'      => $post["assoc"],
				'connection' => $post["connection"],
				'meaning'    => $post["meaning"],
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

	public function export( $format =  'csv') {
		$this->load->dbutil();
		$this->load->helper('download');
		$sel = 'words.newWord, words.connection, words.assoc, words.meaning, ';
		$sel.= 'details.text';
		$this->db->from( 'words' );
		$this->db->select( $sel );
		$this->db->where( 'words.user_id = ' . $this->ion_auth->get_user_id() );
		$this->db->join('details', 'details.words_id = words.id','left');
		$this->db->order_by( 'words.id desc' );

		if ($format == 'csv'){
		$data = $this->dbutil->csv_from_result( $this->db->get() );
		} else if ($format == 'xml'){
			$data = $this->dbutil->xml_from_result( $this->db->get() );
		}


		else {
		echo 'xml or csv only';
		}


		$path = 'assets/Phrasebook_'.date("Y_m_d_H_i_s").".{$format}";

		 file_put_contents($path,$data);
		 force_download($path,"\xEF\xBB\xBF".$data,'csv');
	}

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

	public function routesToJson() {
		$path = HOME . "/assets/js/routes.json";
		// echo $path;
		file_put_contents( $path, json_encode( $this->router->routes ) );
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

}
