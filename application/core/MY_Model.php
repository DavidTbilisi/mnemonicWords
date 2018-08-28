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

		if( !count($this->db->order_by( $this->order_by )) ) {
			$this->db->order_by( $this->order_by );
		}
		clog($method);
		return $this->db->get( $this->table_name )->$method();
	}

	public function get_by( $where, $single = null ) {
		$this->db->where($where);
		return $this->get(null, $single);
	}

	public function save( $data, $id = null ) {
		// insert
		if ($id === null) {
			!isset($data[$this->primary_key]) || $data[$this->primary_key] = null;
			$this->db->set($data);
			$this->db->insert($this->table_name);
			$id = $this->db->insert_id();
		}
		// update
		else {
			$filter = $this->primary_filters;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->primary_key, $id);
			$this->db->update($this->table_name);
		}
		return $id;
	}

	public function delete( $id ) {
		$filter = $this->primary_filters;
		$id = $filter($id);
		if (!id) {
			return false;
		}

		$this->db->where($this->primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->table_name);
	}


}