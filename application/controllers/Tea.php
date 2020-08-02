<?php

class Tea extends MY_Controller
{

      public function index()
      {
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
            $this->load->view('teacher_login');
            $this->load->view('footer');
      }
}
