<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style type="text/css">
		.hm-gradient 
		{
		    background-image: linear-gradient(to top, #f3e7e9 30%, #e3eeff 100%, #e3eeff 100%);
		}
		body 
		{
		    font-family: 'Source Sans Pro', sans-serif;
		    line-height: 1.5;
		    color: #323232;
		    font-weight: 400;
		    text-rendering: optimizeLegibility;
		    -webkit-font-smoothing: antialiased;
		    -moz-font-smoothing: antialiased;
		}
		li a
		{
			padding: 2px;
			color: #fff;
		}
	</style>
	
</head>
<body class="hm-gradient">

	<?php $this->view('header'); ?>

	<section>
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h2>Contact Us</h2>
					<h5>Ask us for help</h5>
					<p>We are always here to help. If you have any requirement/query about our services; fill up the contact form below and we'll do our best to reply as soon as possible. Alternatively simply pickup the phone and give us a call.</p>
					<hr/>
				</div>
			</div>
		</div>
	</section>

	<section class="form-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<?php echo form_open(); ?>

						<div class="form-row">
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" placeholder="Full Name">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" placeholder="Email Address">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="address">Address</label>
								<input type="text" name="address" class="form-control" placeholder="Residential Address">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="number">Contact No.</label>
								<input type="number" name="number" class="form-control" placeholder="Contact Number">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12">
								<label for="subject">Subject</label>
								<input type="text" name="subject" class="form-control" placeholder="Subject">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12">
								<label for="subject">Description</label>
								<textarea class="form-control" rows="3"></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
								<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>Send Message</button>
							</div>
						</div>

					<?php echo form_close() ?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 address">
					<h5>Call Us / Whatsapp</h5>
					<p><a href="tel:+919800395513"><i class="fa fa-phone"></i> +(91) 9800395513</a></p>

					<h5>Email</h5>
					<p><a href="mailto:prajakta@gmail.com"><i class="fa fa-envelope"></i>prajakta@gmail.com</a></p>

					<h5>Address</h5>
					<p>xajshdhd</p>
				</div>
			</div>
		</div>
	</section>

	<?php $this->view('footer'); ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>