<?php

class Student extends MY_Controller{

	public function index()
	{
		$student_id = $this->session->userdata('student_id');

		$this->load->model('StudentModel');

		$studentData = $this->StudentModel->getStudentData($student_id);
    $this->load->model('Admin_model');
    $courseData = $this->Admin_model->get_crs_names();

		$this->load->view('Student/StudentDashboard',['studentData' => $studentData,'courses'=>$courseData]);
	}

	public function upload_assignment()
	{
	    $config = [
        'upload_path' => './uploads',
        'allowed_types' => 'pdf', 
            ];
         $this->load->library('upload', $config);
    
        if($this->upload->do_upload() )
           {
              $post = $this->input->post();
               unset($post['submit']);

               $data = $this->upload->data();
      

               $pdf_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
               $post['pdf_path'] = $pdf_path;

                 $this->load->model('StudentModel');
                 $this->StudentModel->upload_assignment($post);
          
                $this->session->set_flashdata('success',"Assignment Uploaded Successfully !");

                 return redirect('Student');
            }
            else{
                  $upload_error = $this->upload->display_errors();
                  echo $upload_error;
                  echo "Upload unsuccessful";
                }
	}


  public function load_change_password_student()
  {
    $id = $this->session->userdata('student_id');
    $this->load->model('StudentModel');

    $studentData = $this->StudentModel->getStudentData($id);
    $userdata = array(
      'name' => $studentData->name,
      'rollno' => $studentData->rollno,
      'id' => $studentData->id,
      'department' => $studentData->department,
           );

    $this->load->view('Student/change_password',['student'=>$userdata]);

  }

  public function saveMySubjects()
  {
    $arr = $this->input->post('check_list');
    $id = $this->session->userdata('student_id');

    $data = array(
      'course_codes' => $arr
    );

    echo "<pre>";
    var_dump($arr);
    echo "<pre>";

        $this->updateUser($data,$id);

       $this->session->set_flashdata('success',"Your subjects saved succcessfully");

        return redirect('Student');
    
  }

  // -----------------JSON FUNCTIONS OF STUDENT------------------//

   public function getUsers()
   {
    //echo FCPATH;
    return json_decode(file_get_contents(FCPATH.'assets/j/students.json'), true);
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
      file_put_contents(FCPATH.'assets/j/students.json', json_encode($users,JSON_PRETTY_PRINT));

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