<?php

class Admin_model extends CI_Model{

	public function get_clg_name()
	{
		$clg_name = $this->db->select('value')->from('tbl_info')->where('title','college_name')->get();

		return $clg_name->row()->value;

	}

	public function set_clg_name($new_clg_name)
	{      
		$this->db->where('title', 'college_name');
        return $this->db->update('tbl_info',['value' => $new_clg_name]);

		
	}

	public function create_dpt($new_dpt_name,$new_dpt_id)
	{
		return $this->db->insert('tbl_departments' , ['dpt_name' => $new_dpt_name , 'dpt_id' => $new_dpt_id] );
	}

	public function get_dpt_names()
	{
		$dpt_names = $this->db->get('tbl_departments');

		return $dpt_names;

	}

	public function create_crs($new_crs_name,$new_crs_code)
	{
		return $this->db->insert('tbl_courses_db' , ['name' => $new_crs_name , 'course_code' => $new_crs_code] );
	}

	public function get_crs_names()
	{
		$crs_names = $this->db->get('tbl_courses_db');

		return $crs_names;

	}

	public function add_notification($array)
	{
		return $this->db->insert('notification' , $array );
	}

	public function fetch_notifications()
	{
		$n_data = $this->db->get('notification');
		return $n_data;
	}

	public function add_staff($new_staff_name,$new_staff_id,$d_id,$dname,$new_staff_pw,$new_staff_username)
	{
		return $this->db->insert('tbl_teachers_db' , ['name' => $new_staff_name , 'staff_id' => $new_staff_id , 'department_id' => $d_id , 'department' => $dname ,'password'=>$new_staff_pw, 'username' => $new_staff_username]);

	}

	public function get_staff_names($d_id)
	{
		///$staff_names = $this->db->get('tbl_teachers_db')->where(['department_id'=> $d_id]);
		$staff_names = $this->db->select(['id','staff_id','name','department'])->from('tbl_teachers_db')->where('department_id',$d_id)->get();

		return $staff_names;

	}

	public function getStaffDataToEdit($staff_id)
	{
		$data = $this->db->select(['staff_id','name','department','department_id'])->from('tbl_teachers_db')->where('id',$staff_id)->get();

		return $data->row();
	}

	public function upadateStaffData($userdata,$id)
	{
		$this->db->set($userdata);
		$this->db->where('staff_id',$id);
		$this->db->update('tbl_teachers_db');
	}
}

?>