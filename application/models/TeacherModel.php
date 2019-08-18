<?php

class TeacherModel extends CI_Model{

	public function getTeacherData($teacher_id)
	{
		$data = $this->db->select(['id','name','department','staff_id','department_id','username'])->from('tbl_teachers_db')->where('id',$teacher_id)->get();

		return $data->row();

	}
}

?>