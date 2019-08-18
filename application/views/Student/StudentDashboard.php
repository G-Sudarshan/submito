<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<h1>Student Dashboard</h1>
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
</body>
</html>