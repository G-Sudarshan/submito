<?php

class StudentModel extends CI_Model{

	public function getStudentData($student_id)
	{

		$data = $this->db->select(['id','name','department','rollno','department_id','mobile_no'])->from('tbl_student_db')->where('id',$student_id)->get();

		return $data->row();
	}
}

?>