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


	public function saveMySubjects()
	{
		$arr = $this->input->post('check_list');
		$id = $this->session->userdata('teacher_id');

		$data = array(
			'course_codes' => $arr
		);

		echo "<pre>";
		var_dump($arr);
		echo "<pre>";

        $this->updateUser($data,$id);

       $this->session->set_flashdata('success',"Your subjects saved succcessfully");

        return redirect('Teacher');
		
	}

	// -----------------JSON FUNCTIONS OF TEACHER------------------//

   public function getUsers()
   {
    //echo FCPATH;
    return json_decode(file_get_contents(FCPATH.'assets/j/teachers.json'), true);
   }

   public function createUser($data,$userId)
    {
      $users = $this->getUsers();

      $data['id'] = $userId;

      $users[] = $data;

      $this->putJson($users);

      return $data; 
    }

    public function putJson($users)
    {
      //base_url('assets/js/bootstrap.min.js');
      file_put_contents(FCPATH.'assets/j/teachers.json', json_encode($users,JSON_PRETTY_PRINT));

    }

    function updateUser($data,$id)
    {
		$updateUser = [];
		$users = $this->getUsers();
		foreach ($users as $i => $user) {
			if($user['id'] == $id)
			{	
				$users[$i] = $updateUser = array_merge($user,$data);
			}
		}

		$this->putJson($users);
		
		return $updateUser;

    }



   //-----------------------------------------------------------------//

}

?>