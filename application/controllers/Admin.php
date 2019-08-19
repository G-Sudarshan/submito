<?php 

class Admin extends MY_Controller{

   public function index()
   {

   //	echo "Admin Controller";
   	$this->load->model('Admin_model');
    $clg_name = $this->Admin_model->get_clg_name();
   	$dpt_names = $this->Admin_model->get_dpt_names();
   //	print_r($dpt_names);
   	
   	$this->load->view('Admin/Admin_dashboard',['clg_name' => $clg_name,'dpt_names' => $dpt_names]);
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

   // print_r($staff_names);


   $this->load->view('Admin/manage_department',['crs_names' => $crs_names , 'staff_names' => $staff_names]);
   

   }


   public function create_course()
   {
      $new_crs_name = $this->input->post('new_crs_name');
      $new_crs_code = $this->input->post('new_crs_code');
      

   	  $this->load->model('Admin_model');
   	  $this->Admin_model->create_crs($new_crs_name,$new_crs_code);
   	  $this->session->set_flashdata('crs_msg','Cousre created successfully !');

   	  	

   	 return redirect('Admin/mng_dpt');


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
     $this->load->view('Admin/Add_notification');
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
      

      $pdf_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
      $post['pdf_path'] = $pdf_path;

      $this->load->model('Admin_model');
      $this->Admin_model->add_notification($post);
          
          echo "Notification uploaded successfully ! ";
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

      public function add_staff()
   {
      $new_staff_name = $this->input->post('new_staff_name');
      $new_staff_id = $this->input->post('new_staff_id');
      $dname = $this->input->post('dname');
      $d_id = $this->input->post('d_id');

      $this->load->model('Admin_model');
      $this->Admin_model->add_staff($new_staff_name,$new_staff_id,$d_id,$dname);
      $this->session->set_flashdata('stf_msg','Staff Added Successfully !');

      return redirect('Admin/mng_dpt');

   }

   public function edit_staff()
   {
     $staff_id = $this->input->post('staff_id');
     $this->load->model('Admin_model');
     $data = $this->Admin_model->getStaffDataToEdit($staff_id);
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

    $id = $this->input->post('staff_id');
    $this->load->model('Admin_model');
    $this->Admin_model->upadateStaffData($userdata,$id);

    $this->session->set_flashdata('stf_msg','Staff Information Updated Successfully !');

      return redirect('Admin/mng_dpt');

   }

   public function load_add_admin()
   {
    $this->load->view('Admin/add_admin');
   }

   public function add_admin()
   {
    
   }

}

?>
