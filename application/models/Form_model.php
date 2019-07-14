<?php

class form_model extends CI_model {
	

	public function saveForm($data)
	{
		$this->db->insert('calendar',$data);
		$id = $this->db->insert_id();

	}
	

	public function add_event($title, $body, $date)
	{
		$data = array('content' => $title , 'body' => $body , 'date' => $date );
		$this->db->insert('calendar',$data);

	}

}
?>