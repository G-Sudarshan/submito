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
	<title>Change Passsword</title>
	<!-- Bootstrap Link -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Bootstrap font awesome link -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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

	<section>

    <!-- ---------------------------------------------- Header----------------------------------------------------- -->  

      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="#">SubMito!</a>
      </nav>

      <!-- ---------------------------------------------------------------------------------------------------------- -->
      <!-- ---------------------------------------------- Content---------------------------------------------------- -->

      <div class="container-fluid">
        <div align="left">&nbsp;
          <h4><a href="<?= base_url('Admin'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
        </div>
      </div>
      <center>
        <h1>Change your password</h1><br/><br/>
        <div class="container">
			<div class="col-lg-6 col-md-6 col-sm-12" >
			<?php 
				echo form_open('Login/update_admin_password');
				echo form_input(['name' => 'new_password','placeholder'=>'Enter new Password','class'=>'form-control','minlength'=>8],'','required');
				echo "<br/>";
				echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-primary']);
				echo form_close();
			?>
		</div>
      </center>

      <!-- ---------------------------------------------------------------------------------------------------------- -->
      <!-- ------------------------------------------------ Footer -------------------------------------------------- -->

      <br/><br/><br/><br/><br/><br/>
      <footer class="py-3 bg-dark">
        <div class="container text-center text-white-50">
          <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
        </div>
      </footer>

      <!-- ----------------------------------------------------------------------------------------------------------- -->

    </section>

</body>
</html>