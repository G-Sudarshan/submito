<?php

if(!$this->session->userdata('admin_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Authentication</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
<center><h2 class="text-primary" > Enter your username password in order to continue : </h2>
	<?php
		  echo form_open('Login/single_admin_login'); ?>
		  <h2 class="text-success">Admin Login</h2>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>                          
                <?php 
                echo form_submit(['name'=>'admin_login','value'=>'Login','class'=>'btn btn-primary']);
                echo form_close(); 

	?></center>
</div>
</body>
</html>