<!DOCTYPE html>
<html>
<head>
	<title>Reset key</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" align="center">
		<h2 class="text-danger">Enter the RESET KEY provided by Team SubMito : </h2>
		<?php

			echo form_open('Admin/verify_reset_key');

			echo form_input(['name'=>'key','class'=>'form-control','placeholder'=>'Enter reset key']);

			echo "<br/>";

			echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-success']);

			echo form_close();
		?>
	</div>

</body>
</html>