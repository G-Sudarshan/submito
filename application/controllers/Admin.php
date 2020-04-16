<?php 

class Admin extends MY_Controller{

   public function index()
   {

   //	echo "Admin Controller";
   	$this->load->model('Admin_model');
    $clg_name = $this->Admin_model->get_clg_name();
   	$dpt_names = $this->Admin_model->get_dpt_names();
    $id = $this->session->userdata('admin_id');
    $admin_data = $this->Admin_model->get_admin_info($id);
   //	print_r($dpt_names);
   	
   	$this->load->view('Admin/Admin_dashboard',['clg_name' => $clg_name,'dpt_names' => $dpt_names,'admin'=>$admin_data]);
   }

   public function update_clg_name()
   {

   	   $new_clg_name = $this->input->post('new_clg_name');
   	   $this->load->model('Admin_model');
       
       $this->Admin_model->set_clg_name($new_clg_name);
       
       $this->session->set_flashdata('feedback','College name updated successfully !');
       

    return redirect('Admin/index');
   }

   public function create_dpt()
   {
      $new_dpt_name = $this->input->post('new_dpt_name');
      $new_dpt_id = $this->input->post('new_dpt_id');
   	  $this->load->model('Admin_model');
   	  $this->Admin_model->create_dpt($new_dpt_name,$new_dpt_id);
   	  $this->session->set_flashdata('dpt_msg','Department created successfully !');
   	  return redirect('Admin/index');

   }

   public function mng_dpt()
   {
   	
    $d_id = $this->session->userdata('d_id');

    //echo $d_id;

   	$this->load->model('Admin_model');

   	$crs_names = $this->Admin_model->get_crs_names();  
    $staff_names = $this->Admin_model->get_staff_names($d_id);
    $student_names = $this->Admin_model->get_student_names($d_id);

   // print_r($staff_names);


   $this->load->view('Admin/manage_department',['crs_names' => $crs_names , 'staff_names' => $staff_names,'students' => $student_names]);
   

   }


   public function create_course()
   {
      $new_crs_name = $this->input->post('new_crs_name');
      $new_crs_code = $this->input->post('new_crs_code');
      $dname = $this->input->post('dname');
      $d_id = $this->input->post('d_id');
      

   	  $this->load->model('Admin_model');
   	  $this->Admin_model->create_crs($new_crs_name,$new_crs_code,$d_id);
   	  

   	  	
      $courses = $this->Admin_model->get_department_courses($d_id);
      $this->session->set_flashdata('success','Course created successfully !');

      $this->load->view('Admin/manage_courses',['courses'=>$courses,'dname'=>$dname,'d_id'=>$d_id]);
   	 
   }

   public function set_dpt_session()
   {
      $dptname = $this->input->post('dname');
      $dpt_id = $this->input->post('d_id');
      
       $dp_data = array('dname' => $dptname,'d_id' => $dpt_id);
      
       $this->session->set_userdata($dp_data);

      return redirect('Admin/mng_dpt');


   }

   public function notification()
   {
     $this->load->model('Admin_model');
     $data = $this->Admin_model->getAllNotifications();
     $this->load->view('Admin/Add_notification',['data'=>$data]);
   }

   public function add_notification()
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

   public function site_home()
   {
     $this->load->model('Admin_model');
     
     $n_data = $this->Admin_model->fetch_notifications();
     
    /* print_r($n_data);
     echo $n_data->row()->title;
     echo $n_data->row()->pdf_path; */
     $this->load->view('Admin/site_home',['n_data' => $n_data]);
   }

   // -----------------JSON FUNCTIONS OF TEACHER------------------//

   public function getUsersT()
   {
    //echo FCPATH;
    return json_decode(file_get_contents(FCPATH.'assets/j/teachers.json'), true);
   }

   public function createUserT($data,$userId)
    {
      $users = $this->getUsersT();

      $data['id'] = $userId;

      $users[] = $data;

      $this->putJsonT($users);

      return $data; 
    }

