<?php

class LoginModel extends CI_Model{

public function admin_login($userdata)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin_login');
		$this->db->where($userdata);
		$query= $this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row()->id;
		}
	}

	public function teacher_login($userdata)
	{
		$this->db->select('*');
		$this->db->from('tbl_teacher_login');
		$this->db->where($userdata);
		$query= $this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row()->id;
		}
	}

	public function student_login($userdata)
	{
		$this->db->select('*');
		$this->db->from('tbl_student_login');
		$this->db->where($userdata);
		$query= $this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row()->id;
		}
	}

}

?>