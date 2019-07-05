<?php 

class Admin extends MY_Controller{

   public function index()
   {

   //	echo "Admin Controller";
   	$this->load->model('Admin_model');
   	$clg_name = $this->Admin_model->get_clg_name();
	$this->load->view('Admin/Admin_dashboard',['clg_name' => $clg_name]);
   }

   public function update_clg_name()
   {

   	   $new_clg_name = $this->input->post('new_clg_name');
   	   $this->load->model('Admin_model');
       
       $this->Admin_model->set_clg_name($new_clg_name);
       
       $this->session->set_flashdata('feedback','College name updated successfully !');
       $this->session->set_flashdata('feedback_class','alert alert-dismissible alert-success');

    return redirect('Admin/index');
   }

}

?>
