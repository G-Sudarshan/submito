<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}


	function import_students()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			$data[] = array(
				'rollno'	=>	$row["rollno"],        		
        		'password'			=>	md5($row["password"]),
        		'department'			=>	$row["department"],
        		'department_id'			=>	$row["department_id"]
			);
		}
		$this->csv_import_model->insert_students($data);

		 $this->session->set_flashdata('success','CSV file of Students imported Successfully !');

		 return redirect('Admin');
	}


	function import_teachers()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			$data[] = array(
				'username'	=>	$row["username"],
				'name'	=>	$row["name"],       
				'staff_id'	=>	$row["staff_id"], 		
        		'password'			=>	md5($row["password"]),
        		'department'			=>	$row["department"],
        		'department_id'			=>	$row["department_id"]
			);
		}
		$this->csv_import_model->insert_teachers($data);

		 $this->session->set_flashdata('success','CSV file of Teachers imported Successfully !');

		 return redirect('Admin');
	}


	function import_courses()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			$data[] = array(
				'course_code'	=>	$row["course_code"],
				'name'	=>	$row["name"],       
				'department_id'	=>	$row["department_id"]
			);
		}
		$this->csv_import_model->insert_courses($data);

		 $this->session->set_flashdata('success','CSV file of Subjects imported Successfully !');

		 return redirect('Admin');
	}
	
		
}

?>
