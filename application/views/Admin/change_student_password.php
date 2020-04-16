<?php

if(!$this->session->userdata('admin_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Student Password</title>
	<!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap font awesome link -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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

	<!-- ---------------------------------------------- Header------------------------------------------------ -->  

      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="#">SubMito!</a>
      </nav>

      <!-- -------------------------------------------------------------------------------------------------- -->
      <!-- ---------------------------------------------- Content-------------------------------------------- -->

        <div class="container-fluid">
        	<div align="left">&nbsp;
          		<h4><a href="<?= base_url('Admin'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
        	</div>
        </div>

      	<h1><center>Change Password of Student</center></h1>
      	<br/><br/>

	<div class="container">
        <div>
			<?php echo form_open('Admin/loadRecord'); ?>
		 	<input type='text' class="form-control" name='search' placeholder="Search By rollno or name or email or department" value='<?= $search ?>'><br/>
			<center><input type='submit' class="btn btn-primary" name='submit' value='Search'></center>
			<?php echo form_close(); ?>
		</div>
			<br/><br/>

		<!-- Posts List -->
		<table class="table table-dark table-border table-hover" border='1' width='100%' style='border-collapse: collapse;'>
			<tr>
				<th>Sr. No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Roll No.</th>
				<th>Department</th>
				<th>Change Password</th>
			</tr>
			<?php 
				$sno = $row+1;
				foreach($result as $data)
				{
					$content = substr($data['email'],0, 180);
					$content1 = substr($data['rollno'],0, 180);
					$content2 = substr($data['department'],0, 180);
					echo "<tr>";
					echo "<td>".$sno."</td>";
					echo "<td>".$data['name']."</a></td>";
					echo "<td>".$content."</td>";
					echo "<td>".$content1."</td>";
					echo "<td>".$content2."</td>";
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
						if(count($result) == 0)
						{
							echo "<tr>";
							echo "<td colspan='3'>No record found.</td>";
							echo "</tr>";
						}
					?>
		</table>

		<!-- Paginate -->
		 <div class="pagination pagination-info" style='margin-top: 10px;'></div>

		<nav>
	  		<ul class="pagination">
	    		<?= $pagination; ?>
	  		</ul>
		</nav>
	</div>

      <!-- ---------------------------------------------------------------------------------------------------------- -->
      <!-- ----------------------------------------- Footer -------------------------------------------------- -->

      <br/><br/><br/>
      <footer class="py-3 bg-dark">
        <div class="container text-center text-white-50">
          <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
        </div>
      </footer>

      <!-- -------------------------------------------------------------------------------------------------- -->

    </section>

    <!-- ---------------------------------------------------------------------------------------------------- -->

    <!-- Script links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>