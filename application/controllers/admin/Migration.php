<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 10:29 AM
 */
class Migration extends Back_Controller {

	/**
	 * Migration constructor.
	 */
	public function __construct() {
		parent::__construct();

	}


	public function index(  ) {
		$this->load->library('migration');
//		$this->migration->version(5);
		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		} else {
			echo 'მონაცემთა ცხრილი დამატებულია';
		}
	}
}