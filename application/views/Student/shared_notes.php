<?php

if(!$this->session->userdata('student_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shared Notes | Student </title>
	<!-- Bootstrap Link -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Bootstrap font awesome link -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<style type="text/css">
		.hm-gradient 
	    {
	        background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
	        font-family: 'Source Sans Pro', sans-serif;
	    }
	</style>
</head>
<body class="hm-gradient">
	<div class="hm-gradient">
		<div class="container" align="center">
		<h1>Student Dashboard</h1><br/>
		<h2 class="text-primary"><?= $course_name."<br/>".$course_code; ?></h2>

		<div class="container-fluid">
	        <div align="left">&nbsp;
	            <h4>
	            	<a href="<?= base_url('Student'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a>
	            </h4>
	        </div>
	    </div>

		<div>
			<table class="table table-hover table-striped">
				<thead>
					<th>Sr. No.</th>
					<th>Title</th>
					<th>Download</th>
					<th>Shared by</th>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($notes->result() as $n):?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $n->title; ?></td>
						<td><a class="btn btn-success" href="<?= base_url().$n->path; ?>" download >Download</a></td>
						<td><?= $n->teacher_name; ?></td>
					</tr><? endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
 <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>


	<!-- Script links -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>

	<script>
	 
		  var options = {
		  bottom: '64px', // default: '32px'
		  right: '32px', // default: '32px'
		  left: 'unset', // default: 'unset'
		  time: '0.5s', // default: '0.3s'
		  mixColor: '#fff', // default: '#fff'
		  backgroundColor: '#ffffff',  // default: '#fff'
		  buttonColorDark: 'grey',  // default: '#100f2c'
		  buttonColorLight: '#ffffff', // default: '#fff'
		  saveInCookies: false, // default: true,
		  label: '🐧', // default: ''
		  autoMatchOsTheme: true // default: true
		}

		const darkmode = new Darkmode(options);
		darkmode.showWidget();
	 
	</script>

	
</div>
</body>
</html>