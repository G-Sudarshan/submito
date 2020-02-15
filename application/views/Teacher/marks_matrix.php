<!DOCTYPE html>
<html>
<head>
	<title>Marks Matrix</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap font awesome link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

	<div class="container" align="center">
	<h4 class="text-primary">Marks Matrix</h4>
	
	<h5 class="text-success"><?= $course_name; ?></h5>
	
	<h5 class="text-success"><?= $course_code; ?></h5>
	
	<h5 class="text-success"><?= $teacher_name; ?></h5>

	 <div class="container-fluid">
          <div align="left">&nbsp;
            <h4><a href="<?= base_url('Teacher'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
          </div>

	<h6 class="" align="left"> NA : Not Assessed <br/> - : Not Submitted</h6>

	<br>
	<table class="table" border="1">

		<thead>
			<th>Roll No.</th>
			<?php
			foreach ($sac as $an) {
				echo "<th>".$an->assignment_no."</th>";
			}
			?>
			<th>Update</th>
			
		</thead>
		<tbody>
			<?php foreach ($rn->result() as $r){ ?>
			<tr>
				<td><?= $r->rollno; ?></td>

				<?php 
				foreach ($sac as $an) {
					$flag = 0;
				  foreach ($matrix as $m) {

				 	if($m->rollno == $r->rollno )
					{
				     
				     $current_static_assignment =  $an->assignment_no;

				      				
						if($current_static_assignment == $m->assignment_no)
					{
						if($m->marks == 0)
						{
							echo "<td>NA</td>";
						}else
						{


						?>

						<td><?= $m->marks; ?></td>
						<?php
					    }
						$flag = 1;
						break;
					}

							
			}
			 } 
			 if($flag == 0)
			 	{
			 		echo "<td>-</td>";
			 	}} ?>
			
			<td><button class="btn btn-primary">Update</button></td>
				
			</tr>
		<?php } ?>
		</tbody>
			
	</table>

</div>
</body>
</html>