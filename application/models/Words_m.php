<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 10:56 AM
 */
class Words_m extends MY_Model {
	protected $table_name = 'table1';
	protected $primary_key = 'id';
	protected $primary_filters = 'intval';
	protected $order_by = 'id';
	protected $rules = [];
	protected $timestamps = FALSE;
}