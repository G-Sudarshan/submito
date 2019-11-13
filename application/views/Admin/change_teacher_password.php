<!DOCTYPE html>
<html>
<head>
	<title>Change Teacher Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h1><center>CHange Password of Teacher</center></h1><br>
	<a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>

	</div><br><br>

         <table class="table table-dark table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Deparment</td>
				<td>Teacher name </td>
				<td>Teacher Username</td>
				<td>department id </td>
				<td>staff id</td>
				<td>Change password</td>
			</tr>
		</thead>
		<tbody>
			
			<tr>

				
				    <?php $count =0; ?>	
				<?php foreach( $teachers->result() as $teacher ): ?>
				<td><?= ++$count ?></td>
				<td><?= $teacher->department; ?></td>
				<td><?= $teacher->name; ?></td>
				<td><?= $teacher->username; ?></td>
				<td><?= $teacher->department_id; ?></td>
				<td><?= $teacher->staff_id; ?></td>
				<td><?php 

				echo form_open('Admin/load_update_teacher_password');

				echo form_hidden(['username'=>$teacher->username,'department'=>$teacher->department,'id'=>]);
				echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-outline-success']); echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
    </div>

</body>
</html>