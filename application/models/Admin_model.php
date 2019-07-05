<?php

class Admin_model extends CI_Model{

	public function get_clg_name()
	{
		$clg_name = $this->db->select('value')->from('tbl_info')->where('title','college_name')->get();

		return $clg_name->row()->value;

	}

	public function set_clg_name($new_clg_name)
	{      
		$this->db->where('title', 'college_name');
        return $this->db->update('tbl_info',['value' => $new_clg_name]);

		
	}
}

?>