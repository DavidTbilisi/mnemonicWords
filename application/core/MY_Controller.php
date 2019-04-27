<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 9:10 AM
 */
class MY_Controller extends CI_Controller{

	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->data['site_name'] = config_item('site_name');
	}


}