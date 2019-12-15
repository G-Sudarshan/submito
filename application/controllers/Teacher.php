<?php

class Teacher extends MY_Controller{

	public function index()
	{
		$teacher_id = $this->session->userdata('teacher_id');

		$this->load->model('TeacherModel');

		$teacherData = $this->TeacherModel->getTeacherData($teacher_id);
		

		$this->load->model('Admin_model');
   	
    $crs_names = $this->Admin_model->get_crs_names();  


		$user =  $this->getUserById($teacher_id);

    if(isset($user['course_codes']))
    {
		  $course_codes = $user['course_codes'];
    }
    else{
      $course_codes = [993499,9923491];
    }

      
		$selectedcourseData = $this->TeacherModel->getCourses($course_codes);
    

    

//-------------------- FOR TROUBLESHOOTING PURPOSE -------------------------//

		// foreach ($courseData->result() as $course) {
		// 	echo $course->id."<br/>";
		// 	echo $course->course_code."<br/>";
		// 	echo $course->name."<br/>"."<br/>";
		// }
//--------------------------------------------------------------------------//		

		$this->load->view('Teacher/TeacherDashboard',['teacherData'=>$teacherData,'selectedcourses'=>$selectedcourseData,'courses'=>$crs_names,'scc'=>$course_codes]);
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


  public function update_teacher()
  {
    $userdata = array(
      'name' => $this->input->post('teacher_name'),
      'email' => $this->input->post('teacher_email'),
      'mobile_no' => $this->input->post('teacher_mobile'),
       );

    $id = $this->session->userdata('teacher_id');
    $this->load->model('TeacherModel');
    $this->TeacherModel->upadateTeacherData($userdata,$id);

    print_r($userdata);

    echo "$id";

    $this->session->set_flashdata('success','Your information has been updated successfully!');

      return redirect('Teacher');
  }


   public function load_create_assignment()
   {
   	 $cc =  $this->input->post('course_code');
   	 $cn = $this->input->post('course_name');
   	 $teacher_name = $this->input->post('teacher_name');

   	 $this->load->model('TeacherModel');

   	 $createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);
   	 

   	 $this->load->view('Teacher/create_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'cad'=>$createdAssignmentData]);
   }


   public function create_assignment()
   {
   	 $userdata = array(
      'assignment_no' => $this->input->post('a_no'),
      'course_code' => $this->input->post('course_code'),
      'name' => $this->input->post('a_title'),
      'description' => $this->input->post('a_description'),
      'deadline' => $this->input->post('a_deadline'),
      'type' => $this->input->post('a_type'),
      'created_by' => $this->input->post('t_name'),


       );

   	 $cc =  $this->input->post('course_code');
   	 $cn = $this->input->post('course_name');
   	 $teacher_name = $this->input->post('t_name');

   	 $this->load->model('TeacherModel');
   	 $this->TeacherModel->create_assignment($userdata);
   	 $createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);

   	 $this->session->set_flashdata('success','New assignment has been created successfully!');

   	 $this->load->view('Teacher/create_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'cad'=>$createdAssignmentData]);
   }


   public function load_check_assignment()
   {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');

     $this->load->model('TeacherModel');

     $createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);
     

     $this->load->view('Teacher/check_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'cad'=>$createdAssignmentData]);
     
   }

   public function load_submitted_assignment()
   {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');
     $assignment_no = $this->input->post('assignment_no');
     $assignment_type = $this->input->post('assignment_type');


     $this->load->model('TeacherModel');

     //$createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);

     $submittedAssignmentData = $this->TeacherModel->get_submitted_assignment($cc,$assignment_no);

     $this->load->view('Teacher/submitted_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'assignment_no'=>$assignment_no,'assignment_type'=>$assignment_type,'sad'=>$submittedAssignmentData]);

   }

   public function submit_marks()
    {

     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
    
     $assignment_no = $this->input->post('assignment_no');
     $assignment_type = $this->input->post('assignment_type');
     $teacher_id = $this->session->userdata('teacher_id');

     $rollno = $this->input->post('rollno');
     $marks = $this->input->post('marks');


     $this->load->model('TeacherModel');

     $this->TeacherModel->set_marks($cc,$assignment_no,$rollno,$teacher_id,$marks);
     $submittedAssignmentData = $this->TeacherModel->get_submitted_assignment($cc,$assignment_no);

     $this->session->set_flashdata('success','Marks of Roll no '.$rollno.' submitted successfully');

     $this->load->view('Teacher/submitted_assignment',['course_code'=>$cc,'course_name'=>$cn,'assignment_no'=>$assignment_no,'assignment_type'=>$assignment_type,'sad'=>$submittedAssignmentData]);

    }

    public function load_previously_checked_assignment()
    {
      $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     //$teacher_name = $this->input->post('teacher_name');
     $assignment_no = $this->input->post('assignment_no');
     $assignment_type = $this->input->post('assignment_type');


     $this->load->model('TeacherModel');

     //$createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);

     $submittedAssignmentData = $this->TeacherModel->get_submitted_assignment($cc,$assignment_no);

     $this->load->view('Teacher/previously_checked_assignment',['course_code'=>$cc,'course_name'=>$cn,'assignment_no'=>$assignment_no,'assignment_type'=>$assignment_type,'sad'=>$submittedAssignmentData]);

    }

    public function edit_assignment()
    {
      
      $assignment_no = $this->input->post('a_no');
      
      $name = $this->input->post('a_title');
      $description = $this->input->post('a_description');
      //$deadline => $this->input->post('a_deadline'),
     // $type => $this->input->post('a_type'),
      $created_by = $this->input->post('t_name');


       
    //echo $assignment_no;
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('t_name');

     $this->load->model('TeacherModel');
     $this->TeacherModel->edit_assignment($assignment_no,$cc,$name,$description,$created_by);
     $createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);

     $this->session->set_flashdata('success','assignment '.$assignment_no.' has been Updated successfully!');

    $this->load->view('Teacher/create_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'cad'=>$createdAssignmentData]);
    }

    public function delete_static_assignment()
    {
      $id = $this->input->post('id');
      $assignment_no = $this->input->post('assignment_no');
      $this->load->model('TeacherModel');
      $this->TeacherModel->delete_static_assignment($id);

     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('t_name');

     
     $createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);

     $this->session->set_flashdata('success','assignment '.$assignment_no.' has been deleted successfully!');

    $this->load->view('Teacher/create_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'cad'=>$createdAssignmentData]);

    }

    public function sendemail(){
    $subject = 'Welcome To GPNashik Portal  ';
    $otp = $this->generate_otp();
    $this->session->set_userdata('user_otp',$otp);
    $message = urlencode("Otp number is ".$otp);
    $email = $this->session->userdata('email');

//$rndno=rand(1000, 9999);
//$message = urlencode(“OTP number.".$rndno);
      $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'error4206@gmail.com', // change it to yours
        'smtp_pass' => 'aniket@2001', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($subject);
      $this->email->message($message);

      if($this->email->send()){
        
         return redirect(base_url('Teacher/verfiy'));
      }
      else{
        $this->session->set_flashdata('message', show_error($this->email->print_debugger()));
        
      }

     // echo "the variable : ".$otp."<br/>The sesion variable : ".$this->session->userdata('user_otp');
      // Redirect to the verfication page
       // return redirect(base_url('email/verfiy'));
    }
  
  private function generate_otp(int $length = 6)
    {
        $otp = "";
        $numbers = "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        return $otp;
    }

    public function verfiy()
    {
        // Load the form to verfiy OTP
        $this->session->set_flashdata('message', 'OTP has been sent to '.$this->session->userdata('email').' Successfully...');
        $this->load->view('Teacher/otpverify');
    }

    public function verify_otp()
    {
        // Get the otp value 
        $user_otp = $this->input->post('otp');
        if ($user_otp == $this->session->userdata('user_otp')) {
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
        else {
          $this->session->set_flashdata('failure', 'Incorrect OTP');
          $this->load->view('Teacher/otpverify');    
              }
    //return redirect('Email');

        
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

   public function updateUser($data,$id)
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

    public function getUserById($id)
   {
		$users = $this->getUsers();
		foreach ($users as $user) {
			if($user['id'] == $id)
			{
				return $user;
			}
		}

		return null;
	}



   //-----------------------------------------------------------------//





}

?>