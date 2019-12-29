<!DOCTYPE html>
<html>
<head>
	<title>Manage Courses</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>



	<!------------------------------ Courses ---------------------------------->


<div class="container">
	<center><h1 class="text-primary"><?= $dname; ?></h1><br/>
		<h2 class="text-success" > Department id &nbsp; : &nbsp; <?= $d_id ?> </h2></center>
	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
	 <?php if($failure = $this->session->flashdata('failure')): 
		echo '<div class="alert alert-dismissible alert-danger">' . $failure . '</div>';
	 endif; ?>
	  <a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a><br/>
	<br><br>
    	<button class="btn btn-outline-success" data-toggle="modal" data-target="#addCourse">Add Course</button>
    	<button class="btn btn-outline-success" data-toggle="modal" data-target="#importcsv">Import CSV</button>
         <br><br>

        
<table class="table table-dark table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Course Code</td>
				<td>Course name </td>
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
				<td><?php 

				echo form_open('Admin/delete_course');
				$d_data = array(
                    'dname'  => $dname,
                   'd_id' => $d_id,
                    );
   			    echo form_hidden($d_data);

     			echo form_hidden('id',$crs_name->id);
				echo form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-outline-danger']); 
				echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
     </div>
    </div> 


<!-------------------------------------------------------------------------->

<!------------------------------- Add Course Modal ------------------------------->

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
		        	<?php echo form_open('Admin/create_course');  

	$d_data = array(
                    'dname'  => $dname,
                   'd_id' => $d_id,
                    );
    echo form_hidden($d_data);
	echo "Enter Name of Course to be created :  ";
	echo form_input(['name'=>'new_crs_name','placeholder'=>' Name of Course','class'=>'form-control','value'=>set_value('crs_name')]); 
	echo "<br/><br/>";
	echo "Enter course code of Course to be created &nbsp; :&nbsp; ";
	echo form_input(['name'=>'new_crs_code','placeholder'=>' Course Code ','class'=>'form-control','value'=>set_value('crs_code')]); 
    echo "<br/><br/>";
    
	
	?>
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
</div>

  	<!-- --------------------------------------------------------------------------------- -->


  	<!--------------------------------------------------------------- Import CSV Modal  ---------------------------------------------------------------------->

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

  <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>