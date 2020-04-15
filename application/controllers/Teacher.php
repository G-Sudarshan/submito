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

  public function load_allocate_subjects_to_teacher()
  {

    $teacher_id = $this->input->post('teacher_id');
    $tname = $this->input->post('name');

    $did = $this->input->post('did');
    $dname = $this->input->post('dname');

    $this->load->model('Admin_model');
    $this->load->model('TeacherModel');
    
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

    $this->load->view('Admin/allocate_subject_to_teachers',['selectedcourses'=>$selectedcourseData,'courses'=>$crs_names,'scc'=>$course_codes,'clgname'=>$clgname,'teacher_name'=>$tname,'did'=>$did,'dname'=>$dname,'teacher_id'=>$teacher_id]);

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
		$id = $this->input->post('teacher_id');

		$data = array(
			'course_codes' => $arr
		);

		// echo "<pre>";
		// var_dump($arr);
		// echo "<pre>";

        $this->createUser($data,$id);

        $this->session->set_flashdata('success',"Subjects saved succcessfully");

    $this->load->model('Admin_model');
    $dname = $this->input->post('dname');
    $d_id = $this->input->post('d_id');

    $teachers = $this->Admin_model->get_staff_names($d_id);

    $this->load->view('Admin/manage_teachers',['teachers'=>$teachers,'dname'=>$dname,'d_id'=>$d_id]);
		
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
     $teacher_name = $this->input->post('teacher_name');
    
     $assignment_no = $this->input->post('assignment_no');
     $assignment_type = $this->input->post('assignment_type');
     $teacher_id = $this->session->userdata('teacher_id');

     $rollno = $this->input->post('rollno');
     $marks = $this->input->post('marks');


     $this->load->model('TeacherModel');

     $this->TeacherModel->set_marks($cc,$assignment_no,$rollno,$teacher_id,$marks);
     $submittedAssignmentData = $this->TeacherModel->get_submitted_assignment($cc,$assignment_no);

     $this->session->set_flashdata('success','Marks of Roll no '.$rollno.' submitted successfully');

     $this->load->view('Teacher/submitted_assignment',['course_code'=>$cc,'course_name'=>$cn,'assignment_no'=>$assignment_no,'assignment_type'=>$assignment_type,'sad'=>$submittedAssignmentData,'teacher_name'=>$teacher_name]);

    }

    public function load_previously_checked_assignment()
    {
      $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');
     $assignment_no = $this->input->post('assignment_no');
     $assignment_type = $this->input->post('assignment_type');


     $this->load->model('TeacherModel');

     //$createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);

     $submittedAssignmentData = $this->TeacherModel->get_submitted_assignment($cc,$assignment_no);

     $this->load->view('Teacher/previously_checked_assignment',['course_code'=>$cc,'course_name'=>$cn,'assignment_no'=>$assignment_no,'assignment_type'=>$assignment_type,'sad'=>$submittedAssignmentData,'teacher_name'=>$teacher_name]);

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
        
         return redirect('Teacher/verfiy');
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



   public function load_marks_matrix()
   {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');

     $this->load->model('TeacherModel');

     $staticAssigmentCountR = $this->TeacherModel->getStaticAssignemntsCount($cc);

     $staticAssigmentCount = $staticAssigmentCountR->result();
     //print_r($staticAssigmentCount->result());

     $marks_dataR = $this->TeacherModel->getMarksData($cc);
     $marks_data = $marks_dataR->result();

    // print_r($marks_data);

     $distinct_rn = $this->TeacherModel->getDistnctRn($cc);
     $rn = $distinct_rn->result();

     $matrixR = $this->TeacherModel->getMatrix($cc);
     $matrix = $matrixR->result();
     //print_r($matrix->result());
     //print_r($rn);
     //echo "<br/><br/>";
     //print_r($distinct_rn);
     
   $this->load->view('Teacher/marks_matrix',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'sac'=>$staticAssigmentCount,'rn'=>$distinct_rn,'matrix'=>$matrix]);
   }



   public function UpdateMarksThroughMatrix()
   {
    $arr = $this->input->post('marksmatrixstudent');
    $rollno = $this->input->post('rollno');
    $cc =  $this->input->post('course_code');
    $cn = $this->input->post('course_name');
    $teacher_name = $this->input->post('teacher_name');
    $id = $this->session->userdata('teacher_id');

    $arrlen =  sizeof($arr);
   //  print_r($arr);

   //  echo "$rollno";echo "<br/>";
   //  echo "$cc";echo "<br/>";
   //  echo "$cn";echo "<br/>";
   //  echo "$teacher_name";echo "<br/>";
   //  echo "$id";echo "<br/>";
   // 

    // foreach ($arr as $a) {

    //   $marks = $a;

    //   echo "$marks   ";
    //   # code...
    // }

   

    $this->load->model('TeacherModel');
    foreach ($arr as $assignment_no => $marks) {
      
     // echo "$an : $marks <br/>";

      $this->TeacherModel->set_marks($cc,$assignment_no,$rollno,$id,$marks);
    }
    

   
     $this->session->set_flashdata('success', "Marks Matrix Updated Successfully for Roll no. ".$rollno);


      $staticAssigmentCountR = $this->TeacherModel->getStaticAssignemntsCount($cc);

     $staticAssigmentCount = $staticAssigmentCountR->result();
     //print_r($staticAssigmentCount->result());

     $marks_dataR = $this->TeacherModel->getMarksData($cc);
     $marks_data = $marks_dataR->result();

    // print_r($marks_data);

     $distinct_rn = $this->TeacherModel->getDistnctRn($cc);
     $rn = $distinct_rn->result();

     $matrixR = $this->TeacherModel->getMatrix($cc);
     $matrix = $matrixR->result();
     //print_r($matrix->result());
     //print_r($rn);
     //echo "<br/><br/>";
     //print_r($distinct_rn);
     
   $this->load->view('Teacher/marks_matrix',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'sac'=>$staticAssigmentCount,'rn'=>$distinct_rn,'matrix'=>$matrix]);


        
      

    
  }


  public function exprint()
  {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');

     $this->load->model('TeacherModel');

     $staticAssigmentCountR = $this->TeacherModel->getStaticAssignemntsCount($cc);

     $staticAssigmentCount = $staticAssigmentCountR->result();
     //print_r($staticAssigmentCount->result());

     $marks_dataR = $this->TeacherModel->getMarksData($cc);
     $marks_data = $marks_dataR->result();

    // print_r($marks_data);

     $distinct_rn = $this->TeacherModel->getDistnctRn($cc);
     $rn = $distinct_rn->result();

     $matrixR = $this->TeacherModel->getMatrix($cc);
     $matrix = $matrixR->result();
     //print_r($matrix->result());
     // print_r($rn);
     // echo "<br/><br/>";
     // print_r($distinct_rn);
     
   $this->load->view('Teacher/marks_matrix_exprint',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'sac'=>$staticAssigmentCount,'rn'=>$distinct_rn,'matrix'=>$matrix]);
  }

  public function back_to_checked_assignments()
  {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');

      $this->load->model('TeacherModel');

     $createdAssignmentData = $this->TeacherModel->getCreatedAssignments($cc);
     

     $this->load->view('Teacher/check_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'cad'=>$createdAssignmentData]);
  }

  public function back_to_submitted_assignments()
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


  public function sendFeedback()
  {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $teacher_name = $this->input->post('teacher_name');
     $assignment_no = $this->input->post('assignment_no');
     $assignment_type = $this->input->post('assignment_type');
     $rollno = $this->input->post('rollno');
     $feedback = $this->input->post('feedback');

     $this->load->model('TeacherModel');
     $mail = $this->TeacherModel->getEmailOfStudent($rollno);

     //echo $mail;

     $subject = "feedback from ".$teacher_name." | SubMito | ".$cn."( ".$cc." )"." | assignment no. ".$assignment_no;



   

   

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
      $this->email->to($mail);
     // $this->email->to($email);// change it to yours
      $this->email->subject($subject);
      
    //  $this->email->name($name);
    //  $this->email->email1($email1);
      //$this->email->address($address);
      //$this->email->contact_no($contact_no);

      $this->email->message($feedback);
      if($this->email->send()){
        $this->session->set_flashdata('success', "Feedback sent successfully to ".$rollno." on ".$mail);

         $submittedAssignmentData = $this->TeacherModel->get_submitted_assignment($cc,$assignment_no);

     $this->load->view('Teacher/submitted_assignment',['course_code'=>$cc,'course_name'=>$cn,'teacher_name'=>$teacher_name,'assignment_no'=>$assignment_no,'assignment_type'=>$assignment_type,'sad'=>$submittedAssignmentData]);
      }
      else{
        $this->session->set_flashdata('failure', show_error($this->email->print_debugger()));
        
      }


  }































	// -----------------JSON FUNCTIONS OF TEACHER------------------//

   public function getUser($id)
   {
    //echo FCPATH;
    //$id = $this->session->userdata('teacher_id');
    if(!file_exists(FCPATH.'assets/j/teachers/'.$id.'.json'))
    { 
      $id = $id;

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

      $id = $userId;

      $my_file = FCPATH.'assets/j/teachers/'.$id.'.json';

      $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

      $this->putJson($users,$userId);


      fclose($handle);

      return $data; 
    }

    public function putJson($users,$userId)
    {
      //base_url('assets/js/bootstrap.min.js');
      $id = $userId;
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