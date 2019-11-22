<!DOCTYPE html>
<html>
<head>
	<title>Change Password </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container" align="center">
<h2>Enter new password for <?php echo $teacher['username']; ?> of <?php echo $teacher['department']; ?> Department : <br/><br/><br/><br/>

	
	<div class="row"><div class="col-lg-6" >
		<?php echo form_open('Login/update_teacher_password');


			  echo form_input(['name' => 'new_password','placeholder'=>'Enter new password','class'=>'form-control']);
			  echo "<br/>";

			  echo form_hidden('id',$teacher['id']);
			  echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-success']);

			  echo form_close();
		?>
			
		</div>
	</div>
</h2>
</div>
</body>
</html>