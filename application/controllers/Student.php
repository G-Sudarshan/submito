<?php

class Student extends MY_Controller{

	public function index()
	{
		$student_id = $this->session->userdata('student_id');

		$this->load->model('StudentModel');

		$studentData = $this->StudentModel->getStudentData($student_id);
    $this->load->model('Admin_model');
    $courseData = $this->Admin_model->get_crs_names();



    $user =  $this->getUserById($student_id);
    $course_codes = $user['course_codes'];



    $selectedcourseData = $this->StudentModel->getCourses($course_codes);

		$this->load->view('Student/StudentDashboard',['studentData' => $studentData,'courses'=>$courseData,'selectedcourses'=>$selectedcourseData,'scc'=>$course_codes]);
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
     $rollno = $this->input->post('rollno');
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
      'text' => $this->input->post('a_text'),
      'assignment_no' => $this->input->post('assignment_no'),
       );

    $this->load->model('StudentModel');
    $this->StudentModel->upload_assignment_text($userdata);

    $cc =  $this->input->post('course_code');
     $cn = $this->input->post('course_name');
     $rollno = $this->input->post('rollno');
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
      'text' => $this->input->post('updated_a_text'),
      'assignment_no' => $this->input->post('assignment_no'),
       );

       $cc =  $this->input->post('course_code');
       $cn = $this->input->post('course_name');
       $rollno = $this->input->post('rollno');
       $id = $this->session->userdata('student_id');
       $an = $this->input->post('assignment_no');

      $this->load->model('StudentModel');
      $this->StudentModel->update_assignment_text($userdata,$cc,$id,$an);

      $cc =  $this->input->post('course_code');
      $cn = $this->input->post('course_name');
      $rollno = $this->input->post('rollno');
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

    $rollno = $this->input->post('rollno');
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
               $rollno = $this->input->post('rollno');
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

    $rollno = $this->input->post('rollno');
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
               $rollno = $this->input->post('rollno');
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




















    //   $userdata = array(
    //   'course_code' => $this->input->post('course_code'),
    //   'rollno' => $this->input->post('rollno'),
    //   'student_id' => $this->session->userdata('student_id'),
    //   'assignment_no' => $this->input->post('assignment_no'),
    //    );

    //   $rollno = $this->input->post('rollno');
    //   $course_code = $this->input->post('course_code');
    //   $assignment_no = $this->input->post('assignment_no');

    // $config = [
    //     'upload_path' => './assets/a',
    //     'allowed_types' => 'pdf', 
    //     'file_name' => $rollno."_".$course_code."_".$assignment_no."_".".pdf",
    //     'max_size' => 2048
    //         ];
         
    //      $this->load->library('upload', $config);
    
    //     if($this->upload->do_upload('updateuserfile'))
    //        {
    //         // echo $v;
    //           $data = $this->upload->data();
      

    //            $updated_path = "assets/a/".$data['raw_name'].$data['file_ext'];
    //            // $userdata['pdf_path'] = $pdf_path;

    //             $this->load->model('StudentModel');
    //            //   $this->StudentModel->upload_assignment_pdf($userdata);
    //             $path = $this->StudentModel->get_path($userdata);

    //             $final_path = $path->row()->pdf_path;


    //             // $this->load->helper('file');
    //             // unlink(FCPATH."/".$final_path);

    //             $this->StudentModel->update_pdf_path($userdata,$updated_path);
          
    //            $cc =  $this->input->post('course_code');
    //            $cn = $this->input->post('course_name');
    //            $rollno = $this->input->post('rollno');
    //            $id = $this->session->userdata('student_id');

    //            $createdAssignmentData = $this->StudentModel->getCreatedAssignments($cc);
    //             $uploadedAssignmentData = $this->StudentModel->getUploadedAssignments($id,$cc);
     
    //             // echo "<pre>";
    //             // echo var_dump($uploadedAssignmentData->result());
    //             // echo "</pre>";

    //             $path = $this->StudentModel->get_path($userdata);

    //             $final_path = $path->row()->pdf_path;

    //             unlink($final_path);
     
    //  $this->session->set_flashdata('success','Your assignment has been Updated successfully!');

    // $this->load->view('Student/upload_assignment',['course_code'=>$cc,'course_name'=>$cn,'rollno'=>$rollno,'cad'=>$createdAssignmentData,'uad'=>$uploadedAssignmentData]);
    //        }
    //        else
    //        {
    //          echo "Upload was failed try again file size should be less than 2MB ";
    //        }

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