<?php

class Student extends MY_Controller{

	public function index()
	{
		$student_id = $this->session->userdata('student_id');

		$this->load->model('StudentModel');

		$studentData = $this->StudentModel->getStudentData($student_id);

		$this->load->view('Student/StudentDashboard',['studentData' => $studentData]);
	}
}

