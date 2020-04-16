<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
</head>
<body>
	<header>

		<nav class="navbar navbar-expand-md navbar-dark bg-secondary">
			<a class="navbar-brand mr-1" href=<?= base_url('Login'); ?>>SubMito!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="navbar-brand mr-1" href=<?= base_url('Login'); ?>><?= $clgname; ?></a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse " id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href=<?= base_url('Login/index'); ?> >Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=<?= base_url('Login/loginpage'); ?> >Student Login</a>
					</li>
					<li class="nav-item">
				        <a class="nav-link" href=<?= base_url('Login/load_calendar'); ?> >
				          <i class="fa fa-calendar"></i>
				          <span>Academic Calender</span>
				      	</a>
				    </li>
					<li class="nav-item">
				        <a class="nav-link" href=<?= base_url('Login/notification'); ?> >
				          <i class="fa fa-bell"></i>
				          <span>All Notifications</span>
				      	</a>
				    </li>
				</ul>
			</div>
		</nav>
	</header>
</body>
</html>