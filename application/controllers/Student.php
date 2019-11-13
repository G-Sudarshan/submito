<?php

class Student extends MY_Controller{

	public function index()
	{
		$student_id = $this->session->userdata('student_id');

		$this->load->model('StudentModel');

		$studentData = $this->StudentModel->getStudentData($student_id);

		$this->load->view('Student/StudentDashboard',['studentData' => $studentData]);
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
}

?>