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

	public function index()
	{
		$this->output->enable_profiler(TRUE);
		$a = $this->words_m->get();
		$this->load->view('incs/header',["data"=>$this->data]);
		$this->load->view('read', ['a'=>$a]);
		$this->load->view('incs/footer');
	}



	public function save () {
		$post=$this->input->post();
		if ($post['save']) {

			$data = array(
				'newWord'      => $post["newWord"],
				'assoc'        => $post["assoc"],
				'connection'   => $post["connection"],
				'meaning'      => $post["meaning"]
			);
			$this->words_m->save($data);
			echo 'saved';
			redirect(site_url());
		}
	}

	public function edit( $id ) {
		$post=$this->input->post();
			$data = array(
				'newWord'      => $post["newWord"],
				'assoc'        => $post["assoc"],
				'connection'   => $post["connection"],
				'meaning'      => $post["meaning"]
			);

		$this->words_m->save($data, $id);

		return 'ok';
	}

	public function delete( $id ) {
		$this->words_m->delete($id);
		redirect(site_url());
	}

}