    public function putJsonT($users)
    {
      //base_url('assets/js/bootstrap.min.js');
      file_put_contents(FCPATH.'assets/j/teachers.json', json_encode($users,JSON_PRETTY_PRINT));

    }



   //-----------------------------------------------------------------//

      public function add_staff()
   {
      $new_staff_name = $this->input->post('new_staff_name');
      $new_staff_pw = md5($this->input->post('new_staff_pw'));      
      $new_staff_username = $this->input->post('new_staff_username');
      $new_staff_id = $this->input->post('new_staff_id');
      $dname = $this->input->post('dname');
      $d_id = $this->input->post('d_id');
      $dname = $this->input->post('dname');

      $this->load->model('Admin_model');

     $sid = $this->Admin_model->add_staff($new_staff_name,$new_staff_id,$d_id,$dname,$new_staff_pw,$new_staff_username);

  
    $id = $sid->row()->id;
     
    $data = [];

    //$this->createUserT($data,$id);

    $teachers = $this->Admin_model->get_staff_names($d_id);

    $this->load->view('Admin/manage_teachers',['teachers'=>$teachers,'dname'=>$dname,'d_id'=>$d_id]);
   }

   public function edit_staff()
   {
     $id = $this->input->post('id');
     $this->load->model('Admin_model');
     $data = $this->Admin_model->getStaffDataToEdit($id);
     $this->load->view('Admin/edit_staff',['data'=>$data]);
   }

   public function update_staff()
   {
    $userdata = array(
      'name' => $this->input->post('staff_name'),
      'staff_id' => $this->input->post('staff_id'),
      'department' => $this->input->post('staff_department'),
      'department_id' => $this->input->post('staff_department_id'),

       );

    $id = $this->input->post('id');
    $this->load->model('Admin_model');
    $this->Admin_model->upadateStaffData($userdata,$id);

    $this->session->set_flashdata('stf_msg','Staff Information Updated Successfully !');

      return redirect('Admin/mng_dpt');

   }

   

  

   

   public function load_update_teacher_password()
   {

      $userdata = array(
      'username' => $this->input->post('username'),
      
      'department' => $this->input->post('department'),
      'id' => $this->input->post('id')
      
       );

      $this->load->view('Teacher/change_password',['teacher'=>$userdata]);
   }

    public function load_change_teacher_password()
   {
    $this->load->model('Admin_model');
    $data = $this->Admin_model->get_teachers_data();
    return redirect('Admin/loadRecordT');
   }

    public function loadRecordT($rowno=0){

   
    $this->load->helper('url');
    $this->load->library('pagination');
     // Search text
    $search_text = "";
    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');
      $this->session->set_userdata(array("search"=>$search_text));
    }else{
      if($this->session->userdata('search') != NULL){
        $search_text = $this->session->userdata('search');
      }
    }

    // Row per page
    $rowperpage = 10;

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
        
        // All records count
        $this->load->model('Admin_model');
        $allcount = $this->Admin_model->getrecordCountT($search_text);

        // Get  records
        $users_record = $this->Admin_model->getDataT($rowno,$rowperpage,$search_text);
        
        // Pagination Configuration
        $config['base_url'] = base_url().'index.php/Admin/loadRecordT';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
    // $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close']  = '</span></li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tag_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tag_close']  = '</span></li>';

    // Initialize
    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;


