<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Login extends Front_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'users_m' );
	}

	public function index() {
		$this->load->view( 'incs/header', [ "data" => $this->data ] );
		$email = $this->input->post( 'email' );
		$pass = $this->input->post( 'password' );
		$this->output->enable_profiler(TRUE);
		$user = $this->users_m->get_by( 'email=' . "'$email'" );
		print_r($user);
		if ($email == $user[0]->email) {
			if ($pass == $user[0]->password){
				$this->session->set_userdata(['logedin'=>1]);
			} else {
				echo 'pass is not correct';
			}

		}else {
			echo "mail is not correct";
		}
		//redirect( base_url( 'login' ) );
		echo $this->session->userdata('logedin');
		$this->load->view( 'login' );
		$this->load->view( 'incs/footer' );

	}


	public function register() {
		$this->load->view( 'incs/header', [ "data" => $this->data ] );
		$email = $this->input->post( 'email' );
		$pass = $this->input->post( 'password' );
		if ( $this->input->server( 'REQUEST_METHOD' ) == 'POST' )
		{
			$user = $this->users_m->get_by( 'email=' . "'$email'" );
			if ( ! empty( $user ) )
			{
				print( 'ასეთი ელ.ფოსტა უკვე არსებობს' );
			}
			else
			{
				$data = [ 'email' => $email, 'password' => $pass, 'name' => $email, ];
				$this->users_m->save( $data );
				redirect( base_url( 'login' ) );
			}
		}

		$this->output->enable_profiler( true );
		$this->load->view( 'register' );
		$this->load->view( 'incs/footer' );

	}


}
