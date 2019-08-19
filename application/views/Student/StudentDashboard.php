<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" align="right">
		
		<a class="btn btn-outline-danger" href=<?= base_url('Login/logout'); ?>  >Log out</a>

<br/><br/>

	</div>
	<center><div class="container"><h1>Student Dashboard</h1>

	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
	 <br/><br/>
<?php

echo "Welcome : ".$studentData->name."<br/>";
echo "Your roll no : ".$studentData->rollno."<br/>";
echo "Deapartment : ".$studentData->department."<br/>";
echo "Deapartment id : ".$studentData->department_id."<br/>";
echo "Your mobile no : ".$studentData->mobile_no."<br/>";
?>
<div class="container">
	<br><br>
	<h3>Upload Assignment</h3>
	<br>

<?php

echo form_open_multipart('Student/upload_assignment');

echo form_input(['name'=>'subject','placeholder'=>'Enter Subject','class'=>'form_control']);

$options = array(

	    '0' => 'Assignment no.',
        '1'         => '1',
        '2'         => '2',
        '3'         => '3',
        '4'         => '4',
        '5'         => '5',
        '6'         => '6',
        '7'         => '7',
        '8'         => '8',
        '9'         => '9',
        '10'        => '10',
);


echo form_dropdown('assignment_no', $options, 'Assignment no.');
echo "<br/><br/>";
?>


	
	<div class="col-lg-4" >
<?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
</div>
<?php
echo "<br/><br/>";

echo form_hidden('name',$studentData->name);
echo form_hidden('rollno',$studentData->rollno);

echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']);
echo form_submit(['name'=>'submit','value'=>'Upload','class'=>'btn btn-primary']);

echo form_close();




?>




</div>


</div>




</center>
</body>
</html>