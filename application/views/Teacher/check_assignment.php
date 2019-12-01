<!DOCTYPE html>
<html>
<head>
	<title>Check Assignment</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container" align="center">
	<h1 class="text-primary">check assignment</h1>
	<h3 class="text-success"><?= $course_name; ?><br/><?= $course_code ?></h3>

	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>

	<div align="left">
	<a class="btn btn-info" href="<?= base_url('Teacher'); ?>" >Back to Teacher Dashboard</a>
    </div>
    <br/>

    <div>
    	<table class="table table-striped">
    		<thead>

    			<th>Assignment no.</th>
    			<th>Title</th>
    			<th>Created By</th>
    			<th>Last date to submit</th>
    			<th>Type</th>
    			<th>Check</th>
    			

    		</thead>
    		<tbody>
    			<?php foreach ($cad->result() as $a): ?>
    			
    			
    			<tr>
    				<td>
    					<?= $a->assignment_no; ?>
    				</td>
    				<td>
    					<?= $a->name; ?>
    				</td>
    				<td>
    					<?= $a->created_by; ?>
    				</td>
    				<td>
    					<?= $a->deadline; ?>
    				</td>
    				<td>
    					<?php if($a->type == 1)
    					{
    						echo "PDF";
    					 }
    					 elseif ($a->type == 2) {
    					 		echo "Text";
    					 }
    					 else {
    					  	echo "Error : contatct developer";
    					  } ?>
    				</td>
    				<td>
    					<?php
		          echo form_open('Teacher/load_submitted_assignment');

		          $data = array(
		                   'course_code'  => $course_code,
		                   'course_name'  => $course_name,
		                   'teacher_name' => $teacher_name,
		                   'assignment_type' => $a->type,
		                   'assignment_no' => $a->assignment_no
		                    );
		            echo form_hidden($data);

		           echo form_submit('submit', 'check',"class='btn btn-success btn-sm '");


		            echo form_close();

          ?>

    				</td>
    				
    			</tr>

    		<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>