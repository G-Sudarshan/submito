<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubMito! - Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <style type="text/css">
    	.hm-gradient 
		{
		    background-image: linear-gradient(to top, #f3e7e9 30%, #e3eeff 100%, #e3eeff 100%);
		    font-family: 'Source Sans Pro', sans-serif;


		}
		.responsive
		{
			width: 100%;
			
			height: auto;
		}

		.container{
			min-height: 100%;
		}

		
		
    </style>
</head>
<body class="hm-gradient">
	
	<div class="container">
    	
    	<!-- <h1>SubMito!</h1> -->
    	<img class="responsive" src=<?= base_url("/assets/images/submito.png") ?> >
		<h3 align="center">Online Assignment Submission and Management System</h3>
		
		
		<br/><br/>
	    <h4>
	      <marquee> 
	        <?php foreach ($n_data->result() as $n) { ?> 

	          <a target="_blank" href=<?= base_url().$n->pdf_path; ?> > <?= $n->title; ?> </a> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 

	        <?php } ?>
	      </marquee>
	    </h4>
	    <br/><br/><br/><br/>   <br/><br/><br/><br/>    <br/><br/>    
	</div>

	<?php $this->view('footer'); ?>
	




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
</body>
</html>