<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 11/12/2018
 * Time: 9:46 PM
 */
class Rest_Controller extends Back_Controller {
	public function __construct() {
		parent::__construct();
//		$this->output->parse_exec_vars = true;
//		$this->output->enable_profiler(TRUE);
	}


	public function json( $data , $status = 200) {
		$this->output->set_content_type( 'application/json' ,'UTF-8')
		             ->set_status_header( $status )
		             ->set_header('author: david chincharashvili')
		             ->set_output( json_encode( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) );
	}



}