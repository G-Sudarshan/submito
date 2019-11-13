<?php

class Teacher extends MY_Controller{

	public function index()
	{
		$teacher_id = $this->session->userdata('teacher_id');

		$this->load->model('TeacherModel');

		$teacherData = $this->TeacherModel->getTeacherData($teacher_id);
		$a_data = $this->TeacherModel->getAssignmentData();

		$this->load->view('Teacher/TeacherDashboard',['teacherData'=>$teacherData,'a_data'=>$a_data]);
	}

	public function load_change_password_teacher()
	{
		$id = $this->session->userdata('teacher_id');
		$this->load->model('TeacherModel');

		$teacherData = $this->TeacherModel->getTeacherData($id);
		$userdata = array(
      'username' => $teacherData->username,
      'id' => $teacherData->id,
      'department' => $teacherData->department,
           );

		$this->load->view('Teacher/change_password',['teacher'=>$userdata]);
	}
}

?>