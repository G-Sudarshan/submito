<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class form_model extends CI_model {
	

	public function saveForm($data)
	{
		$this->db->insert('events',$data);
		$id = $this->db->insert_id();

	}
	

	public function add_event($title, $start_date, $end_date)
	{
		$data = array('title' => $title , 'start_date' => $start_date , 'end_date' => $end_date );
		$this->db->insert('events',$data);

	}

}
