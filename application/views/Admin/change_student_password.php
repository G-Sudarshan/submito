<!DOCTYPE html>
<html>
<head>
	<title>Change Student Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h1><center>Change Password of Student</center></h1><br>
	<a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>

	</div><br><br>

         <table class="table table-dark table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Deparment</td>
				<td>Student rollno </td>
				<td>Student Name</td>
				<td>Change password</td>
			</tr>
		</thead>
		<tbody>
			
			<tr>

				
				    <?php $count =0; ?>	
				<?php foreach( $students->result() as $student ): ?>
				<td><?= ++$count ?></td>
				<td><?= $student->department; ?></td>
				<td><?= $student->rollno; ?></td>
				<td><?= $student->name; ?></td>
				<td><?php 

				echo form_open('Admin/load_update_student_password');

				echo form_hidden(['rollno'=>$student->rollno,'department'=>$student->department,'id'=>$student->id,'name'=>$student->name]);
				echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-outline-success']); echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
    </div>

</body>
</html>