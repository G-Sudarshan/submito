<!DOCTYPE html>
<html>
<head>
	<title>Add admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body><center>
	<h1>Add admin</h1>
	<div class="container">
		<div class="col-lg-6">
		<?php 

			echo form_open('Admin/add_admin');

			echo form_input(['name'=>'name','placeholder'=>'admin name','class'=>'form-control']);

			echo "<br/>";

			echo form_input(['name'=>'username','placeholder'=>'username for admin','class'=>'form-control']);

			echo "<br/>";

			echo form_input(['name'=>'password','placeholder'=>'password for admin','class'=>'form-control']); ?>
			<div class="form-control"><?php

			$options = array(
                   'small'         => 'Small Shirt',
                   'med'           => 'Medium Shirt',
                   'large'         => 'Large Shirt',
                   'xlarge'        => 'Extra Large Shirt',
                );

              $shirts_on_sale = array('small', 'large');
              echo form_dropdown('shirts', $options, 'large');

			echo "<br/>";

		?></div>

		</div>
	</div>
</center>
</body>
</html>