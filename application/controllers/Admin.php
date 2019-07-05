<?php 

class Admin extends MY_Controller{

   public function index()
   {

   //	echo "Admin Controller";
	$this->load->view('Admin/Admin_dashboard');
   }

}

?>
