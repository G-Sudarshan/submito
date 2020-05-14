<?php

class Student extends MY_Controller{

	public function index()
	{
		$student_id = $this->session->userdata('student_id');

		$this->load->model('StudentModel');

		$studentData = $this->StudentModel->getStudentData($student_id);
    $department_id = $studentData->department_id;
    //$this->load->model('Admin_model');
    $courseData = $this->StudentModel->get_all_crs_names_of_my_dpt($department_id);



    $user =  $this->getUserById($student_id);
    //$course_codes = $user['course_codes']; 



    if(isset($user['course_codes']))
    {
      $course_codes = $user['course_codes'];
    }
    else{
      $course_codes = [9934999,9923491];
    }




    $selectedcourseData = $this->StudentModel->getCourses($course_codes);

    if(!$selectedcourseData)
    {
      $selectedcourseData = NULL;
    }

    $clgname = $this->StudentModel->get_clg_name();

    

		$this->load->view('Student/StudentDashboard',['studentData' => $studentData,'courses'=>$courseData,'selectedcourses'=>$selectedcourseData,'scc'=>$course_codes,'clgname'=>$clgname]);
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

  public function update_student()
  {
    $userdata = array(
      'name' => $this->input->post('student_name'),
      'email' => $this->input->post('student_email'),
      'year' => $this->input->post('student_year'),
      'mobile_no' => $this->input->post('student_mobile'),

       );

    $id = $this->session->userdata('student_id');
    $this->load->model('StudentModel');
    $this->StudentModel->upadateStudentData($userdata,$id);

    $this->session->set_flashdata('success','Your information has been updated successfully!');

      return redirect('Student');
  }




 public function load_upload_assignment()
 {
     $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $rollno = $this->session->userdata('roll');
     $id = $this->session->userdata('student_id');
     $this->load->model('StudentModel');

     $createdAssignmentData = $this->StudentModel->getCreatedAssignments($cc);
     $uploadedAssignmentData = $this->StudentModel->getUploadedAssignments($id,$cc);
     

     $this->load->view('Student/upload_assignment',['course_code'=>$cc,'course_name'=>$cn,'rollno'=>$rollno,'cad'=>$createdAssignmentData,'uad'=>$uploadedAssignmentData]);

 }

 public function upload_assignment_text()
 { 
    $userdata = array(
      'course_code' => $this->input->post('course_code'),
      'rollno' => $this->input->post('rollno'),
      'student_id' => $this->session->userdata('student_id'),
      'text' => str_replace("'", "",$this->input->post('a_text')),
      'assignment_no' => $this->input->post('assignment_no'),
       );

    $this->load->model('StudentModel');
    $this->StudentModel->upload_assignment_text($userdata);

    $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $rollno = $this->session->userdata('roll');
     $id = $this->session->userdata('student_id');

     $createdAssignmentData = $this->StudentModel->getCreatedAssignments($cc);
      $uploadedAssignmentData = $this->StudentModel->getUploadedAssignments($id,$cc);
     

     $this->session->set_flashdata('success','Your assignment has been submitted successfully!');

       $this->load->view('Student/upload_assignment',['course_code'=>$cc,'course_name'=>$cn,'rollno'=>$rollno,'cad'=>$createdAssignmentData,'uad'=>$uploadedAssignmentData]);



 }

 public function update_assignment_text()
 { 
  $userdata = array(
      'course_code' => $this->input->post('course_code'),
      'rollno' => $this->input->post('rollno'),
      'student_id' => $this->session->userdata('student_id'),
      'text' => str_replace("'", "",$this->input->post('updated_a_text')),
      'assignment_no' => $this->input->post('assignment_no'),
       );

       $cc =  $this->input->post('course_code');
       $cn = $this->input->post('course_name');
       $rollno = $this->session->userdata('roll');
       $id = $this->session->userdata('student_id');
       $an = $this->input->post('assignment_no');

      $this->load->model('StudentModel');
      $this->StudentModel->update_assignment_text($userdata,$cc,$id,$an);

      $cc =  $this->input->post('course_code');
      $cn = $this->input->post('course_name');
      $rollno = $this->session->userdata('roll');
      $id = $this->session->userdata('student_id');

     $createdAssignmentData = $this->StudentModel->getCreatedAssignments($cc);
      $uploadedAssignmentData = $this->StudentModel->getUploadedAssignments($id,$cc);

     $this->session->set_flashdata('success','Your assignment has been Updated successfully!');

       $this->load->view('Student/upload_assignment',['course_code'=>$cc,'course_name'=>$cn,'rollno'=>$rollno,'cad'=>$createdAssignmentData,'uad'=>$uploadedAssignmentData]);

 }

 public function upload_assignment_pdf()
 {
  $userdata = array(
      'course_code' => $this->input->post('course_code'),
      'rollno' => $this->input->post('rollno'),
      'student_id' => $this->session->userdata('student_id'),
      'assignment_no' => $this->input->post('assignment_no'),
       );

    $rollno = $this->session->userdata('roll');
    $course_code = $this->input->post('course_code');
    $assignment_no = $this->input->post('assignment_no');

    $config = [
        'upload_path' => './assets/a',
        'allowed_types' => 'pdf', 
        'file_name' => $rollno."_".$course_code."_".$assignment_no."_".".pdf",
        'max_size' => 2048
            ];
         
         $this->load->library('upload', $config);
    
        if($this->upload->do_upload('userfile'))
           {
              $data = $this->upload->data();
      

               $pdf_path = "assets/a/".$data['raw_name'].$data['file_ext'];
               $userdata['pdf_path'] = $pdf_path;

                 $this->load->model('StudentModel');
                 $this->StudentModel->upload_assignment_pdf($userdata);
          
               $cc =  $this->input->post('course_code');
               $cn = $this->input->post('course_name');
               $rollno = $this->session->userdata('roll');
               $id = $this->session->userdata('student_id');

               $createdAssignmentData = $this->StudentModel->getCreatedAssignments($cc);
                $uploadedAssignmentData = $this->StudentModel->getUploadedAssignments($id,$cc);
     

               $this->session->set_flashdata('success','Your assignment has been submitted successfully!');

                return $this->load->view('Student/upload_assignment',['course_code'=>$cc,'course_name'=>$cn,'rollno'=>$rollno,'cad'=>$createdAssignmentData,'uad'=>$uploadedAssignmentData]);
           }
           else
           {
             echo "Upload was failed try again file size should be less than 1 MB ";
           }


  }

 public function update_assignment_pdf()
 {


      $userdata = array(
      'course_code' => $this->input->post('course_code'),
      'rollno' => $this->input->post('rollno'),
      'student_id' => $this->session->userdata('student_id'),
      'assignment_no' => $this->input->post('assignment_no'),
       );

    $rollno = $this->session->userdata('roll');
    $course_code = $this->input->post('course_code');
    $assignment_no = $this->input->post('assignment_no');

    $config = [
        'upload_path' => './assets/a',
        'allowed_types' => 'pdf', 
        'file_name' => $rollno."_".$course_code."_".$assignment_no."_".".pdf",
        'max_size' => 2048
            ];
         
         $this->load->library('upload', $config);
    
        if($this->upload->do_upload('updateuserfile'))
           {
              $data = $this->upload->data();

                $this->load->model('StudentModel');
                $path = $this->StudentModel->get_path($userdata);
                $final_path = $path->row()->pdf_path;
                $this->load->helper('file');
                //echo FCPATH."/".$final_path;
               unlink(FCPATH."/".$final_path);
      

               $pdf_path = "assets/a/".$data['raw_name'].$data['file_ext'];
              // $userdata['pdf_path'] = $pdf_path;

             
                // $this->StudentModel->upload_assignment_pdf($userdata);

                 $this->StudentModel->update_pdf_path($userdata,$pdf_path);
          
               $cc =  $this->input->post('course_code');
               $cn = $this->input->post('course_name');
               $rollno = $this->session->userdata('roll');
               $id = $this->session->userdata('student_id');

               $createdAssignmentData = $this->StudentModel->getCreatedAssignments($cc);
                $uploadedAssignmentData = $this->StudentModel->getUploadedAssignments($id,$cc);
     

               $this->session->set_flashdata('success','Your assignment has been updated successfully!');

               return $this->load->view('Student/upload_assignment',['course_code'=>$cc,'course_name'=>$cn,'rollno'=>$rollno,'cad'=>$createdAssignmentData,'uad'=>$uploadedAssignmentData]);
           }
           else
           {
             echo "Upload was failed try again file size should be less than 2MB ";
           }


 }



public function load_shared_notes()
{
 
  $course_code = $this->input->post('course_code');
  $course_name = $this->input->post('course_name');
  $rollno = $this->session->userdata('roll');
                     

  

  $this->load->model('StudentModel');
  $notes = $this->StudentModel->get_notes($course_code);

  $this->load->view('Student/shared_notes',['course_name'=>$course_name,'course_code'=>$course_code,'notes'=>$notes]);
}



    public function sendemail(){
    $subject = 'OTP for SubMito | GP Nashik | Student  ';
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
        
         return redirect('Student/verfiy');
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
        $this->load->view('Student/otpverify');
    }

    public function verify_otp()
    {
        // Get the otp value 
        $user_otp = $this->input->post('otp');
        if ($user_otp == $this->session->userdata('user_otp')) {
            $id = $this->session->userdata('student_id');
            $this->load->model('StudentModel');

              $studentData = $this->StudentModel->getStudentData($id);
              $userdata = array(
                'name' => $studentData->name,
                'rollno' => $studentData->rollno,
                'department' => $studentData->department,
                'id'=>$studentData->id
                     );

           $this->load->view('Student/change_password',['student'=>$userdata]);
            
        } 
        else {
          $this->session->set_flashdata('failure', 'Incorrect OTP');
          $this->load->view('Student/otpverify');    
              }
    //return redirect('Email');

        
    }







































  // -----------------JSON FUNCTIONS OF STUDENT------------------//

   
   public function getUser($id)
   {
    //echo FCPATH;
    //$id = $this->session->userdata('teacher_id');
    if(!file_exists(FCPATH.'assets/j/students/'.$id.'.json'))
    { 
      $id = $this->session->userdata('student_id');

      $data = array(
         'course_codes' => null
        );
      $this->createUser($data,$id);
    }
    return json_decode(file_get_contents(FCPATH.'assets/j/students/'.$id.'.json'), true);
   }

   public function createUser($data,$userId)
    {
      //$users = $this->getUsers();

      $data['id'] = $userId;

      $users[] = $data;

      $id = $this->session->userdata('student_id');

      $my_file = FCPATH.'assets/j/students/'.$id.'.json';

      $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

      $this->putJson($users);


      fclose($handle);

      return $data; 
    }

    public function putJson($users)
    {
      //base_url('assets/js/bootstrap.min.js');
      $id = $this->session->userdata('student_id');
      file_put_contents(FCPATH.'assets/j/students/'.$id.'.json', json_encode($users,JSON_PRETTY_PRINT));

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

  //  return json_decode(file_get_contents(FCPATH.'assets/j/teachers/'.$id.'.json'), true);

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