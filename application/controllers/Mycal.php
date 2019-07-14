<?php


class Mycal extends MY_Controller {

	public function index($year = NULL , $month = NULL)
	{
	    $this->load->model('Mycal_model');
		$data['calender'] = $this->Mycal_model->getcalender($year , $month);
		$this->load->view('Calview', $data);
	}
	public function form_as() {
		
		 $this->load->view('Admin/Form_as.php');
	}
	public function add_event()
	{
		$title = $this->input->post('title');
		$body = $this->input->post('body');
		$date = $this->input->post('date');

		$this->load->model('Form_model');

		$this->Form_model->add_event($title, $body, $date);

		$this->session->set_flashdata('message',"Event added Successfully");

		return redirect('Mycal');
	}
}
