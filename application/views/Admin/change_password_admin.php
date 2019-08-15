<!DOCTYPE html>
<html>
<head>
	<title>Change Passsword</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body><center>
	<h1>Chnage your passsword</h1><br><br>

	<div class="conatainer">
		<div class="col-lg-6" >
		<?php echo form_open('Login/update_admin_password');


			  echo form_input(['name' => 'new_password','placeholder'=>'Enter new password','class'=>'form-control']);
			  echo "<br/>";


			  echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-primary']);

			  echo form_close();
		?>
	</div>
</div>
</center>

</body>
</html>