<?php

class TeacherModel extends CI_Model{

	public function getTeacherData($id)
	{
		$data = $this->db->select(['id','name','department','staff_id','department_id','username'])->from('tbl_teachers_db')->where('id',$id)->get();

		return $data->row();

	}

	public function getAssignmentData()
	{
		$data = $this->db->select(['id','pdf_path','name','rollno','subject','assignment_no','upload_datetime'])->from('assignments')->get();

		return $data;
	}
}

?>