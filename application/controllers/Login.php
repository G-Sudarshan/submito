<?php

class Login extends MY_Controller
{

   public function index()
   {
      $this->load->model('LoginModel');
      $n_data = $this->LoginModel->fetch_notifications();
      $clgname = $this->LoginModel->get_clg_name();

      $this->load->view('header', ['clgname' => $clgname]);
      $this->load->view('Home', ['n_data' => $n_data]);
   }
   public function loginpage()
   {

      //---- IF USER IS LOGGED IN HE WILL BE REDIRECTED TO RESPECTIVE DASHBOARD ------//

      if ($this->session->userdata('student_id'))
         return redirect('Student');


      if ($this->session->userdata('teacher_id'))
         return redirect('Teacher');

      if ($this->session->userdata('admin_id'))
         return redirect('Admin');

      //------------------------------------------------------------------------------//

      $this->load->model('LoginModel');
      $clgname = $this->LoginModel->get_clg_name();
      $this->load->view('header', ['clgname' => $clgname]);
      $this->load->view('Login');
      $this->load->view('footer');
   }

   public function admin_login()
   {

      $userdata = array(
         'username' => $this->input->post('username'),
         'password' => md5($this->input->post('password')),
      );
      $this->load->model('LoginModel');

      $user_id = $this->LoginModel->admin_login($userdata);

      if ($user_id) {
         $this->session->set_userdata('admin_id', $user_id);
         $this->session->set_flashdata("success", "You are logged in");
         return redirect('Admin');
      } else {
         $this->session->set_flashdata("login_failed", "No such account exists in database");
         return redirect('Adm');
      }
   }

   public function teacher_login()
   {

      $userdata = array(
         'username' => $this->input->post('username', TRUE),
         'password' => md5($this->input->post('password', TRUE)),
      );
      $this->load->model('LoginModel');

      $user_id = $this->LoginModel->teacher_login($userdata);
      if ($user_id) {
         $this->session->set_userdata('teacher_id', $user_id);
         $this->session->set_flashdata('success', "You are logged in");

         return redirect('Teacher');
      } else {
         $this->session->set_flashdata("login_failed", "No such account exists in database");
         return redirect('Tea');
      }
   }

   public function student_login()
   {

      $userdata = array(
         'rollno' => $this->input->post('username'),
         'password' => md5($this->input->post('password'))
      );
      $this->load->model('LoginModel');
      $roll = $this->input->post('username');
      $user_id = $this->LoginModel->student_login($userdata);

      if ($user_id) {
         $this->session->set_userdata('student_id', $user_id);
         $this->session->set_userdata('roll', $roll);
         $this->session->set_flashdata('success', "You are logged in");

         return redirect('Student');
      } else {
         $this->session->set_flashdata("login_failed", "No such account exists in database");
         return redirect('Login/loginpage');
      }
   }

   public function aboutus()
   {
      $this->load->model('LoginModel');
      $clgname = $this->LoginModel->get_clg_name();
      $this->load->view('header', ['clgname' => $clgname]);
      $this->load->view('aboutus');
   }

   public function contactus()
   {
      $this->load->model('LoginModel');
      $clgname = $this->LoginModel->get_clg_name();
      $this->load->view('header', ['clgname' => $clgname]);
      $this->load->view('contactus');
   }

   public function terms()
   {
      $this->load->model('LoginModel');
      $clgname = $this->LoginModel->get_clg_name();
      $this->load->view('header', ['clgname' => $clgname]);
      $this->load->view('terms_and_conditions');
   }

   public function privacy()
   {
      $this->load->model('LoginModel');
      $clgname = $this->LoginModel->get_clg_name();
      $this->load->view('header', ['clgname' => $clgname]);
      $this->load->view('privacy_policy');
   }

   public function logout()
   {
      $this->session->sess_destroy();
      return redirect('Login');
   }



