<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Front_Controller{


	/**
	 * Welcome constructor.
	 */
	public function  __construct() {
		parent::__construct();
		$this->load->model('users_m');
		$this->load->model('words_m');


	}

	public function index($start = 0,$limit = 10)
	{
		if($this->input->post('start')){
				$start = $this->input->post('start');
				$limit = $this->input->post('limit');
		}

		$this->output->enable_profiler(TRUE);

		$this->db->from('words');
		$this->db->where('user_id = '.$this->ion_auth->get_user_id());
		$this->db->order_by('id desc');
		$this->db->limit($limit,$start);
		$words = ($this->db->get())->result();

		// $words = $this->words_m->get_by('user_id = '.$this->ion_auth->get_user_id());


		$this->load->view('incs/header',["data"=>$this->data]);
		$this->load->view('read', [
			'words'=>$words,
			'isLogged' => $this->ion_auth->logged_in(),
			'start' => $start,
			]);
		$this->load->view('incs/footer');
	}

	public function  import(){
		$this->load->view('incs/header',["data"=>$this->data]);
		$this->load->view('import');
		$this->load->view('incs/footer');

	}


	public function wordsJson( $id = null ) {
		$words = $this->words_m->get($id);
		$this->output->set_content_type('application/json')
		             ->set_output(json_encode($words, JSON_UNESCAPED_UNICODE))
		             ->set_status_header(200);
	}

	public function returnJson( $data = null, $no_data=['error'=>'404'] ) {
		$this->output->set_content_type('application/json');
		if ($data != null) {
			$this->output->set_output(json_encode($data, JSON_UNESCAPED_UNICODE));
			return $this->output->set_status_header(200);
				} else {
			$this->output->set_output(json_encode($no_data, JSON_UNESCAPED_UNICODE));
			return $this->output->set_status_header(404);
		}

	}

	public function search( $search = null) {
		$word = $search == null?  $this->input->post('search'): $search;
		$this->output->enable_profiler(TRUE);
		$this->db->group_start();
		$this->db->select('*');
		$this->db->like('newWord', $word);
		$this->db->or_like('connection', $word);
		$this->db->or_like('meaning', $word);
		$this->db->or_like('assoc', $word);
		$this->db->group_end();

		$this->db->where('user_id', $this->ion_auth->get_user_id());
		$this->db->from('words');
		$this->db->limit(10);
		$query=$this->db->get();
		$words =  $query->result();
		return json_encode($words,JSON_UNESCAPED_UNICODE);
	}

	public function searchResult( $search = null ) {
		$word = $search == null?  $this->input->post('search'): $search;
		$words = json_decode($this->search($word));
		$this->load->view('incs/header',["data"=>$this->data]);
		$this->load->view('read', ['words'=>$words, 'isLogged' => $this->ion_auth->logged_in(),]);
		$this->load->view('incs/footer');
	}

	public function delete( $id ) {
		$this->words_m->delete($id);
		redirect(site_url());
	}

	public function fillWords(  ) {
		$this->load->helper('string');
		for($i = 0; $i < 90; $i++){
			$data = array(
				'newWord'      => random_string('alpha', random_int(3,15)).'_'.$i,
				'assoc'        => random_string('alpha', random_int(4,15)).'_'.$i,
				'connection'   => random_string('alpha', random_int(10,30)).'_'.$i,
				'meaning'      => random_string('alpha', random_int(5,15)).'_'.$i,
				'user_id'      => $this->ion_auth->get_user_id()

		);
			$this->words_m->save($data);
		}
	}

	public function save ($id = null) {
		$post=$this->input->post();
		if ($post['save']) {
			$data = array(
				'newWord'      => $post["newWord"],
				'assoc'        => $post["assoc"],
				'connection'   => $post["connection"],
				'meaning'      => $post["meaning"],
				'user_id'      => $this->ion_auth->get_user_id()
			);
			if ($id != null) {
				$this->words_m->save($data, $id);
			} else {
				$this->words_m->save($data);
			}
			echo 'saved';
			redirect(site_url());
		}
	}

	public function routesToJson(  ) {
		$path = HOME."/assets/js/routes.json";
		// echo $path;
		file_put_contents($path,json_encode($this->router->routes));
	}


}
