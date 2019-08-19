<!DOCTYPE html>
<html>
<head>
	<title>Teacher Dashboard </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container" align="right">
		
		<a class="btn btn-outline-danger" href=<?= base_url('Login/logout'); ?>  >Log out</a>

<br/><br/>

	</div>

	<center><div class="container">

<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
    
<h1> Teacher Dashboard </h1>
<?php 

echo "Welcome : ".$teacherData->name."<br/>";
echo "Department : ".$teacherData->department."<br/>";
echo "Department id : ".$teacherData->department_id."<br/>";
echo " your username  : ".$teacherData->username."<br/>";
echo "your staff id : ".$teacherData->staff_id."<br/>";


?> 
</div></center>

</body>
</html>