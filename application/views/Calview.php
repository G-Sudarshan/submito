<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Academic Calender</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<style type="text/css">
	table{
border: 15px solid #25BAE4;
border-collapse:collapse;
margin-top: 50px;
margin-left: 50px;
}
td{
width: 80px;
height: 80px;
text-align: center;
border: 4px solid #e2e0e0;
font-size: 20px;
font-weight: bold;
font-family: cursive;
}
th{
height: 50px;
padding-bottom: 8px;
background:skyblue;
font-size: 20px;
}
.prev_sign a, .next_sign a{
color:white;
text-decoration: none;
}
tr.week_name{
font-size: 16px;
font-weight:400;
color: white;
width: 10px;
background-color: #efe8e8;
}
.highlight{
background-color:orange;
color:red;
height: 27px;
padding-top: 20px;
padding-bottom: 10px;
}
.calender .days td
{
	width: 80px;
	height: 80px;
}
.calender .hightlight
{
	font-weight: 800px;
}
.calender .days td:hover
{
	background-color: red;
}

</style>
<body>

	<a class="btn btn-primary" href=<?= base_url('Admin') ?> >Home</a>

<div id="container">
	<h1><center>Welcome To GPN academic calender</center></h1>

	<?php 
      
       if( $message = $this->session->flashdata('message')): ?>
    <div class="row"><div class="col-lg-6">
    <div  class="alert alert-dismissible alert-success" >

      <?= $message ?>
  </div>
</div>
</div>


	<?php endif; ?>



	<div id="body"><center>
		<?php echo $calender; ?>
	</center></div>

	<p class="footer" style="text-align: center;font-size: 150%;">Page Reloaded Time is <strong>{elapsed_time}</strong> seconds. </p>
	
     <center>
     	<a type="button" class="btn btn-primary" href=<?= base_url('Mycal/form_as'); ?> >Add Event </a>
 </center>

	</div>

</body>
</html>