    // Load view
    $this->load->view('Admin/change_teacher_password',$data);
    
  }


   public function load_change_student_password()
   {
    $this->load->model('Admin_model');
    $data = $this->Admin_model->get_students_data();
    //$this->load->view('Admin/change_student_password',['students'=>$data]);

    return redirect('Admin/loadRecord');
   }

   public function loadRecord($rowno=0){

   
    $this->load->helper('url');
    $this->load->library('pagination');
     // Search text
    $search_text = "";
    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');
      $this->session->set_userdata(array("search"=>$search_text));
    }else{
      if($this->session->userdata('search') != NULL){
        $search_text = $this->session->userdata('search');
      }
    }

    // Row per page
    $rowperpage = 10;

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
        
        // All records count
        $this->load->model('Admin_model');
        $allcount = $this->Admin_model->getrecordCount($search_text);

        // Get  records
        $users_record = $this->Admin_model->getData($rowno,$rowperpage,$search_text);
        
        // Pagination Configuration
        $config['base_url'] = base_url().'index.php/Admin/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
    // $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close']  = '</span></li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tag_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tag_close']  = '</span></li>';

    // Initialize
    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;


    // Load view
    $this->load->view('Admin/change_student_password',$data);
    
  }

   public function load_update_student_password()
   {
      $userdata = array(
      'name' => $this->input->post('name'),
      'rollno' => $this->input->post('rollno'),
      'department' => $this->input->post('department'),
      'id' => $this->input->post('id')
      
       );

      $this->load->view('Student/change_password',['student'=>$userdata]);

   }

   // -----------------JSON FUNCTIONS OF STUDENT------------------//

   public function getUsersS()
   {
    //echo FCPATH;
    return json_decode(file_get_contents(FCPATH.'assets/j/students.json'), true);
   }

   public function createUserS($data,$userId)
    {
      $users = $this->getUsersS();

      $data['id'] = $userId;

      $users[] = $data;

      $this->putJsonS($users);

      return $data; 
    }

    public function putJsonS($users)
    {
      //base_url('assets/js/bootstrap.min.js');
      file_put_contents(FCPATH.'assets/j/students.json', json_encode($users,JSON_PRETTY_PRINT));

    }



   //-----------------------------------------------------------------//

   public function add_student()
   {
      $new_student_rollno = $this->input->post('new_student_rollno');
      $new_student_password = md5($this->input->post('new_student_password'));      
            
      $dname = $this->input->post('dname');
      $d_id = $this->input->post('d_id');

      $this->load->model('Admin_model');
      $sid = $this->Admin_model->add_student($new_student_rollno,$new_student_password,$dname,$d_id);
        
     $id = $sid->row()->id;
     
     //$data = [];

     //$this->createUserS($data,$id);

     $students = $this->Admin_model->get_department_students($d_id);    

     $this->session->set_flashdata('success','Student Added Successfully !');

     $this->load->view('Admin/manage_students',['students'=>$students,'dname'=>$dname,'d_id'=>$d_id]);


   }

   public function delete_student()
   {
     $id = $this->input->post('id');
     $this->load->model('Admin_model');

     $dname = $this->input->post('dname');
      $d_id = $this->input->post('d_id');

     $this->Admin_model->delete_student($id);

     $students = $this->Admin_model->get_department_students($d_id);    

     $this->session->set_flashdata('success','Student Deleted Successfully !');

     $this->load->view('Admin/manage_students',['students'=>$students,'dname'=>$dname,'d_id'=>$d_id]);
   }

   public function delete_course()
   {
     $id = $this->input->post('id');
     $this->load->model('Admin_model');

     $this->Admin_model->delete_course($id);

      $dname = $this->input->post('dname');
    $d_id = $this->input->post('d_id');

    $courses = $this->Admin_model->get_department_courses($d_id);

   
      $this->session->set_flashdata('success','Course Deleted Successfully !');

      $this->load->view('Admin/manage_courses',['courses'=>$courses,'dname'=>$dname,'d_id'=>$d_id]);

   }

   public function update_admin()
   {
    $userdata = array(
      'name' => $this->input->post('admin_name'),
      'email' => $this->input->post('admin_email'),
      'department' => $this->input->post('admin_department'),
      'mobile_no' => $this->input->post('admin_mobile'),

       );

    $id = $this->session->userdata('admin_id');
    $this->load->model('Admin_model');
    $this->Admin_model->upadateAdmin($userdata,$id);

    $this->session->set_flashdata('feedback','Your Information has been Updated Successfully !');

      return redirect('Admin');

   }

   public function delete_notification()
   {
    $this->load->model('Admin_model');
    $id = $this->input->post('id');
    $path = $this->input->post('path');
    $this->load->helper('file');
                //echo FCPATH."/".$final_path;
    unlink(FCPATH."/".$path);

    $this->Admin_model->delete_notification($id);
    $this->session->set_flashdata('success','Notification deleted successfully !');
        return redirect('Admin/notification');

   }

   public function add_admin()
   {
    $userdata = array(
      'username' => $this->input->post('name'),
      'password' => md5($this->input->post('password'))

       );

    $this->load->model('Admin_model');
    $this->Admin_model->add_admin($userdata);

    $this->session->set_flashdata('feedback','Admin has been added Successfully !');

      return redirect('Admin');

   }

   public function resetotp()
   {
    $this->load->model('Admin_model');
     $id = $this->session->userdata('admin_id');
     $adminemail = $this->Admin_model->getEmailAdmin($id);
     if($adminemail==NULL)
     {
       $this->session->set_flashdata("failure","To reset the system first set your email through Update My Info button on admin dashboard ");
        return redirect('Admin');
     }else{
     $this->session->set_userdata('email',$adminemail);
     return redirect('Email/sendemailOTP');
     }
   }

   public function single_admin_login()
   {
    $this->load->view('Admin/single_admin_login');
   }

   public function load_reset_key()
   {
    $this->load->view('Admin/reset_key');
   }
   public function verify_reset_key()
   {

      $key = $this->input->post('key');
      $rk = "176161176154176114176103";
      if($key==$rk)
      {
        $this->load->model('Admin_model');
        $id = $this->session->userdata('admin_id');

        $this->load->helper('file');

        delete_files(FCPATH.'assets/a');
        delete_files(FCPATH.'assets/notes');
        delete_files(FCPATH.'uploads');
        delete_files(FCPATH.'zips');

        delete_files(FCPATH.'assets/j/students');
        delete_files(FCPATH.'assets/j/teachers');

      

        $name = $this->Admin_model->get_admin_name($id);
        $this->Admin_model->reset_the_system($name);
        
        echo "System resetted successfully! Your new admin credentials are  <br/>username : submito_admin <br/>  password : gpncm1234<br/><br/>";

        echo "Go to <a href=".base_url('Login')." >Home</a> ";
      }
      else{

     echo "Your attempt to reset system has been failed ..... please try again!";
      }
   }


   public function load_manage_students()
   {
    $this->load->model('Admin_model');
    $dname = $this->input->post('dname');
    $d_id = $this->input->post('d_id');

    $students = $this->Admin_model->get_department_students($d_id);

    $this->load->view('Admin/manage_students',['students'=>$students,'dname'=>$dname,'d_id'=>$d_id]);
   }

   public function load_manage_teachers()
   {
    $this->load->model('Admin_model');
    $dname = $this->input->post('dname');
    $d_id = $this->input->post('d_id');

    $teachers = $this->Admin_model->get_staff_names($d_id);

    $this->load->view('Admin/manage_teachers',['teachers'=>$teachers,'dname'=>$dname,'d_id'=>$d_id]);

   }

   public function load_manage_courses()
   {
    $this->load->model('Admin_model');
    $dname = $this->input->post('dname');
    $d_id = $this->input->post('d_id');

    $courses = $this->Admin_model->get_department_courses($d_id);

    $this->load->view('Admin/manage_courses',['courses'=>$courses,'dname'=>$dname,'d_id'=>$d_id]);
   }

   // public function load_allocate_subjects_to_teacher()
   // {
   //  $teacher_id = $this->input->post('id');
    
   // }


}

?>
