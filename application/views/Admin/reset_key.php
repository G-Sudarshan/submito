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
	<title>Reset key</title>
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
	<div class="container" align="center">
		<h2 class="text-danger">Enter the RESET KEY provided by Team SubMito : </h2>
		<?php
			echo form_open('Admin/verify_reset_key');
			echo form_input(['name'=>'key','class'=>'form-control','placeholder'=>'Enter reset key'],'','required');
			echo "<br/>";
			echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-success']);
			echo form_close();
		?>
	</div>

</body>
</html>