   public function change_password_admin()
   {
      $this->load->model('Admin_model');
      $id = $this->session->userdata('admin_id');
      $adminemail = $this->Admin_model->getEmailAdmin($id);
      if ($adminemail == NULL) {
         $this->session->set_flashdata("failure", "To change the Password first set your email through Update My Info button on admin dashboard ");
         return redirect('Admin');
      } else {
         $this->session->set_userdata('email', $adminemail);
         return redirect('Email/sendemail');
      }
   }
   public function update_admin_password()
   {
      $admin_id = $this->session->userdata('admin_id');
      $userdata = array(
         'password' => md5($this->input->post('new_password'))
      );
      $this->load->model('LoginModel');
      $this->LoginModel->change_password_admin($userdata, $admin_id);
      $this->session->set_flashdata("success", "Password Updated Successfully");
      return redirect('Admin');
   }

   public function change_password_teacher()
   {
      $this->load->model('TeacherModel');
      $id = $this->session->userdata('teacher_id');
      $teacheremail = $this->TeacherModel->getTeacherEmail($id);
      if ($teacheremail == NULL) {
         $this->session->set_flashdata("failure", "To change the Password first set your email through Update My Info button on admin dashboard ");
         return redirect('Teacher');
      } else {
         $this->session->set_userdata('email', $teacheremail);
         return redirect('Teacher/sendemail');
      }
   }
   public function update_teacher_password()
   {
      $id = $this->input->post('id');
      $userdata = array(
         'password' => md5($this->input->post('new_password'))

      );

      $this->load->model('LoginModel');
      $this->LoginModel->change_password_teacher($userdata, $id);

      $this->session->set_flashdata("success", "Password Updated Successfully");
      if ($this->session->userdata('admin_id'))
         return redirect('Admin');
      else
         return redirect('Teacher');
   }

   public function update_student_password()
   {
      $id = $this->input->post('id');
      $userdata = array(
         'password' => md5($this->input->post('new_password'))

      );

      $this->load->model('LoginModel');
      $this->LoginModel->change_password_student($userdata, $id);

      $this->session->set_flashdata("success", "Password Updated Successfully");
      if ($this->session->userdata('admin_id'))
         return redirect('Admin');
      else
         return redirect('Student');
   }

   public function single_admin_login()
   {
      $userdata = array(
         'username' => $this->input->post('username'),
         'password' => md5($this->input->post('password')),
      );
      $this->load->model('LoginModel');

      $user_id = $this->LoginModel->admin_login($userdata);

      if ($user_id) {
         $this->session->set_userdata('admin_id', $user_id);
         $this->session->set_flashdata("success", "You are logged in");
         return redirect('Admin/load_reset_key');
      } else {
         $this->session->set_flashdata("login_failed", "No such account exists in database");
         return redirect('Login/loginpage');
      }
   }

   public function change_password_student()
   {
      $this->load->model('StudentModel');
      $id = $this->session->userdata('student_id');
      $teacheremail = $this->StudentModel->getStudentEmail($id);
      if ($teacheremail == NULL) {
         $this->session->set_flashdata("failure", "To change the Password first set your email through Update My Info button on admin dashboard ");
         return redirect('Student');
      } else {
         $this->session->set_userdata('email', $teacheremail);
         return redirect('Student/sendemail');
      }
   }

   public function load_calendar()
   {

      $data['result'] = $this->db->get("events")->result();

      foreach ($data['result'] as $key => $value) {
         $data['data'][$key]['title'] = $value->title;
         $data['data'][$key]['start'] = $value->start_date;
         $data['data'][$key]['end'] = $value->end_date;
         $data['data'][$key]['backgroundColor'] = "#00a65a";
      }

      $this->load->model('LoginModel');
      $clgname = $this->LoginModel->get_clg_name();
      $this->load->view('header', ['clgname' => $clgname]);
      $this->load->view('calendar', $data);
      //$this->load->view('footer'); 
   }

   public function notification()
   {
      $this->load->model('LoginModel');
      $data = $this->LoginModel->getAllNotifications();

      $clgname = $this->LoginModel->get_clg_name();
      $this->load->view('header', ['clgname' => $clgname]);

      $this->load->view('notification', ['data' => $data]);
      $this->load->view('footer');
   }
}
