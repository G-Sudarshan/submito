<!DOCTYPE html>
<html>
<head>
	<title>Manage Teachers</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>



	<!------------------------------ Teachers ---------------------------------->


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
    	<button class="btn btn-outline-success" data-toggle="modal" data-target="#addTeacher">Add Teacher</button>
         <br><br>

        

          <table class="table table-dark table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>staff id </td>
				<td>Staff Name</td>
				<td>Department</td>
				<td>Manage</td>
			</tr>
		</thead>
		<tbody>
			
			<tr>
	
				<?php $count =0; ?>	
				<?php foreach( $teachers->result() as $staff_name ): ?>
				<td><?= ++$count ?></td>
				<td><?= $staff_name->staff_id; ?></td>
				<td><?= $staff_name->name; ?></td>
				<td><?= $staff_name->department; ?></td>
				<td><?php 

				echo form_open('Admin/edit_staff');

			echo form_hidden('id',$staff_name->id);
				echo form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-outline-success']);
				 echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
     </div>
    </div> 


<!-------------------------------------------------------------------------->

<!------------------------------- Add Teacher Modal ------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<!-- Modal Header-->
        		<div class="modal-header">
	          		<h5 class="modal-title" id="exampleModalLongTitle">Addd a New Teacher</h5>
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">&times;</span>
	          		</button>
        		</div>
		        <!-- Modal Body-->
		        <div class="modal-body">
		        	<?php echo form_open('Admin/add_staff');

	$d_data = array(
                    'dname'  => $dname,
                   'd_id' => $d_id,
                    );
    echo form_hidden($d_data);
	
	echo "Enter id of staff to be added :  ";
	echo form_input(['name'=>'new_staff_id','placeholder'=>' staff id ','class'=>'form-control','value'=>set_value('staff id')]); 
    echo "<br/><br/>";

    echo "Enter name of staff to be added &nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_staff_name','placeholder'=>' Name of satff','class'=>'form-control','value'=>set_value('staff_name')]); 
	echo "<br/><br/>";

	echo "Enter username of staff to be added &nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_staff_username','placeholder'=>' UserName of satff','class'=>'form-control','value'=>set_value('staff_username')]); 
	echo "<br/><br/>";
    
    echo "Enter PASSWORD of staff to be added &nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_staff_pw','placeholder'=>' password of satff','class'=>'form-control','value'=>set_value('staff_pw')]); 
	echo "<br/><br/>";

	
	?>
		        <!-- Modal footer -->   
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		            <?php
						echo form_submit(['name'=>'submit','value'=>'Add','class'=>'btn btn-primary']); 

						echo form_close();
					?>
		        </div>
      		</div>
    	</div>
    </div>

  	<!-- --------------------------------------------------------------------------------- -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>