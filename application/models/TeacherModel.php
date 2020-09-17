<?php

class TeacherModel extends CI_Model{

	public function get_clg_name()
	{
		$clg_name = $this->db->select('value')->from('tbl_info')->where('title','college_name')->get();

		return $clg_name->row()->value;

	}

	public function getTeacherData($id)
	{
		$data = $this->db->select(['id','name','department','staff_id','department_id','username','email','mobile_no'])->from('tbl_teachers_db')->where('id',$id)->get();

		return $data->row();

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

	public function create_assignment($userdata)
	{
		return $this->db->insert('static_assignments' , $userdata );
	}

	public function getCreatedAssignments($cc)
	{
		$data = $this->db->where('course_code',$cc)->order_by("assignment_no", "asc")->get('static_assignments');

		return $data;

	}
	public function get_submitted_assignment($cc,$assignment_no)
	{
		$array = array('course_code' => $cc, 'assignment_no' => $assignment_no);

		//$this->db->from($this->assignments);
		$this->db->where($array);
		$this->db->order_by("rollno", "asc");
		$data = $this->db->get('assignments');

		return $data;

		// $this->db->from($this->table_name);
		// $this->db->order_by("name", "asc");
		// $query = $this->db->get(); 
		// return $query->result()

	}

	public function set_marks($cc,$assignment_no,$rollno,$teacher_id,$marks)
	{
		$w_array = array('course_code'=>$cc,'rollno'=>$rollno,'assignment_no'=>$assignment_no);
		$s_array = array('marks'=>$marks,'checked_by'=>$teacher_id,'checked'=>1,'checked_on'=>date('Y-m-d H:i:s'));
		$this->db->set($s_array);
		$this->db->where($w_array);
		$this->db->update('assignments');
	}

	public function edit_assignment($assignment_no,$cc,$name,$description,$created_by)
	{
		$w_array = array('course_code'=>$cc,'assignment_no'=>$assignment_no);
		$s_array = array('name'=>$name,'description'=>$description,'created_by'=>$created_by);
		$this->db->set($s_array);
		$this->db->where($w_array);
		$this->db->update('static_assignments');

	}

	public function delete_static_assignment($id)
	{
		return $this->db->delete('static_assignments',['id' => $id]);
	}

	public function getTeacherEmail($id)
	{
		$data = $this->db->select('email')->from('tbl_teachers_db')->where('id',$id)->get();

		return $data->row()->email;
	}

	public function add_notes($userdata)
	{
		return $this->db->insert('notes' , $userdata );

	}

	public function get_columns($cc)
	{
		$data = $this->db->select('assignment_no','type')->from('static_assignments')->where('course_code',$cc)->get();

		return $data;
	}

	public function get_marks_matrix($cc)
	{
		$data = $this->db->select('rollno','assignment_no','marks')->from('assignments')->where('course_code',$cc)->get();

		return $data;

	}

	public function getStaticAssignemntsCount($cc)
	{
		// $data = $this->db->where('course_code',$cc);
		// $this->db->order_by("assignment_no", "asc");
		// $data = $this->db->get('static_assignments');

		$data = $this->db->select('assignment_no')->from('static_assignments')->where('course_code',$cc)->order_by("assignment_no", "asc")->get();

		return $data;
	}

	public function getMarksData($cc)
	{
		// $data = $this->db->select('rollno','marks','assignment_no','checked')->from('assignments')->where('course_code',$cc)->group_by('rollno')->order_by("rollno", "asc")->get();

		// return $data;

		$sql = "SELECT rollno, marks, assignment_no, checked FROM assignments WHERE course_code = '$cc' GROUP BY rollno ORDER BY rollno";

		$data = $this->db->query($sql);

		return $data;

	}

	public function getDistnctRn($cc)
	{
		$sql = "SELECT DISTINCT rollno FROM assignments WHERE course_code = '$cc' ORDER BY rollno";

		$data = $this->db->query($sql);

		return $data;
	}

	public function getMatrix($cc)
	{
		$sql = "SELECT  rollno,assignment_no,marks FROM assignments WHERE course_code = '$cc' ORDER BY rollno";

		$data = $this->db->query($sql);

		return $data;
	}

	public function getEmailOfStudent($rollno)
	{
		$data = $this->db->select('email')->from('tbl_student_db')->where('rollno',$rollno)->get();

		return $data->row()->email;
	}
}
