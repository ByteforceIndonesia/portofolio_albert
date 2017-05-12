<?php 

class Crud_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function create ($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function read ($table, $where = null)
	{
		if($where == null)
			return $this->db->get($table)->result();
		else
			return $this->db->get_where($table, $where)->result();
	}

	public function update($table, $set, $where)
	{
		$this->db->set($set);
		$this->db->where($where);
		return $this->db->update($table);
	}

	public function delete($table, $where)
	{
		return $this->db->delete($table, $where);
	}

}