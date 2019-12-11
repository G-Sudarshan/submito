<?php

if(!$this->session->userdata('admin_id'))
          return redirect('Login');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	

	

</head>
<body>
	<?php $this->load->helper('form'); ?>

<center><h1><?php echo $clg_name; ?></h1>

	<br/>
	<br/>

	<?php if( $feedback = $this->session->flashdata('feedback'))
	{ echo '<div class="alert alert-dismissible alert-success">' . $feedback . '</div>'; } ?>

	<?php if( $dpt_msg = $this->session->flashdata('dpt_msg'))
	{ echo '<div class="alert alert-dismissible alert-success">' . $dpt_msg . '</div>'; } ?>

	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
	 <?php if($failure = $this->session->flashdata('failure')): 
		echo '<div class="alert alert-dismissible alert-danger">' . $failure . '</div>';
	 endif; ?>
    

	<h2>Admin dashboard</h2>
</center><div class="container">
	<br/><br/>



<button class="btn btn-outline-primary" data-toggle="modal" data-target="#editClg">Edit College Name</button>



<button class="btn btn-outline-primary" data-toggle="modal" data-target="#createDept">Create a New Department</button> 



<a class="btn btn-outline-primary" href=<?= base_url('CaledarController'); ?>  >Academic Calender</a>



<a class="btn btn-outline-primary" href=<?= base_url('Admin/notification'); ?>  >Add Notification</a>



<a class="btn btn-outline-primary" href=<?= base_url('Login/change_password_admin'); ?>  >Change Password</a>



<button class="btn btn-outline-danger" data-toggle="modal" data-target="#logoutModal">Log out</button>
<br/><br/>


<a class="btn btn-outline-primary" href=<?= base_url('Admin/load_change_teacher_password'); ?>  > Change Password of Teacher </a>

<a class="btn btn-outline-primary" href=<?= base_url('Admin/load_change_student_password'); ?>  > Change Password of Student </a>

<button class="btn btn-outline-success" data-toggle="modal" data-target="#myUpdateModaladmin">Update My Info</button>

<button class="btn btn-outline-success" data-toggle="modal" data-target="#addAdmin">Add new Admin</button>

<button class="btn btn-outline-danger" data-toggle="modal" data-target="#myUpdateModaladmin">Reset the whole System</button>

<!--------------------------------- update info model ------------------------------->

    <div class="modal" id="myUpdateModaladmin">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update My Information</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

           <div class="form-group">
            <?php echo form_open('Admin/update_admin'); ?>

      

  

  <?php 

  
  echo "Your Name :  ";
  echo form_input(['name'=>'admin_name','placeholder'=>'Name of Admin','class'=>'form-control','value'=>set_value('admin_name',$admin->name)]);
   echo "<br/><br/>"; 
  
  echo "Your Email :  ";
  echo form_input(['name'=>'admin_email','type'=>'email','placeholder'=>'Enter email eg. ganesha@gmail.com','class'=>'form-control','value'=>set_value('admin_email',$admin->email)]); 
    echo "<br/><br/>";

    echo "Department :  ";
  echo form_input(['name'=>'admin_department','placeholder'=>'Enter year eg. First Year ','class'=>'form-control','value'=>set_value('admin_department',$admin->department)]); 
    echo "<br/><br/>";

    echo " Mobile no :  ";
  echo form_input(['name'=>'admin_mobile','placeholder'=>'Enter your mobile no','class'=>'form-control','value'=>set_value('admin_mobile',$admin->mobile_no)]); 
    echo "<br/><br/>"; ?>

  
 

          </div>

          <!-- Modal footer -->
          

          <div class="modal-footer">
                        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            <?php  echo form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']); 
               echo form_close();
               ?>

           

          </div>

        </div>
      </div>
    </div>
</div>
<!-------------------------------------------------------------------------------------->

