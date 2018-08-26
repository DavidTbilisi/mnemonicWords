<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
//		$this->output->enable_profiler(TRUE);
		$a = $this->db->query('select * from table1');

		$this->load->view('incs/header');
		$this->load->view('read', ['a'=>$a->result()]);
		$this->load->view('incs/footer');
	}



	public function save () {
		if ($this->input->post('save')) {
			$data = array(
				'newWord'      => $this->input->post("newWord"),
				'assoc'        => $this->input->post("assoc"),
				'connection'   => $this->input->post("connection"),
				'meaning'      => $this->input->post("meaning")
			);
			$this->db->insert('table1', $data);
			echo 'saved';
			redirect(site_url());
		}
	}

	public function edit( $id ) {

		$newWord    =   $this->input->post("newWord");
		$connection =   $this->input->post("connection");
		$meaning    =   $this->input->post("meaning");
		$assoc      =   $this->input->post("assoc");

		$sql = "update table1 set 
				`newWord`='$newWord',
				`connection`='$connection',
				`meaning`='$meaning',
				`assoc`='$assoc'
				 WHERE `table1`.`id` =".$id;
		$this->db->query($sql);
		return 'ok';
	}

	public function delete( $id ) {
		$this->db->query('delete from table1 WHERE `table1`.`id` ='.$id);
		redirect(site_url());
	}

}
