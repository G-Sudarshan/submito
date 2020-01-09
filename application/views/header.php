<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Header</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-dark bg-secondary">
			<a class="navbar-brand mr-1" href=<?= base_url('Login'); ?>>SubMito!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="navbar-brand mr-1" href=<?= base_url('Login'); ?>><?= $clgname; ?></a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href=<?= base_url('Login/index'); ?> >Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=<?= base_url('Login/loginpage'); ?> >Login</a>
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