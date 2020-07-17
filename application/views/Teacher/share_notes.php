<?php

if(!$this->session->userdata('teacher_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Share Study Material | Teacher</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

	<!-- ------------------------------------------ Header -------------------------------------------- -->    
	    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	      <a class="navbar-brand mr-1" href="#">SubMito!</a>
	    </nav>

	<!-- ----------------------------------------------------------------------------------------------- -->
	<!-- -------------------------------------------- Content----------------------------------------- -->

		<div class="container-fluid">
	      	<div align="left">&nbsp;
	        	<h4>
	        		<a href="<?= base_url('Teacher'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a>
	        	</h4>
	      	</div>
	    </div>

	    <div class="container" align="center">
			<h2>Share Study Material</h2>
			<h4><?= $course_name."<br/>".$course_code; ?></h4>

			<?php 
				if(isset($error))
				{
					echo $error;
				}
			?>
			<br/>
			<h5 class="text-primary">You can share word document, excel sheet, powerpoint presentation,  png, jpg, gif, pdf etc.</h5>
			<br/><br/>
			<div class="row">
		        <div class="col-lg-3 col-md-3 col-sm-12"></div>
		        <div class="col-lg-6 col-md-6 col-sm-12" >
		            <?php echo form_open_multipart('Teacher/upload_notes');?>
					<?php 
						echo form_input(['name'=>'title','placeholder'=>'Enter Title for notes','class'=>'form-control'],'','required'); 
					?>
					<br/>
					<input type="file" name="userfile" class="form-control" />
					<br/>
					<p class="text-danger">
                Note: Upload PDF file of size less than 1MB (1024 KB)
              </p>
              <p class="text-success">
                If your file's (in case of PDF) size is more than 1 MB you can compress it on 
                <span class="text-primary"><a href="https://www.ilovepdf.com/compress_pdf" target="_blank"> ilovepdf.com</a> </span> 
                or
                <span class="text-primary"> <a href="https://pdfcandy.com/compress-pdf.html" target="_blank">pdfcandy.com</a> </span>
              </p>

<br />
					<?php 
						$data = array(
				                       'course_code'  => $course_code,
				                       'course_name' => $course_name,
				                       'teacher_name' => $teacher_name
				                      );
					    echo form_hidden($data); 
					?>
					<button type="submit" class="btn btn-primary" >Share Notes</button>
					<?php echo form_close(); ?>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-12"></div>
		    </div>
	    </div>

	<!-- --------------------------------------------------------------------------------------------- -->
	<!-- ------------------------------------------- Footer ------------------------------------------ -->

	    <br/><br/><br/><br/><br/><br/>
	    <footer class="py-3 bg-dark">
	      <div class="container text-center text-white-50">
	        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
	      </div>
	    </footer>

	<!-- ------------------------------------------------------------------------------------------------ -->

	</section>

	<!-- ------------------------------------------------------------------------------------------------- -->
	

	<!-- Script links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>