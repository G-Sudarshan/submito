<?php

if(!$this->session->userdata('admin_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Student Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h1><center>Change Password of Student</center></h1><br>
	<a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>

	</div><br><br>

	<div class="container">

         <div class="" >
		<?php echo form_open(base_url().'index.php/Admin/loadRecord'); ?>
     
		 <input type='text' class="form-control" name='search' placeholder="Search By rollno or name or email or department" value='<?= $search ?>'><br/>
		<center><input type='submit' class="btn btn-primary" name='submit' value='Search'></center>
	<?php echo form_close(); ?></div>
	<br/>

	<!-- Posts List -->
	<table class="table table-dark table-border table-hover" border='1' width='100%' style='border-collapse: collapse;'>
		<tr>
			<th>S.no</th>
			<th>name</th>
			<th>gmail</th>
			<th>rollno</th>
			<th>department</th>
			<th>change password</th>
		</tr>
		<?php 
		$sno = $row+1;
		foreach($result as $data){

			$content = substr($data['email'],0, 180);
			$content1 = substr($data['rollno'],0, 180);
			$content2 = substr($data['department'],0, 180);
			echo "<tr>";
			echo "<td>".$sno."</td>";
			echo "<td>".$data['name']."</a></td>";
			echo "<td>".$content."</td>";
			echo "<td>".$content1."</td>";
			echo "<td>".$content2."</td>";
			// echo "<td>"."<button class='btn btn-outline-success'>Change Password</button>"."</td>";
			
			?>
			<td>

			<?php

					echo form_open('Admin/load_update_student_password');

					$s1 = array(
                    'name'  => $data['name'],
                   'rollno' => $content1,
                   'department'  => $content2,
                   'id' => $data['id']
                    );
    					
    				echo form_hidden($s1);

    				echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-outline-success']); 

					echo form_close();


			?>

		</td>
			<?php


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