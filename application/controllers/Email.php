<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		$this->load->view('email_form');
	}
	
		public function verfiy()
    {
        // Load the form to verfiy OTP
        $this->session->set_flashdata('message', 'OTP has been sent to '.$this->session->userdata('email').' Successfully...');
        $this->load->view('Admin/otpverify');
    }

    public function verfiyreset()
    {
    	 $this->session->set_flashdata('message', 'OTP has been sent to '.$this->session->userdata('email').' Successfully...');
        $this->load->view('Admin/otpverifyreset');

    }
    public function verify_otp()
    {
        // Get the otp value 
        $user_otp = $this->input->post('otp');
        if ($user_otp == $this->session->userdata('user_otp')) {
            $this->load->view('Admin/change_password_admin');
            
        } 
        else {
          $this->session->set_flashdata('failure', 'Incorrect OTP');
          $this->load->view('Admin/otpverify');    
              }
    //return redirect('Email');

        
    }

    public function verify_otp_reset()
    {
    	$user_otp = $this->input->post('otp');
        if ($user_otp == $this->session->userdata('user_otp')) {
            $this->load->view('Admin/single_admin_login');
            
        } 
        else {
          $this->session->set_flashdata('failure', 'Incorrect OTP');
          $this->load->view('Admin/otpverifyreset');    
              }

    }

	public function sendemail(){
		$subject = 'OTP for SubMito | GP Nashik | Admin ';
		$otp = $this->generate_otp();
		$this->session->set_userdata('user_otp',$otp);
		$message = urlencode("Otp number is ".$otp);
		$email = $this->session->userdata('email');

//$rndno=rand(1000, 9999);
//$message = urlencode(“OTP number.".$rndno);
	   	$config = Array(
	  		'protocol' => 'smtp',
	  		'smtp_host' => 'ssl://smtp.googlemail.com',
	  		'smtp_port' => 465,
	  		'smtp_user' => 'gpnashik8@gmail.com', // change it to yours
	  		'smtp_pass' => 'Gpnashik@2001', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'iso-8859-1',
	  		'wordwrap' => TRUE
		);

	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from($config['smtp_user']); // change it to yours
	    $this->email->to($email);// change it to yours
	    $this->email->subject($subject);
	    $this->email->message($message);

	    if($this->email->send()){
	    	
	    	 return redirect('email/verfiy');
	    }
	    else{
	    	$this->session->set_flashdata('message', show_error($this->email->print_debugger()));
	     	
	    }

	   // echo "the variable : ".$otp."<br/>The sesion variable : ".$this->session->userdata('user_otp');
	    // Redirect to the verfication page
        return redirect(base_url('email/verfiy'));
    }

    public function sendemailOTP(){
		$subject = 'RESET SYSEM OTP [ SUbMito! ]  ';
		$otp = $this->generate_otp();
		$this->session->set_userdata('user_otp',$otp);
		$message = urlencode("Otp number is ".$otp);
		$email = $this->session->userdata('email');

//$rndno=rand(1000, 9999);
//$message = urlencode(“OTP number.".$rndno);
	   	$config = Array(
	  		'protocol' => 'smtp',
	  		'smtp_host' => 'ssl://smtp.googlemail.com',
	  		'smtp_port' => 465,
	  		'smtp_user' => 'gpnashik8@gmail.com', // change it to yours
	  		'smtp_pass' => 'Gpnashik@2001', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'iso-8859-1',
	  		'wordwrap' => TRUE
		);

	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from($config['smtp_user']); // change it to yours
	    $this->email->to($email);// change it to yours
	    $this->email->subject($subject);
	    $this->email->message($message);

	    if($this->email->send()){
	    	
	    	 return redirect('email/verfiyreset');
	    }
	    else{
	    	$this->session->set_flashdata('message', show_error($this->email->print_debugger()));
	     	
	    }

	   // echo "the variable : ".$otp."<br/>The sesion variable : ".$this->session->userdata('user_otp');
	    // Redirect to the verfication page
        return redirect(base_url('email/verfiy'));
    }



 private function generate_otp(int $length = 6)
    {
        $otp = "";
        $numbers = "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        return $otp;
    }
	
}
