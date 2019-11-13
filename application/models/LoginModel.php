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
		$this->db->from('tbl_teachers_db');
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
		$this->db->from('tbl_student_db');
		$this->db->where($userdata);
		$query= $this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row()->id;
		}
	}

	public function change_password_admin($userdata,$admin_id)
	{
		$this->db->set($userdata);
		$this->db->where('id',$admin_id);
		$this->db->update('tbl_admin_login');
	}

	public function change_password_teacher($userdata,$id)
	{
		$this->db->set($userdata);
		$this->db->where('id',$id);
		$this->db->update('tbl_teachers_db');

	}

	public function change_password_student($userdata,$id)
	{
		$this->db->set($userdata);
		$this->db->where('id',$id);
		$this->db->update('tbl_student_db');


	}

}

?>