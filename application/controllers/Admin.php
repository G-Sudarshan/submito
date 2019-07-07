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
   	//echo $dname."<br/>".$d_id;
   	$this->load->model('Admin_model');

   	$crs_names = $this->Admin_model->get_crs_names();  

    $this->load->view('Admin/manage_department',['crs_names' => $crs_names]);

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

}

?>