<!---------------------------------- Logout Modal --------------------------------------->


      

	<!-- Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	       <div class="modal-content">
	       		<!-- Modal Header-->
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
	          		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">×</span>
	          		</button>
	        	</div>
	        	<!-- Modal Body-->
	        	<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
	        	<!-- Modal footer -->
	        	<div class="modal-footer">
	          		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          		<a class="btn btn-danger" href=<?= base_url('Login/logout'); ?> >Logout</a>
	        	</div>
	      	</div>
	    </div>
	</div>

  	<!-- --------------------------------------------------------------------------------- -->
  	<!------------------------------- Edit College Name Modal ------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="editClg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<!-- Modal Header-->
        		<div class="modal-header">
	          		<h5 class="modal-title" id="exampleModalLongTitle">Edit College Name</h5>
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">&times;</span>
	          		</button>
        		</div>
		        <!-- Modal Body-->
		        <div class="modal-body">
		        	<?php 
			    		$attributes = ['id' => 'editClgForm'];
			      		echo form_open('Admin/update_clg_name', $attributes);
				    ?>	    
		            	<div class="form-group">
					        <label for="new_clg_name">Enter College Name:</label>
					        <input type="text" name="new_clg_name" class="form-control" value="<?php echo $clg_name ?>" autocomplete="off" >

					    </div>
		        </div>
		        <!-- Modal footer -->   
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		            <?php
						echo form_submit(['value'=>'Update College Name','class'=>'btn btn-primary']); 

					//echo form_submit(['value'=>'Change Password','class'=>'btn btn-success']);
						echo form_close();
					?>
		        </div>
      		</div>
    	</div>
    </div>

  	<!-- --------------------------------------------------------------------------------- -->
  	<!------------------------------- Create Department Modal ------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="createDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<!-- Modal Header-->
        		<div class="modal-header">
	          		<h5 class="modal-title" id="exampleModalLongTitle">Create a New Department</h5>
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">&times;</span>
	          		</button>
        		</div>
		        <!-- Modal Body-->
		        <div class="modal-body">
		        	<?php 
			    		$attributes = ['id' => 'createDeptForm'];
			      		echo form_open('Admin/create_dpt', $attributes);
				    ?>	    
		            	<div class="form-group">
					        <label for="new_dpt_name">Enter Name of the Department to be created:</label>
					        <input type="text" name="new_dpt_name" id="new_dpt_name" class="form-control" placeholder="Name of Department" autocomplete="off" >
					    </div>
					    <div class="form-group">
					        <label for="new_dpt_id">Enter Id of the Department to be created:</label>
					        <input type="number" name="new_dpt_id" id="new_dpt_id"class="form-control" placeholder="Id" autocomplete="off" >
					    </div>
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

  	<!-- --------------------------------------------------------------------------------- -->

  	<!------------------------------- Add Admin Modal ------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<!-- Modal Header-->
        		<div class="modal-header">
	          		<h5 class="modal-title" id="exampleModalLongTitle">Create a New Department</h5>
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">&times;</span>
	          		</button>
        		</div>
		        <!-- Modal Body-->
		        <div class="modal-body">
		        	<?php 
			    		
			      		echo form_open('Admin/add_admin');
				    ?>	    
		            	<div class="form-group">
					        <label for="new_dpt_name">Enter Username of the admin to be added:</label>
					        <input type="text" name="name" required="" class="form-control" placeholder="Username" autocomplete="off" >
					    </div>
					    <div class="form-group">
					        <label for="new_dpt_id">Enter password of the admin to be added:</label>
					        <input type="text" required="" name="password" class="form-control" placeholder="Password" autocomplete="off" >
					    </div>
		        </div>
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




<br/>
<br/>





<div>
          
        <br><br>

         <table class="table table-dark table-hover" >
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Department id</td>
				<td>Department name </td>
				<td>Manage Department</td>
			</tr>
		</thead>
		<tbody>
			
			<tr>

				
				    <?php $count =0; ?>	
				<?php foreach( $dpt_names->result() as $dpt_name ): ?>
				<td><?= ++$count ?></td>
				<td><?= $dpt_name->dpt_id; ?></td>
				<td><?= $dpt_name->dpt_name; ?></td>
				<td><?php 

				$d_data = array(
                    'dname'  => $dpt_name->dpt_name,
                   'd_id' => $dpt_name->dpt_id,
                    );

				echo form_open('Admin/set_dpt_session');

				echo form_hidden($d_data);
				echo form_submit(['name'=>'submit','value'=>'Manage','class'=>'btn btn-outline-success']); echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?>
		</tbody></table>

		</div>





</div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

