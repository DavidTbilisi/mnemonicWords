<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 9:30 AM
 */
class MY_Model extends CI_Model {
protected $table_name = '';
protected $primary_key = 'id';
protected $primary_filters = 'intval';
protected $order_by = 'id';
protected $rules = [];
protected $timestamps = FALSE;
	public function __construct() {
		parent::__construct();

	}

	public function get( $id = NULL, $single = null ) {
		if ($id != NULL) {
			$filter = $this->primary_filters;
			$id = $filter($id); // convert to intval;
			$this->db->where($this->primary_key, $id);
			$method = 'row';
		} elseif($single == true) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}


		if($this->db->order_by($this->order_by)) {
			$this->db->order_by($this->order_by);
		}
		return $this->db->get($this->table_name)->$method();
	}

	public function get_by( $where, $single=null ) {
		$this->db-where($where);
		return $this->get(null, $single);
	}

	public function save( $id=null ) {

	}

	public function delete(  ) {

	}


}