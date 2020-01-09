<?php

class Teacher extends MY_Controller{

	public function index()
	{
		$teacher_id = $this->session->userdata('teacher_id');

		$this->load->model('TeacherModel');

		$teacherData = $this->TeacherModel->getTeacherData($teacher_id);
		

		$this->load->model('Admin_model');
   	
    $crs_names = $this->Admin_model->get_crs_names(); 

     
    $clgname = $this->TeacherModel->get_clg_name(); 


		$user =  $this->getUserById($teacher_id);

    if(isset($user['course_codes']))
    {
		  $course_codes = $user['course_codes'];
    }
    else{
      $course_codes = [993499,9923491];
    }

      
		$selectedcourseData = $this->TeacherModel->getCourses($course_codes);
    if(!$selectedcourseData)
    {
      $selectedcourseData = NULL;
    }
    

    

//-------------------- FOR TROUBLESHOOTING PURPOSE -------------------------//

		// foreach ($courseData->result() as $course) {
		// 	echo $course->id."<br/>";
		// 	echo $course->course_code."<br/>";
		// 	echo $course->name."<br/>"."<br/>";
		// }
//--------------------------------------------------------------------------//		

		$this->load->view('Teacher/TeacherDashboard',['teacherData'=>$teacherData,'selectedcourses'=>$selectedcourseData,'courses'=>$crs_names,'scc'=>$course_codes,'clgname'=>$clgname]);
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

		// echo "<pre>";
		// var_dump($arr);
		// echo "<pre>";

        $this->createUser($data,$id);

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
    $subject = 'OTP for SubMito | GP Nashik | Teacher ';
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
        'smtp_user' => 'gpnashik8@gmail.com', // change it to yours
        'smtp_pass' => 'Gpnashik@2001', // change it to yours
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

    public function load_share_notes()
    {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');
      $this->load->view('Teacher/share_notes',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name]);
    }

    public function upload_notes()
    { 
      $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');

                $config['upload_path']          = './assets/notes/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|ppt|xls|doc';
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                
                if($this->upload->do_upload() )
                {
      

                        $data =  $this->upload->data();

                        $path = "assets/notes/".$data['raw_name'].$data['file_ext'];
                        
                        $id = $this->session->userdata('teacher_id');

                        $title = $this->input->post('title');

                        $userdata = array(
                                'path' => $path,
                                'course_code' => $cc,
                                'teacher_name' => $teacher_name,
                                'teacher_id' => $id,
                                'title' => $title
                                 );
                    

                      $this->load->model('TeacherModel');
                      $this->TeacherModel->add_notes($userdata);
                          $this->session->set_flashdata('success','Notes uploaded successfully !');
                        return redirect('Teacher');

                }
                else{            
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('Teacher/share_notes',['error'=>$error,'course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name]);
                }


               // $this->load->library('upload', $config);
    
    if($this->upload->do_upload() )
    {
      $post = $this->input->post();
      unset($post['submit']);

      $data = $this->upload->data();
      

      $pdf_path = "uploads/".$data['raw_name'].$data['file_ext'];
      $post['pdf_path'] = $pdf_path;

      $this->load->model('Admin_model');
      $this->Admin_model->add_notification($post);
          $this->session->set_flashdata('success','Notification added successfully !');
        return redirect('Admin/notification');
    }
    else{
      $upload_error = $this->upload->display_errors();
      echo $upload_error;
      echo "Upload unsuccessful";
    }


    }


    public function load_print_marks()
    {

     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');

      //$this->load->view('Teacher/share_notes',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name]);

     $this->load->model('TeacherModel');

     $columns  = $this->TeacherModel->get_columns($cc);
     $matrix = $this->TeacherModel->get_marks_matrix($cc);

      $this->load->view('Teacher/print_marks',['c'=>$columns,'m'=>$matrix,'course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name]);
    }













































	// -----------------JSON FUNCTIONS OF TEACHER------------------//

   public function getUser($id)
   {
    //echo FCPATH;
    //$id = $this->session->userdata('teacher_id');
    if(!file_exists(FCPATH.'assets/j/teachers/'.$id.'.json'))
    { 
      $id = $this->session->userdata('teacher_id');

      $data = array(
         'course_codes' => null
        );
      $this->createUser($data,$id);
    }
    return json_decode(file_get_contents(FCPATH.'assets/j/teachers/'.$id.'.json'), true);
   }

   public function createUser($data,$userId)
    {
      //$users = $this->getUsers();

      $data['id'] = $userId;

      $users[] = $data;

      $id = $this->session->userdata('teacher_id');

      $my_file = FCPATH.'assets/j/teachers/'.$id.'.json';

      $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

      $this->putJson($users);


      fclose($handle);

      return $data; 
    }

    public function putJson($users)
    {
      //base_url('assets/js/bootstrap.min.js');
      $id = $this->session->userdata('teacher_id');
      file_put_contents(FCPATH.'assets/j/teachers/'.$id.'.json', json_encode($users,JSON_PRETTY_PRINT));

    }

   public function updateUser($data,$id)
    {


		$updateUser = [];
		$users = $this->getUser($id);
		foreach ($users as $i => $user) {
			if($user['id'] == $id)
			{	
				$users[$i] = $updateUser = array_merge($user,$data);
			}
		}

		$this->putJson($users);
		
		return $updateUser;

    }

 //    public function getUserById($id)
 //   {

	// 	return json_decode(file_get_contents(FCPATH.'assets/j/teachers/'.$id.'.json'), true);

	// }


  public function getUserById($id)
   {
    $users = $this->getUser($id);
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