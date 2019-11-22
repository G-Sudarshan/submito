<?php

class TeacherModel extends CI_Model{

	public function getTeacherData($id)
	{
		$data = $this->db->select(['id','name','department','staff_id','department_id','username','email','mobile_no'])->from('tbl_teachers_db')->where('id',$id)->get();

		return $data->row();

	}

	public function getAssignmentData()
	{
		$data = $this->db->select(['id','pdf_path','name','rollno','subject','assignment_no','upload_datetime'])->from('assignments')->get();

		return $data;
	}

	public function getCourses($course_codes)
	{
		$data = $this->db->from('tbl_courses_db')->where_in('course_code',$course_codes)->get();

		return $data;

	}

	public function upadateTeacherData($userdata,$id)
	{
		$this->db->set($userdata);
		$this->db->where('id',$id);
		$this->db->update('tbl_teachers_db');
	}
}

?>