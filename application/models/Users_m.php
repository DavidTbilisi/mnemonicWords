<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 10:56 AM
 */
class Users_m extends MY_Model {
	protected $table_name = 'users';
	protected $primary_key = 'id';
	protected $primary_filters = 'intval';
	protected $order_by = '';
	protected $rules = [];
	protected $timestamps = FALSE;
}