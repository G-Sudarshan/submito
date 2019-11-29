<?php

class StudentModel extends CI_Model{

	public function getStudentData($student_id)
	{

		$data = $this->db->select(['id','name','department','rollno','department_id','mobile_no','email','year'])->from('tbl_student_db')->where('id',$student_id)->get();

		return $data->row();
	}

	public function upload_assignment($post)
	{
		return $this->db->insert('assignments' , $post );
	}

	public function getCourses($course_codes)
	{
		$data = $this->db->from('tbl_courses_db')->where_in('course_code',$course_codes)->get();

		return $data;

	}

	public function upadateStudentData($userdata,$id)
	{
		$this->db->set($userdata);
		$this->db->where('id',$id);
		$this->db->update('tbl_student_db');
	}

	public function getCreatedAssignments($cc)
	{
		$data = $this->db->where('course_code',$cc)->get('static_assignments');

		return $data;

	}

	public function upload_assignment_text($userdata)
	{
		return $this->db->insert('assignments' , $userdata );
	}

	public function upload_assignment_pdf($userdata)
	{
		return $this->db->insert('assignments' , $userdata );
	}

	public function getUploadedAssignments($id,$cc)
	{
		$array = array('student_id' => $id, 'course_code' => $cc);
        //$this->db->where($array);
		$data = $this->db->where($array)->get('assignments');

		return $data;
	}

	public function update_assignment_text($userdata,$cc,$id,$an)
	{
	    $array = array('student_id' => $id, 'course_code' => $cc, 'assignment_no' => $an);

		$this->db->set($userdata);
		$this->db->where($array);
		$this->db->update('assignments');
	}
}

?>