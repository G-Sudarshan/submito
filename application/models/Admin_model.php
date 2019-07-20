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
}

?>