<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class CaledarController extends CI_Controller {
   
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $data['result'] = $this->db->get("events")->result();
   
        foreach ($data['result'] as $key => $value) {
            $data['data'][$key]['title'] = $value->title;
            $data['data'][$key]['start'] = $value->start_date;
            $data['data'][$key]['end'] = $value->end_date;
            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }           
        $this->load->view('my_calendar', $data);
    }

        public function form_as() {
        

         $this->load->view('form_as.php');
    }
    public function add_event()
    {
    
        $title = $this->input->post('title');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

      $this->load->model('form_model');

       $this->form_model->add_event($title,$start_date,$end_date);

        $this->session->set_flashdata('message',"Event added Successfully");

        return redirect('CaledarController');
       
    }
}