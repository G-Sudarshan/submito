<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic);

		.hm-gradient {
			background-image: linear-gradient(to top, #f3e7e9 30%, #e3eeff 100%, #e3eeff 100%);
			font-family: 'Source Sans Pro', sans-serif;
			line-height: 1.5;
			color: #323232;
			text-rendering: optimizeLegibility;
			-webkit-font-smoothing: antialiased;
			-moz-font-smoothing: antialiased;
		}

		h2 {
			margin-top: 4%;
			text-align: center;
			font-weight: bold;
			letter-spacing: 1px;
			color: #333;
			padding-bottom: 10px;
		}

		.team-title {
			position: static;
			padding: 20px 0;
			display: inline-block;
			letter-spacing: 2px;
			width: 100%;
		}

		.team-title h5 {
			font-size: 16px;
			margin-bottom: 0px;
			display: block;
			text-transform: uppercase;
		}

		.team-title span {
			font-size: 14px;
			text-transform: uppercase;
			color: #a6a6a6;
			letter-spacing: 1px;
		}

		/*icons*/
		a {
			padding: 2px;
			color: #fff;
		}

		/*hover effect*/

		.ih-item {
			position: relative;
			-webkit-transition: all 0.35s ease-in-out;
			-moz-transition: all 0.35s ease-in-out;
			transition: all 0.35s ease-in-out;
		}

		.ih-item,
		.ih-item * {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		.ih-item i {
			color: #333;
		}

		.ih-item i:hover {
			text-decoration: none;
		}

		.ih-item img {
			width: 100%;
			height: 100%;
		}

		.ih-item.circle {
			position: relative;
			width: 300px;
			height: 300px;
			border-radius: 50%;
		}

		.ih-item.circle .img {
			position: relative;
			width: 300px;
			height: 300px;
			border-radius: 50%;
		}

		.ih-item.circle .img:before {
			position: absolute;
			display: block;
			content: '';
			width: 100%;
			height: 100%;
			border-radius: 50%;
			box-shadow: inset 0 0 0 16px rgba(255, 255, 255, 0.6), 0 1px 2px rgba(0, 0, 0, 0.3);
			-webkit-transition: all 0.35s ease-in-out;
			-moz-transition: all 0.35s ease-in-out;
			transition: all 0.35s ease-in-out;
		}

		.ih-item.circle .img img {
			border-radius: 50%;
		}

		.ih-item.circle .info {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			text-align: center;
			border-radius: 50%;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
		}

		.ih-item.square {
			position: relative;
			width: 235px;
			height: 300px;
			border: 8px solid #fff;
			box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
		}

		.ih-item.square .info {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			text-align: center;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
		}

		.ih-item.circle.effect2 .img {
			opacity: 1;
			-webkit-transform: scale(1);
			-moz-transform: scale(1);
			-ms-transform: scale(1);
			-o-transform: scale(1);
			transform: scale(1);
			-webkit-transition: all 0.35s ease-in-out;
			-moz-transition: all 0.35s ease-in-out;
			transition: all 0.35s ease-in-out;
		}

		.ih-item.circle.effect2.colored .info {
			background: #1a4a72;
			background: rgba(26, 74, 114, 0.6);
		}

		.ih-item.circle.effect2 .info {
			background: #333333;
			background: rgba(0, 0, 0, 0.6);
			opacity: 0;
			pointer-events: none;
			-webkit-transition: all 0.35s ease-in-out;
			-moz-transition: all 0.35s ease-in-out;
			transition: all 0.35s ease-in-out;
		}

		.ih-item.circle.effect2 .info h3 {
			color: #fff;
			text-transform: uppercase;
			position: relative;
			letter-spacing: 2px;
			font-size: 22px;
			margin: 0 30px;
			padding: 55px 0 0 0;
			height: 110px;
			text-shadow: 0 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.3);
		}

		.ih-item.circle.effect2 .info p {
			color: #bbb;
			padding: 10px 5px;
			font-style: italic;
			margin: 0 30px;
			font-size: 15px;
			border-top: 1px solid rgba(255, 255, 255, 0.5);
		}

		.ih-item.circle.effect2.left_to_right .info {
			-webkit-transform: translateX(-100%);
			-moz-transform: translateX(-100%);
			-ms-transform: translateX(-100%);
			-o-transform: translateX(-100%);
			transform: translateX(-100%);
		}

		.ih-item.circle.effect2.left_to_right i:hover .img {
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			-ms-transform: rotate(-90deg);
			-o-transform: rotate(-90deg);
			transform: rotate(-90deg);
		}

		.ih-item.circle.effect2.left_to_right i:hover .info {
			opacity: 1;
			-webkit-transform: translateX(0);
			-moz-transform: translateX(0);
			-ms-transform: translateX(0);
			-o-transform: translateX(0);
			transform: translateX(0);
		}

		.ih-item.square.effect2 {
			overflow: hidden;
		}

		.ih-item.square.effect2.colored .info {
			background: #1a4a72;
		}

		.ih-item.square.effect2.colored .info h3 {
			background: rgba(12, 34, 52, 0.6);
		}

		.ih-item.square.effect2 .img {
			opacity: 1;
			-webkit-transition: all 0.5s ease-in-out;
			-moz-transition: all 0.5s ease-in-out;
			transition: all 0.5s ease-in-out;
			-webkit-transform: rotate(0deg) scale(1);
			-moz-transform: rotate(0deg) scale(1);
			-ms-transform: rotate(0deg) scale(1);
			-o-transform: rotate(0deg) scale(1);
			transform: rotate(0deg) scale(1);
		}

		.ih-item.square.effect2 .info {
			background: #333333;
			visibility: hidden;
			-webkit-transition: all 0.35s 0.3s ease-in-out;
			-moz-transition: all 0.35s 0.3s ease-in-out;
			transition: all 0.35s 0.3s ease-in-out;
		}

		.ih-item.square.effect2 .info h3 {
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			font-size: 17px;
			padding: 10px;
			background: #111111;
			margin: 30px 0 0 0;
			-webkit-transform: translateY(-200px);
			-moz-transform: translateY(-200px);
			-ms-transform: translateY(-200px);
			-o-transform: translateY(-200px);
			transform: translateY(-200px);
			-webkit-transition: all 0.35s 0.3s ease-in-out;
			-moz-transition: all 0.35s 0.3s ease-in-out;
			transition: all 0.35s 0.3s ease-in-out;
		}

		.ih-item.square.effect2 .info p {
			font-style: italic;
			font-size: 15px;
			position: relative;
			color: #bbb;
			padding: 20px 20px 20px;
			text-align: center;
			-webkit-transform: translateY(-200px);
			-moz-transform: translateY(-200px);
			-ms-transform: translateY(-200px);
			-o-transform: translateY(-200px);
			transform: translateY(-200px);
			-webkit-transition: all 0.35s 0.5s linear;
			-moz-transition: all 0.35s 0.5s linear;
			transition: all 0.35s 0.5s linear;
		}

		.ih-item.square.effect2 i:hover .img {
			-webkit-transform: rotate(720deg) scale(0);
			-moz-transform: rotate(720deg) scale(0);
			-ms-transform: rotate(720deg) scale(0);
			-o-transform: rotate(720deg) scale(0);
			transform: rotate(720deg) scale(0);
			opacity: 0;
		}

		.ih-item.square.effect2 i:hover .info {
			visibility: visible;
		}

		.ih-item.square.effect2 i:hover .info h3,
		.ih-item.square.effect2 i:hover .info p {
			-webkit-transform: translateY(0);
			-moz-transform: translateY(0);
			-ms-transform: translateY(0);
			-o-transform: translateY(0);
			transform: translateY(0);
		}

		footer {
			position: relative;
			bottom: 0;
			width: 100%;
		}

		.au {
			display: flex;
			flex-direction: column;
			;
			height: 100%;
			width: 100%;
			align-self: center;
			justify-content: center;
		}
	</style>
</head>

<body>

	<div class="hm-gradient au">
		<br />

		<section class="text-center">

			<h2>ABOUT US</h2>
			<div class="container">
				<p>
					<h6>The challenges faced by students in meeting assignment deadlines and cost associated with printing hard copies of paper, necessitated developers to develop a user friendly system to tackle these challenges. The system allows students to submit assignments online to a particular course, Teachers who have access to the system for grading purpose. The most obvious advantage offered by online assignment submission and management system is that it offers faster transmission of assignments than using traditional way by using online system.
						<span class="text-success">Watch our <a href="https://youtu.be/ErxDe89BLek"><span class="text-primary">Introduction Video</span></a>on YouTube!</span></h6>
				</p>
			</div>
			<br />

			<h2>OUR GUIDE</h2>
			<br />
			<div class="container">
				<div class="row">

					<div class="col-lg-4 col-md-4 col-sm-12">

					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="col-lg-3 col-md-3 col-sm-12">
							<div class="ih-item circle effect2 left_to_right">
								<i>
									<div class="img"><img src="<?php echo base_url('assets\images\malisir.jpg'); ?>" alt="img"></div>
									<div class="info">
										<h3>Mr. Mali Sir</h3>
										<p>A Professor of Computer Technology in Government Polytechnic Nashik.</p>
										<br /><br />
										<p>
											<a class="fa fa-facebook" href="https://www.facebook.com/pravin.mali.90260/"></a>
										</p>
									</div>
								</i>
							</div>
						</div>
						<div class="team-title ">
							<h5>Mr. Mali Sir</h5>
							<span>Professor</span>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">

					</div>

				</div>
			</div>

		</section>

		<section class="pt-3 pb-4">

			<div class="container">

				<div class="row mt-4">
					<div class="col text-center">
						<h2>OUR AWESOME TEAM</h2>
						<h6>Teamwork is the fuel that allows common people to attain uncommon results.</h6>

					</div>
				</div>
				<br />

				<div class="row">

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="ih-item square effect2">
							<i>
								<div class="img"><img src="<?php echo base_url('assets\images\saurabh.jpg'); ?>" alt="img"></div>
								<div class="info">
									<h3>Saurabh Bhalerao</h3>
									<p>Developer of notes sharing module and all videos of SubMito channel on YouTube, Blogs, Documentation.</p>
									<p>
										<a class="fa fa-instagram" href="https://www.instagram.com/saurabh.wakadikar/"></a>
										<a class="fa fa-github" href="https://github.com/Guru7prvhilla/"></a>
									</p>
								</div>
							</i>
						</div>
						<div class="team-title">
							<h5>Saurabh Bhalerao</h5>
							<span>176103</span>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="ih-item square effect2">
							<i>
								<div class="img"><img src="<?php echo base_url('assets\images\sudarshan.jpg'); ?>" alt="img"></div>
								<div class="info">
									<h3>Sudarshan Gawale</h3>
									<p>Developer of assignment upload module and some admin dashboard features and in-modal PDF view feature.</p>
									<p>
										<a class="fa fa-instagram" href="https://www.instagram.com/g.sudarshan_11/"></a>
										<a class="fa fa-github" href="https://github.com/G-Sudarshan/"></a>
									</p>
								</div>
							</i>
						</div>
						<div class="team-title">
							<h5>Sudarshan Gawale</h5>
							<span>176114</span>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="ih-item square effect2">
							<i>
								<div class="img"><img src="<?php echo base_url('assets\images\aniket.jpg'); ?>" alt="img"></div>
								<div class="info">
									<h3>Aniket Sinare</h3>
									<p>Developer of Dynamic Academic Calendar, Mail OTP verification, csv to database upload of students.</p>
									<p>
										<a class="fa fa-instagram" href="https://www.instagram.com/sinu_96k/"></a>
										<a class="fa fa-github" href="https://github.com/aniket4206/"></a>
									</p>
								</div>
							</i>
						</div>
						<div class="team-title">
							<h5>Aniket Sinare</h5>
							<span>176154</span>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="ih-item square effect2">
							<i>
								<div class="img"><img src="<?php echo base_url('assets\images\prajakta.jpg'); ?>" alt="img"></div>
								<div class="info">
									<h3>Prajakta Dhage</h3>
									<p>Developer of Login authentication and Designer of all three dashboards of this project and all the validations.</p>
									<p>
										<a class="fa fa-instagram" href="https://www.instagram.com/_prajaktagd_/"></a>
										<a class="fa fa-github" href="https://github.com/prajaktagd/"></a>
									</p>
								</div>
							</i>
						</div>
						<div class="team-title">
							<h5>Prajakta Dhage</h5>
							<span>176161</span>
						</div>
					</div>

				</div>
			</div>
		</section>
	</div>
	<footer class="py-3 bg-dark">
		<div class="container text-center text-white-50">
			<h6><a target="_blank" href=<?= base_url('Login/aboutus'); ?>>About Us&nbsp;|</a>
				<a target="_blank" href=<?= base_url('Login/terms'); ?>>Terms and Conditions&nbsp;|</a>
				<a target="_blank" href=<?= base_url('Login/privacy'); ?>>Privacy Policy&nbsp;|</a>
				<a target="_blank" href=<?= base_url('Login/contactus'); ?>>Contact Us &nbsp;|</a>
				<a target="_blank" href="https://submito.business.site/"><i class="fa fa-globe" aria-hidden="true"></i> &nbsp;| </a>
				<a target="_blank" href="https://www.youtube.com/channel/UCAzHBeop4ACbeOKuoDcMoAQ"><i class="fa fa-youtube" aria-hidden="true"></i> &nbsp;| </a>

				<a target="_blank" href="https://www.instagram.com/__team_submito_1/"><i class="fa fa-instagram" aria-hidden="true"></i> &nbsp; </a>
			</h6>
			<small>&COPY; 2020 TEAM SUBMITO. &nbsp;All Rights Reserved</small>
		</div>
	</footer>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>
	<script>
		var options = {
			bottom: '100px', // default: '32px'
			right: '32px', // default: '32px'
			left: 'unset', // default: 'unset'
			time: '0.5s', // default: '0.3s'
			mixColor: '#fff', // default: '#fff'
			backgroundColor: '#ffffff', // default: '#fff'
			buttonColorDark: 'grey', // default: '#100f2c'
			buttonColorLight: '#ffffff', // default: '#fff'
			saveInCookies: false, // default: true,
			label: '🐧', // default: ''
			autoMatchOsTheme: true // default: true
		}

		const darkmode = new Darkmode(options);
		darkmode.showWidget();
	</script>
</body>

</html>