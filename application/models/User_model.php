<?php
Class User_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
	{
		if ($this->db->insert('user', $data)) {
			return TRUE;
		}
	}

	function update($data)
	{
		$this->db->set($data);
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}
}