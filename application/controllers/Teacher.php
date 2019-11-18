<?php

class Teacher extends MY_Controller{

	public function index()
	{
		$teacher_id = $this->session->userdata('teacher_id');

		$this->load->model('TeacherModel');

		$teacherData = $this->TeacherModel->getTeacherData($teacher_id);
		$a_data = $this->TeacherModel->getAssignmentData();

		$this->load->model('Admin_model');
		$courseData = $this->Admin_model->get_crs_names();
		$this->load->view('Teacher/TeacherDashboard',['teacherData'=>$teacherData,'a_data'=>$a_data,'courses'=>$courseData]);
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