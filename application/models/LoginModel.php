<?php

class LoginModel extends CI_Model{


	public function get_clg_name()
	{
		$clg_name = $this->db->select('value')->from('tbl_info')->where('title','college_name')->get();

		return $clg_name->row()->value;

	}

	public function fetch_notifications()
	{
		$n_data = $this->db->get('notification');
		return $n_data;
	}


	public function getAllNotifications()
	{
		$n_data = $this->db->get('notification');
		return $n_data;
	}

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
		$this->db->select('id');
		$this->db->from('tbl_student_db');
		$this->db->where($userdata);
		$query= $this->db->get();
		//print_r($query);
		//echo $query['id'];
		//echo $query->row()->id;
		// $result = mysqli_fetch_array($query);
		// echo $result;
		// print_r($result);

		// echo $query->id;
		// echo $query['id'];

		// print_r($query);
		// echo $query.id;
		// echo $query->row('id');

		echo $userdata['password'];
		echo "<br/>";
		echo $userdata['rollno'];
		if($query->num_rows()==1)
		{
			return $query->row()->id;
		}
		else 
		{
			echo " id not returned";
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
