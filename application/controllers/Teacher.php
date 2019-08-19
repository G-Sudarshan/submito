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
}

?>