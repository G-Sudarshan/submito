<?php 

class Login extends MY_Controller{

   public function index()
   {

   //	echo "Admin Controller";
   	
   //	print_r($dpt_names);

      $this->load->model('Admin_model');
     
     $n_data = $this->Admin_model->fetch_notifications();
     
    /* print_r($n_data);
     echo $n_data->row()->title;
     echo $n_data->row()->pdf_path; */
    // $this->load->view('Admin/site_home',['n_data' => $n_data]);
   	
   	$this->load->view('Login',['n_data' => $n_data]);
   }

   public function admin_login()
   {
     
      $this->form_validation->set_rules('username','Username','required');
      $this->form_validation->set_rules('password','Password','required|min_length[8]');

      if($this->form_validation->run()==TRUE)
      {
         $userdata = array(
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password'),
                     );
          $this->load->model('LoginModel');

         $user_id = $this->LoginModel->admin_login($userdata);
         
         if($user_id)
         {
            $this->session->set_userdata('admin_id',$user_id);
            $this->session->set_flashdata("success","You are logged in");
            redirect('Admin');
         }
         else
         {
            $this->session->set_flashdata("error","No such account exists in database");
            redirect('Login');
         }
      }
      else
      {
         $this->session->set_flashdata('login_failed','Invalid username and password');
         return redirect('Login');
      }

   }

   public function teacher_login()
   {
      $this->form_validation->set_rules('username','Username','required');
      $this->form_validation->set_rules('password','Password','required|min_length[8]');

      if($this->form_validation->run()==TRUE)
      {
         $userdata = array(
                        'username' => $this->input->post('username', TRUE),
                        'password' => $this->input->post('password', TRUE),
                     );
         $this->load->model('LoginModel');

         $user_id = $this->LoginModel->teacher_login($userdata);
         if($user_id)
         {
            $this->session->set_userdata('teacher_id',$user_id);
            $this->session->set_flashdata('success',"You are logged in");

            return redirect('Teacher');
         }
         else
         {
            $this->session->set_flashdata("error","No such account exists in database");
            redirect('Login');
         }
      }
       else
      {
         $this->session->set_flashdata('login_failed','Invalid username and password');
         return redirect('Login');
      }

   }

   public function student_login()
   {
      $this->form_validation->set_rules('username','Username','required');
      $this->form_validation->set_rules('password','Password','required|min_length[8]');

      if($this->form_validation->run()==TRUE)
      {
         $userdata = array(
                        'rollno' => $this->input->post('username', TRUE),
                        'password' => $this->input->post('password', TRUE),
                     );
         $this->load->model('LoginModel');
         $user_id = $this->LoginModel->student_login($userdata);
         if($user_id)
         {
            $this->session->set_userdata('student_id',$user_id);
            $this->session->set_flashdata('success',"You are logged in");

            return redirect('Student');
         }
         else
         {
            $this->session->set_flashdata("error","No such account exists in database");
            redirect('Login');
         }
      }
       else
      {
         $this->session->set_flashdata('login_failed','Invalid username and password');
         return redirect('Login');
      }    

   }

   public function change_password_admin()
   {
     $this->load->view('Admin/change_password_admin');

   }

   public function update_admin_password()
   {
      $admin_id = $this->session->userdata('admin_id');
      $userdata = array(
         'password' => $this->input->post('new_password')

      );

      $this->load->model('LoginModel');
      $this->LoginModel->change_password_admin($userdata,$admin_id);

      $this->session->set_flashdata("success","Password Updated Successfully");
      return redirect('Admin');

   }

}

?>