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
	<h1><center>Change Password of Teacher</center></h1><br>
	<a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>

	</div><br><br>
    <div class="container">

         <div class="" >
		<?php echo form_open(base_url().'index.php/Admin/loadRecordT'); ?>
     
		 <input type='text' class="form-control" name='search' placeholder="Search By rollno or name or email or department" value='<?= $search ?>'><br/>
		<center><input type='submit' class="btn btn-primary" name='submit' value='Search'></center>
	<?php echo form_close(); ?></div>
	<br/>

	<!-- Posts List -->
	<table class="table table-dark table-border table-hover" border='1' width='100%' style='border-collapse: collapse;'>
		<tr>
			<th>Sr. No.</th>
			<th>Deparment</th>
			<th>Teacher name</th>
			<th>Teacher Username</th>
			<th>change password</th>
		</tr>
		<?php 
		$sno = $row+1;
		foreach($result as $data){

			$content = substr($data['email'],0, 180);
			$content1 = substr($data['name'],0, 180);
			$content2 = substr($data['department'],0, 180);
			$content4 = substr($data['username'],0, 180);
			echo "<tr>";
			echo "<td>".$sno."</td>";
			echo "<td>".$content2."</a></td>";
			echo "<td>".$content1."</td>";
			echo "<td>".$content4."</td>";
			echo "<td>"."<button class='btn btn-outline-success'>Change Password</button>"."</td>";
			echo "</tr>";
			$sno++;

		}
		if(count($result) == 0){
			echo "<tr>";
			echo "<td colspan='3'>No record found.</td>";
			echo "</tr>";
		}
		?>
	</table>

	<!-- Paginate -->
	<!-- <div class="pagination pagination-info" style='margin-top: 10px;'>
		
	</div> -->

	<nav>
  <ul class="pagination">
   <?= $pagination; ?>
  </ul>
</nav>
</div>

</body>
</html>