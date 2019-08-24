<!DOCTYPE html>
<html>
<head>
	<title>Edit Staff Information</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" align="center">

    <h2>Edit Staff Information</h2>
    <div class="container" align="left">

    <a class="btn btn-info" href=<?= base_url('Admin/mng_dpt') ?> >Back to Department Admin Dashboard</a>
    
  </div>
	<?php echo form_open('Admin/update_staff'); ?>

    	

	

	<?php 

	
	echo "name of staff :  ";
	echo form_input(['name'=>'staff_name','placeholder'=>' Name of satff','class'=>'form-control','value'=>set_value('staff_name',$data->name)]);
	 echo "<br/><br/>"; 
	
	echo "id of staff :  ";
	echo form_input(['name'=>'staff_id','placeholder'=>' staff id ','class'=>'form-control','value'=>set_value('staff_id',$data->staff_id)]); 
    echo "<br/><br/>";

    echo "department of staff :  ";
	echo form_input(['name'=>'staff_department','placeholder'=>' staff id ','class'=>'form-control','value'=>set_value('staff_department',$data->department)]); 
    echo "<br/><br/>";

    echo "department id of staff :  ";
	echo form_input(['name'=>'staff_department_id','placeholder'=>' staff id ','class'=>'form-control','value'=>set_value('staff_department',$data->department_id)]); 
    echo "<br/><br/>";
    
	echo form_submit(['name'=>'submit','value'=>'Update Information','class'=>'btn btn-primary']); 

	echo form_close();
	?>
</div>

</body>
</html>