<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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

		.cu{
			display: flex;
			flex-direction: column;
			align-self: center;
			justify-content: center;
		}

		footer{
			position: relative;
			bottom: 0;
			width: 100%;
		}
	</style>
	
</head>
<body>
<div class="cu">
	<div class="hm-gradient">

	<section>
		<div class="container text-center">
			<?php if($success = $this->session->flashdata('success')): 
              echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
            endif; 
      ?>
      <?php if($failure = $this->session->flashdata('failure')): 
              echo '<div class="alert alert-dismissible alert-danger">' . $failure . '</div>';
            endif; 
      ?>
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
					

						<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<?php
	         	if($this->session->flashdata('message')){
	         	?>
	         	<div class="alert alert-info text-center">
	            	<?php echo $this->session->flashdata('message'); ?>
	            <?php } ?>
	          	</div>
	          						<!-- -->
<?php  echo form_open('Email1/sendemail'); ?>

						<div class="form-row">
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" placeholder="Full Name" required>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="email">Email</label>
								<input type="email" name="email1" class="form-control" placeholder="Email Address" required>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="address">Address</label>
								<input type="text" name="address" class="form-control" placeholder="Residential Address" required>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label for="number">Contact No.</label>
								<input type="number" name="contact_no" class="form-control" placeholder="Contact Number" required>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12">
								<label for="subject">Subject</label>
								<input type="text" name="subject" class="form-control" placeholder="Subject" required>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12">
								<label for="subject">Description</label>
								<textarea class="form-control" name="message" rows="3"></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
								<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Send Message</button>
							</div>
						</div>

</div>
</div>
					<?php echo form_close(); ?>

				
				<div class="col-lg-6 col-md-6 col-sm-12 address">
					<h5>Whatsapp Us</h5>
					<p><a href="https://wa.me/917030970237"><i class="fa fa-whatsapp"></i> +(91) 7030970237</a></p>
					<h5>Call Us</h5>
					<p><a href="tel:+91 7030970237"><i class="fa fa-phone"></i> +(91) 7030970237</a></p>

					<h5>Email</h5>
					<p><a href="mailto:team.submito@gmail.com"><i class="fa fa-envelope"></i>&nbsp;team.submito@gmail.com</a></p>

					
				</div>
			</div>
		</div>
	</section>

</div>
</div>

	<footer class="py-3 bg-dark">
	    <div class="container text-center text-white-50">
	    	<h6><a target="_blank" href=<?= base_url('Login/aboutus'); ?>  >About Us&nbsp;|</a>
	    	<a target="_blank" href=<?= base_url('Login/terms'); ?> >Terms and Conditions&nbsp;|</a>
	    	<a target="_blank" href=<?= base_url('Login/privacy'); ?> >Privacy Policy&nbsp;|</a>
	    	<a target="_blank" href=<?= base_url('Login/contactus'); ?> >Contact Us &nbsp;|</a>
	    	<a target="_blank" href="https://submito.business.site/" ><i class="fa fa-globe" aria-hidden="true"></i> &nbsp;| </a>
	    	<a target="_blank" href="https://www.youtube.com/channel/UCAzHBeop4ACbeOKuoDcMoAQ" ><i class="fa fa-youtube" aria-hidden="true"></i> &nbsp;| </a>

	    	<a target="_blank" href="https://www.instagram.com/__team_submito_1/" ><i class="fa fa-instagram" aria-hidden="true"></i> &nbsp; </a>
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

</body>
</html>