<?php
class Csv_import_model extends CI_Model
{
	

	function insert_students($data)
	{
		$this->db->insert_batch('tbl_student_db', $data);
	}

	function insert_teachers($data)
	{
		$this->db->insert_batch('tbl_teachers_db', $data);
	}

	function insert_courses($data)
	{
		$this->db->insert_batch('tbl_courses_db', $data);
	}
}
