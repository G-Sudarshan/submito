<!DOCTYPE html>
<html>
<head>
	<title>Welcome </title>
</head>
<body>

	<center><h1> GP Nashik </h1></center>

	<h4><marquee> 

		<?php 
          
          foreach ($n_data->result() as $n) {
             
              ?> 


            <a href=<?= $n->pdf_path ?> > <?= $n->title; ?> </a> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 

          	<?php 

          }

		?>

		

	</marquee></h4>

</body>
</html>