<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 9:59 AM
 */
class Front_Controller extends MY_Controller {

	public function __construct() {
		parent::__construct();
		echo __CLASS__;
	}
}