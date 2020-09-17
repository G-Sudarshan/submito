<?php

class Admin_model extends CI_Model{

	public function get_clg_name()
	{
		$clg_name = $this->db->select('value')->from('tbl_info')->where('title','college_name')->get();

		return $clg_name->row()->value;

	}

	public function get_admin_name($id)
	{
		$data = $this->db->select('username')->from('tbl_admin_login')->where('id',$id)->get();

		return $data->row()->username;

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

	public function create_crs($new_crs_name,$new_crs_code,$d_id)
	{
		return $this->db->insert('tbl_courses_db' , ['name' => $new_crs_name , 'course_code' => $new_crs_code, 'department_id'=>$d_id] );
	}

	public function get_crs_names()
	{
		$this->db->order_by("course_code", "asc");
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
		 $this->db->insert('tbl_teachers_db' , ['name' => $new_staff_name , 'staff_id' => $new_staff_id , 'department_id' => $d_id , 'department' => $dname ,'password'=>$new_staff_pw, 'username' => $new_staff_username]);

	   $id = $this->db->select('id')->from('tbl_teachers_db')->where('username',$new_staff_username)->get();

		return $id;

	}

	public function get_staff_names($d_id)
	{
		///$staff_names = $this->db->get('tbl_teachers_db')->where(['department_id'=> $d_id]);
		$staff_names = $this->db->select(['id','staff_id','name','department'])->from('tbl_teachers_db')->where('department_id',$d_id)->get();

		return $staff_names;

	}

	public function getStaffDataToEdit($id)
	{
		$data = $this->db->select(['id','staff_id','name','department','department_id'])->from('tbl_teachers_db')->where('id',$id)->get();

		return $data->row();
	}

	public function upadateStaffData($userdata,$id)
	{
		$this->db->set($userdata);
		$this->db->where('id',$id);
		$this->db->update('tbl_teachers_db');
	}

	public function get_teachers_data()
	{
		return $this->db->select(['id','staff_id','name','department','department_id','username'])->from('tbl_teachers_db')->get();
	}

	public function get_student_names($d_id)
	{
		$student_names = $this->db->select(['id','rollno','name','department'])->from('tbl_student_db')->where('department_id',$d_id)->get();

		return $student_names;
	}

	public function add_student($new_student_rollno,$new_student_password,$dname,$d_id)
	{
		 $this->db->insert('tbl_student_db' , ['rollno' => $new_student_rollno , 'password' => $new_student_password , 'department_id' => $d_id , 'department' => $dname]);

		 $id = $this->db->select('id')->from('tbl_student_db')->where('rollno',$new_student_rollno)->get();

		return $id;

	}

	public function get_students_data()
	{
		return $this->db->select(['id','rollno','name','department','department_id'])->from('tbl_student_db')->get();
	}

	public function delete_student($id)
	{
		return $this->db->delete('tbl_student_db',['id' => $id]);
	}

	public function delete_course($id)
	{
		return $this->db->delete('tbl_courses_db',['id' => $id]);
	}

	public function upadateAdmin($userdata,$id)
	{
		$this->db->set($userdata);
		$this->db->where('id',$id);
		$this->db->update('tbl_admin_login');
	}

	public function get_admin_info($id)
	{
		$data = $this->db->select(['username','name','department','email','mobile_no'])->from('tbl_admin_login')->where('id',$id)->get();

		return $data->row();
	}

	public function getAllNotifications()
	{
		$n_data = $this->db->get('notification');
		return $n_data;
	}

	public function delete_notification($id)
	{
		return $this->db->delete('notification',['id' => $id]);
	}

	public function getEmailAdmin($id)
	{
		$data = $this->db->select('email')->from('tbl_admin_login')->where('id',$id)->get();

		return $data->row()->email;

	}

	public function add_admin($userdata)
	{
		return $this->db->insert('tbl_admin_login' , $userdata );
	}

	public function getData($rowno,$rowperpage,$search="") {
			
		$this->db->select('*');
		$this->db->from('tbl_student_db');

		if($search != ''){
        	$this->db->like('name', $search);
			$this->db->or_like('rollno', $search);
			$this->db->or_like('department', $search);
			$this->db->or_like('email', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();
       	
		return $query->result_array();
	}

	// Select total records
    public function getrecordCount($search = '') {

    	$this->db->select('count(*) as allcount');
      	$this->db->from('tbl_student_db');
      
      	if($search != ''){
       		$this->db->like('name', $search);
			$this->db->or_like('rollno', $search);
			$this->db->or_like('department', $search);
			$this->db->or_like('email', $search);
      	}

      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];

      }

      public function getDataT($rowno,$rowperpage,$search="") {
			
		$this->db->select('*');
		$this->db->from('tbl_teachers_db');

		if($search != ''){
        	$this->db->like('name', $search);
			$this->db->or_like('department', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('username', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();
       	
		return $query->result_array();
	}

	// Select total records
    public function getrecordCountT($search = '') {

    	$this->db->select('count(*) as allcount');
      	$this->db->from('tbl_teachers_db');
      
      	if($search != ''){
       		$this->db->like('name', $search);
			$this->db->or_like('department', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('username', $search);
      	}

      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];

      }


      public function reset_the_system($name)
      {
      	$userdata = array(
	      'username' => 'submito_admin',
	      'password' => md5('gpncm1234')
		);

      	$this->db->empty_table('assignments');
		$this->db->empty_table('events');
		$this->db->empty_table('notification');
		$this->db->empty_table('static_assignments');
		$this->db->empty_table('tbl_admin_login');
		$this->db->empty_table('tbl_courses_db');
		$this->db->empty_table('tbl_departments');
		$this->db->empty_table('tbl_student_db');
		$this->db->empty_table('tbl_teachers_db');
		$this->db->empty_table('notes');

		$this->db->where('title', 'college_name');
        $this->db->update('tbl_info',['value' => 'Your Institute Name Here']);

        $this->db->where('title', 'reset_by');
        $this->db->update('tbl_info',['value' => $name]);

        $this->db->insert('tbl_admin_login' , $userdata );
      }

      public function get_department_students($d_id)
      {
      	$data = $this->db->select(['id','rollno','name','email'])->from('tbl_student_db')->where('department_id',$d_id)->get();

		return $data;
      }

      public function get_department_courses($d_id)
      {
      	$data = $this->db->select(['id','course_code','name'])->from('tbl_courses_db')->where('department_id',$d_id)->get();

		return $data;
      }
}
