<?php

if(!$this->session->userdata('admin_id') && !$this->session->userdata('student_id'))
          return redirect('login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password | Student</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap Link -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Bootstrap font awesome link -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Style -->
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

		<!-- ---------------------------------------------- Header------------------------------------------ -->  
	    
	    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	      <a class="navbar-brand mr-1" href="#">SubMito!</a>
	    </nav>

	    <!-- --------------------------------------------------------------------------------------------- -->
	    <!-- ---------------------------------------------- Content---------------------------------------- -->

	    <div class="container-fluid">
	      <div align="left">&nbsp;
	        <h4><a href="<?= base_url('Student'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
	      </div>
	    </div>

	    <div class="container" align="center">
			<br/><br/>
			<h3>Enter New Password for <?php echo $student['name']; ?> ( Roll No.: <?php echo $student['rollno'] ?> ) of <?php echo $student['department']; ?> Department: </h3>
			<br/><br/><br/>
			
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12"></div>
				<div class="col-lg-6 col-md-6 col-sm-12" >
		          <?php 
		            $attributes = ['id' => 'teacherPasswordForm'];
		            echo form_open('Login/update_student_password', $attributes);
		          ?>
		          <div class="form-group">
		              <label for="new_password">Your New Password:</label>
		              <input type="text" name="new_password" class="form-control" placeholder="Enter new password" minlength="8" autocomplete="off" required>
		          </div>
		          <?php 
		            echo form_hidden('id',$student['id']);
		            echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-success']);
						echo form_close();
		          ?>   
		        </div>
				<div class="col-lg-3 col-md-3 col-sm-12"></div>
			</div>
		</div>

	    <!-- --------------------------------------------------------------------------------------------- -->
	    <!-- ------------------------------------------------ Footer -------------------------------------- -->

	    <br/><br/><br/><br/><br/><br/><br/><br/>
	    <footer class="py-3 bg-dark">
	      <div class="container text-center text-white-50">
	        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
	      </div>
	    </footer>

	    <!-- -------------------------------------------------------------------------------------------- -->

    </section>

    <!-- ----------------------------------------------------------------------------------------------------- -->

    <!-- Script links -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>