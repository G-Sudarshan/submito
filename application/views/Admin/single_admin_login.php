<?php

if(!$this->session->userdata('admin_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Authentication for Reset</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
      /* body */ 
      .hm-gradient 
      {
          background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
          font-family: 'Source Sans Pro', sans-serif;
      } 
    </style>
</head>
<body class="hm-gradient">
    <div class="container">
        <center><h2 class="text-primary" >Enter your username and password in order to continue : </h2>
        	<?php
        		    echo form_open('Login/single_admin_login'); ?>
        		    <h2 class="text-success">Admin Login</h2>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>                          
                    <?php 
                    echo form_submit(['name'=>'admin_login','value'=>'Login','class'=>'btn btn-primary']);
                    echo form_close(); 
        	?>
        </center>
    </div>
</body>
</html>