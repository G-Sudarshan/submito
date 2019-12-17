<!DOCTYPE html>
<html>
<head>
	<title>Shared Notes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
<div class="container" align="center">
	<h1>Student dashboard</h1><br/>
	<h2 class="text-primary"><?= $course_name."<br/>".$course_code; ?></h2>

	<div>
		<table class="table table-hover table-striped">
			<thead>
				<th>Sr. No.</th>
				<th>Download</th>
				<th>Shared by</th>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach ($notes->result() as $n):?>
				<tr>
					<td><?= $i++ ?></td>
					<td><a class="btn btn-success" href="<?= base_url().$n->path; ?>" download >Download</a></td>
					<td><?= $n->teacher_name; ?></td>
				</tr><? endforeach; ?>
			</tbody>
		</table>

	</div>
</div>
</body>
</html>