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
	<title>Manage Courses</title>
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

		<!-- ------------------------------------------Header------------------------------------------------- -->  
	    
	    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	      <a class="navbar-brand mr-1" href="#">SubMito!</a>
	    </nav>

	    <!-- ------------------------------------------------------------------------------------------------- -->
	    <!-- ------------------------------------------ Content----------------------------------------------- -->

	    <div class="container-fluid">
	      <div align="left">&nbsp;
	        <h4><a href="<?= base_url('Admin'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
	      </div>
	    </div>

	    <!---------------------------------------- Courses ------------------------------------------------------>

		<div class="container">
			<center>
				<h2><?= $dname; ?></h2>
				<h4> Department Id: <?= $d_id ?> </h4>
			</center>
			<?php 
				if($success = $this->session->flashdata('success')): 
				echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
			 	endif; 
			?>
			<?php 
				if($failure = $this->session->flashdata('failure')): 
				echo '<div class="alert alert-dismissible alert-danger">' . $failure . '</div>';
			 	endif; 
			?>
			<br/><br/>
		    <button class="btn btn-success" data-toggle="modal" data-target="#addCourse">Add Course</button>
		    <button class="btn btn-success" data-toggle="modal" data-target="#importcsv">Import CSV</button>
		    <br/><br/>
			<table class="table table-dark table-hover">
				<thead>
					<tr>
						<td>Sr. No.</td>
						<td>Course Code</td>
						<td>Course Name </td>
						<td>Manage Course</td>
					</tr>
				</thead>
				<tbody>		
					<tr>
						<?php $count =0; ?>	
						<?php foreach( $courses->result() as $crs_name ): ?>
						<td><?= ++$count ?></td>
						<td><?= $crs_name->course_code; ?></td>
						<td><?= $crs_name->name; ?></td>
						<td>
							<?php 
								echo form_open('Admin/delete_course');
								$d_data = array(
				                    'dname'  => $dname,
				                   'd_id' => $d_id,
				                    );
				   			    echo form_hidden($d_data);
				     			echo form_hidden('id',$crs_name->id);
								echo form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-outline-danger']); 
								echo form_close();
							?> 
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		
		<!------------------------------------------------------------------------------------------------------->
	    <!-- ------------------------------------------ Footer ----------------------------------------------- -->

	    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
	    <footer class="py-3 bg-dark">
	      <div class="container text-center text-white-50">
	        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
	      </div>
	    </footer>

	    <!-- ------------------------------------------------------------------------------------------------- -->

    </section>
    
<!------------------------------------------------------------------------------------------------------------->
<!------------------------------------------ Add Course Modal ------------------------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<!-- Modal Header-->
        		<div class="modal-header">
	          		<h5 class="modal-title" id="exampleModalLongTitle">Add a New Course</h5>
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">&times;</span>
	          		</button>
        		</div>
		        <!-- Modal Body-->
		        <div class="modal-body">
		        	<?php 
		        		echo form_open('Admin/create_course');  
						$d_data = array(
					                    'dname'  => $dname,
					                   'd_id' => $d_id,
					                    );
					    echo form_hidden($d_data);
						echo "Enter Name of Course to be created :";
						echo form_input(['name'=>'new_crs_name','placeholder'=>'Name of Course','class'=>'form-control','value'=>set_value('crs_name')],'','required'); 
						echo "<br/>";
						echo "Enter course code of Course to be created :";
						echo form_input(['name'=>'new_crs_code','placeholder'=>'Course Code','class'=>'form-control','value'=>set_value('crs_code')],'','required'); 
					    echo "<br/>";
					?>
				</div>
		        <!-- Modal footer -->   
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		            <?php
						echo form_submit(['name'=>'submit','value'=>'Create','class'=>'btn btn-primary']); 
						echo form_close();
					?>
		        </div>
      		</div>
    	</div>
    </div>

  	<!-- -------------------------------------------------------------------------------------------------- -->
  	<!----------------------------------- Import CSV Modal---------------------------------------------------->

	<!-- Modal -->
	<div class="modal" id="importcsv">
	    <div class="modal-dialog">
	      	<div class="modal-content">
	      		<!-- Modal Header -->
	      		<div class="modal-header">
	        		<h4 class="modal-title">Import CSV</h4>
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>
	      		<!-- Modal Body -->
	      		<div class="modal-body">
	        		<div class="form-group">
	          			<?php echo form_open_multipart('Csv_import/import_courses');?>
						<div class="form-group">
							<label>Select CSV File</label>
							<input type="file" name="csv_file" id="csv_file" required accept=".csv" />

							<br/><br/>
              <p class="text-success">
                Columns are | course_code | name | department_id |
               
              </p>
						</div>
	        		</div>
	      		</div>
	      		<!-- Modal footer -->
	      		<div class="modal-footer">                  
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
					<?php
						echo form_close();
					?>
	      		</div>
	        </div>
	    </div>
	</div>

  <!-- ------------------------------------------------------------------------------------------------------ --> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>