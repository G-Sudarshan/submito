<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email1 extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		

	}
	public function index(){
		$this->load->view('contactus');
	}
	public function sendemail(){
		$subject = $this->input->post('subject');

		$name = $this->input->post('name');
		$email1 = $this->input->post('email1');

		$address = $this->input->post('address');
		$contact_no = $this->input->post('contact_no');

		$message = $this->input->post('message');

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
	    $this->email->to('team.submito@gmail.com');
	   // $this->email->to($email);// change it to yours
	    $this->email->subject($subject);
	    
	  //  $this->email->name($name);
	  //  $this->email->email1($email1);
	    //$this->email->address($address);
	    //$this->email->contact_no($contact_no);

	    $this->email->message('my message is :'."\r".$message."\r\n".'My Name is :'."\r".$name."\r\n".'My contact number is :'."\r".$contact_no."\r\v".'My email is : '.$email1."\r\n".'Thanks for visiting');
	    if($this->email->send()){
	    	$this->session->set_flashdata('success', 'Message Sent Succesfully');
	    }
	    else{
	    	$this->session->set_flashdata('failure', show_error($this->email->print_debugger()));
	     	
	    }

	    return redirect('Login/contactus');

	}
}
