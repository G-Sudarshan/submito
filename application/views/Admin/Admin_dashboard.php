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
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<style type="text/css">
		/* body */ 
	    .hm-gradient 
	    {
	        background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
	        font-family: 'Source Sans Pro', sans-serif;
	    } 

		#wrapper 
		{
		  display: -webkit-box;
		  display: -ms-flexbox;
		  display: flex;
		}

		#wrapper #content-wrapper 
		{
		  overflow-x: hidden;
		  width: 100%;
		  padding-top: 1rem;
		  padding-bottom: 80px;
		}

		/*Sidebar*/
		.sidebar 
		{
		  width: 90px !important;
		  background-color: #212529;
		  min-height: calc(
		    100vh - 56px);
		}

		.sidebar .nav-item:last-child 
		{
		  margin-bottom: 1rem;
		}

		.sidebar .nav-item .nav-link 
		{
		  text-align: center;
		  padding: 0.75rem 1rem;
		  width: 90px;
		}

		.sidebar .nav-item .nav-link span 
		{
		  font-size: 0.65rem;
		  display: block;
		}

		.sidebar .nav-item .dropdown-menu 
		{
		  position: absolute !important;
		  -webkit-transform: none !important;
		  transform: none !important;
		  left: calc(90px + 0.5rem) !important;
		  margin: 0;
		}

		.sidebar .nav-item .dropdown-menu.dropup 
		{
		  bottom: 0;
		  top: auto !important;
		}

		.sidebar .nav-item.dropdown .dropdown-toggle::after 
		{
		  display: none;
		}

		.sidebar .nav-item .nav-link 
		{
		  color: rgba(255, 255, 255, 0.5);
		}

		.sidebar .nav-item .nav-link:active, .sidebar .nav-item .nav-link:focus, .sidebar .nav-item .nav-link:hover 
		{
		  color: rgba(255, 255, 255, 0.75);
		}

		.sidebar.toggled 
		{
		  width: 0 !important;
		  overflow: hidden;
		}

		@media (min-width: 768px) 
		{
		  .sidebar 
		  {
		    width: 225px !important;
		  }
		  .sidebar .nav-item .nav-link 
		  {
		    display: block;
		    width: 100%;
		    text-align: left;
		    padding: 1rem;
		    width: 225px;
		  }
		  .sidebar .nav-item .nav-link span 
		  {
		    font-size: 1rem;
		    display: inline;
		  }
		  .sidebar .nav-item .dropdown-menu 
		  {
		    position: static !important;
		    margin: 0 1rem;
		    top: 0;
		  }
		  .sidebar .nav-item.dropdown .dropdown-toggle::after 
		  {
		    display: block;
		  }
		  .sidebar.toggled {
		    overflow: visible;
		    width: 90px !important;
		  }
		  .sidebar.toggled .nav-item:last-child 
		  {
		    margin-bottom: 1rem;
		  }
		  .sidebar.toggled .nav-item .nav-link 
		  {
		    text-align: center;
		    padding: 0.75rem 1rem;
		    width: 90px;
		  }
		  .sidebar.toggled .nav-item .nav-link span 
		  {
		    font-size: 0.65rem;
		    display: block;
		  }
		  .sidebar.toggled .nav-item .dropdown-menu 
		  {
		    position: absolute !important;
		    -webkit-transform: none !important;
		    transform: none !important;
		    left: calc(90px + 0.5rem) !important;
		    margin: 0;
		  }
		  .sidebar.toggled .nav-item .dropdown-menu.dropup 
		  {
		    bottom: 0;
		    top: auto !important;
		  }
		  .sidebar.toggled .nav-item.dropdown .dropdown-toggle::after 
		  {
		    display: none;
		  }
		}

		/* scroll bar*/
		.scroll-to-top 
		{
		  position: fixed;
		  right: 15px;
		  bottom: 15px;
		  width: 50px;
		  height: 50px;
		  text-align: center;
		  color: #fff;
		  background: rgba(52, 58, 64, 0.5);
		  line-height: 46px;
		}

		.scroll-to-top:focus, .scroll-to-top:hover 
		{
		  color: white;
		}

		.scroll-to-top:hover 
		{
		  background: #343a40;
		}

		#profileModal {
  			  z-index: 1999; 
					}
		#myUpdateModaladmin {
  			  z-index: 2000; 
				}
	</style>

	

</head>
<body class="hm-gradient">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" >
			<i class="fa fa-bars fa-2x"></i>
			<a class="navbar-brand mr-1" href="#"><h3><?php echo " &nbsp;&nbsp;".$clg_name; ?></h3></a>	
   		</button>

   		<!--Right corner menu-->
   		<ul class="nav navbar-nav ml-auto">
   			<li>
   				<a class="nav-link" href="#" data-toggle="dropdown">
		            <i class="fa fa-user-circle fa-2x" ></i>
		        </a>
		        <div class="dropdown-menu dropdown-menu-right">
		        	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Profile</a>
		        	<a class="dropdown-item" data-toggle="modal" data-target="#addAdmin">Add New Admin</a>
					<a class="dropdown-item" data-toggle="modal" data-target="#resetModal">Reset the Whole System</a>
		            <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
		        </div>
   			</li>
   		</ul>
	</nav>

	<!-- --------------------------------------------------------------------------------------------------- -->

<div id="wrapper">

			<!--Sidebar-->
	   		<ul class="sidebar navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href=<?= base_url('Admin/index'); ?> >
		          <i class="fa fa-tachometer"></i>
		          <span>Dashboard</span>
		        </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">
		          <i class="fa fa-edit"></i>
		          <span data-toggle="modal" data-target="#editClg">Edit College Name</span>
		      	</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href=<?= base_url('Admin/notification'); ?> >
		          <i class="fa fa-bell"></i>
		          <span>Add Notification</span>
		      	</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href=<?= base_url('CaledarController'); ?> >
		          <i class="fa fa-calendar"></i>
		          <span>Academic Calender</span>
		      	</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href=<?= base_url('Login/change_password_admin'); ?> >
		          <i class="fa fa-key"></i>
		          <span>Change Password</span>
		      	</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href=<?= base_url('Admin/load_change_teacher_password'); ?> >
		          <i class="fa fa-key"></i>
		          <span>Change Password of Teacher</span>
		      	</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href=<?= base_url('Admin/load_change_student_password'); ?> >
		          <i class="fa fa-key"></i>
		          <span>Change Password of Student</span>
		      	</a>
		      </li>
		            <li class="nav-item">
		        <a class="nav-link" href=<?= base_url('Zip'); ?> >
		          <i class="fa fa-download"></i>
		          <span>Download Files Backup</span>
		      	</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href=<?= base_url('Zip/db_backup'); ?> >
		          <i class="fa fa-database"></i>
		          <span>Download Database Backup</span>
		      	</a>
		      </li>

		    </ul>
		
	<!-- ---------------------------------------------------------------------------------------------------- -->

	<div class="container">

		<center>

			<?php if( $feedback = $this->session->flashdata('feedback'))
			{ echo '<div class="alert alert-dismissible alert-success">' . $feedback . '</div>'; } ?>

			<?php if( $dpt_msg = $this->session->flashdata('dpt_msg'))
			{ echo '<div class="alert alert-dismissible alert-success">' . $dpt_msg . '</div>'; } ?>

			<?php if($success = $this->session->flashdata('success')): 
				echo '<div class="alert alert-dismissible alert-success">'.$success.'</div>';
			 endif; ?>
			 <?php if($failure = $this->session->flashdata('failure')): 
				echo '<div class="alert alert-dismissible alert-danger">' . $failure . '</div>';
			 endif; ?>
		    
			 <br/>
			<h2>Admin Dashboard</h2>
		</center>
		<br/><br/>
		<button class="btn btn-success" data-toggle="modal" data-target="#createDept">Create a New Department</button>
		<br/>
		<div>    
	        <br><br>
	        <table class="table table-dark table-hover" >
				<thead>
					<tr>
						<td>Sr. No.</td>
						<td>Department Id</td>
						<td>Department Name </td>
						<td>Student</td>
						<td>Staff</td>
						<td>Course</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $count =0; ?>	
						<?php foreach( $dpt_names->result() as $dpt_name ): ?>
						<td><?= ++$count ?></td>
						<td><?= $dpt_name->dpt_id; ?></td>
						<td><?= $dpt_name->dpt_name; ?></td>
						<td>
							<?php 
									$d_data = array(
			                        'dname'  => $dpt_name->dpt_name,
			                        'd_id' => $dpt_name->dpt_id,
			                    );

								echo form_open('Admin/load_manage_students');
								echo form_hidden($d_data);
								echo form_submit(['name'=>'submit','value'=>'Students','class'=>'btn btn-outline-success']); echo form_close();
				            ?> 
		  				</td>
		                <td>
		                	<?php 
								$d_data = array(
		                        'dname'  => $dpt_name->dpt_name,
		                        'd_id' => $dpt_name->dpt_id,
			                    );
								echo form_open('Admin/load_manage_teachers');
								echo form_hidden($d_data);
								echo form_submit(['name'=>'submit','value'=>'Teachers','class'=>'btn btn-outline-success']); 
								echo form_close();
			                ?> 
			            </td>
		  				<td>
		  					<?php 
								$d_data = array(
				                    'dname'  => $dpt_name->dpt_name,
				                   'd_id' => $dpt_name->dpt_id,
				                    );

								echo form_open('Admin/load_manage_courses');
								echo form_hidden($d_data);
								echo form_submit(['name'=>'submit','value'=>'Courses','class'=>'btn btn-outline-info']); 
								echo form_close();
			                ?>
			            </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>

	<!-- ------------------------------------------ Footer ----------------------------------------------- -->

	    <br/>
	    <footer class="py-3 bg-dark">
	      	<div class="container text-center text-white-50">
	        	<small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
	      	</div>
	    </footer>

	<!-- ------------------------------------------------------------------------------------------------- -->

<!------------------------------------------------ Edit Profile--- --------------------------------------------->

	<!-- Modal-->

    <div class="modal" id="myUpdateModaladmin">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Profile</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
           <div class="form-group">
            <?php echo form_open('Admin/update_admin'); ?>
  			<?php 
  				echo "Your Name :  ";
				echo form_input(['name'=>'admin_name','placeholder'=>'Name of Admin','class'=>'form-control','value'=>set_value('admin_name',$admin->name)],'','required');
				echo "<br/>"; 
				  
				echo "Your Email :  ";
				echo form_input(['name'=>'admin_email','type'=>'email','placeholder'=>'Enter Email eg. ganesha@gmail.com','class'=>'form-control','value'=>set_value('admin_email',$admin->email)],'','required'); 
				echo "<br/>";

				echo "Department :  ";
				echo form_input(['name'=>'admin_department','placeholder'=>'Enter year eg. First Year ','class'=>'form-control','value'=>set_value('admin_department',$admin->department)],'','required'); 
				echo "<br/>";

				echo "Mobile No. :  ";
				echo form_input(['name'=>'admin_mobile','placeholder'=>'Enter your mobile no','class'=>'form-control','value'=>set_value('admin_mobile',$admin->mobile_no)],'','required');  
			?>
           </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <?php  
            	echo form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']); 
                echo form_close();
            ?>
          </div>
        </div>
      </div>
    </div>

<!-- --------------------------------------------------------------------------------------------------------- -->  
<!-- ----------------------------------------------Profile Modal---------------------------------------------- -->

  <!-- Modal-->
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <!-- Modal Header-->
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body-->
            <div class="modal-body">
              <?php
                echo "Name : ".$admin->name."<br/>";
                echo "Email : ".$admin->email."<br/>";
                echo "Department : ".$admin->department."<br/>";
                echo "Mobile No. : ".$admin->mobile_no."<br/>";
              ?>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myUpdateModaladmin" >Edit Profile</a>
            </div>
          </div>
      </div>
  </div>

<!-- --------------------------------------------------------------------------------------------------------- -->
<!----------------------------------------------- Logout Modal --------------------------------------------------->

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

<!-- ------------------------------------------------------------------------------------------------------ -->
<!---------------------------------------- Reset Modal -------------------------------------------------------->

	<!-- Modal-->
	<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	       <div class="modal-content">
	       		<!-- Modal Header-->
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
	          		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">×</span>
	          		</button>
	        	</div>
	        	<!-- Modal Body-->
	        	<div class="modal-body">Select "Reset" below if you are ready to DELETE everything(data) on your system.</div>
	        	<!-- Modal footer -->
	        	<div class="modal-footer">
	          		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          		<a class="btn btn-danger" href=<?= base_url('Admin/resetotp'); ?> >Reset</a>
	        	</div>
	      	</div>
	    </div>
	</div>

<!-- --------------------------------------------------------------------------------------------------------- -->
<!------------------------------------- Edit College Name Modal ------------------------------------------------>

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
					        <input type="text" name="new_clg_name" class="form-control" value="<?php echo $clg_name ?>" autocomplete="off" required>
					    </div>
		        </div>
		        <!-- Modal footer -->   
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		            <?php
						echo form_submit(['value'=>'Update College Name','class'=>'btn btn-primary']); 
						echo form_close();
					?>
		        </div>
      		</div>
    	</div>
    </div>

<!-- ------------------------------------------------------------------------------------------------------- -->
<!--------------------------------- Create Department Modal --------------------------------------------------->

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
					        <input type="text" name="new_dpt_name" id="new_dpt_name" class="form-control" placeholder="Name of Department" autocomplete="off" required>
					    </div>
					    <div class="form-group">
					        <label for="new_dpt_id">Enter Id of the Department to be created:</label>
					        <input type="number" name="new_dpt_id" id="new_dpt_id"class="form-control" placeholder="Id" autocomplete="off" required>
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

<!-- ------------------------------------------------------------------------------------------------------- -->
<!----------------------------------------------- Add Admin Modal ---------------------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<!-- Modal Header-->
        		<div class="modal-header">
	          		<h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
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
					        <label for="new_dpt_name">Enter Username of the Admin to be added:</label>
					        <input type="text" name="name" required="" class="form-control" placeholder="Username" autocomplete="off" >
					    </div>
					    <div class="form-group">
					        <label for="new_dpt_id">Enter Password of the Admin to be added:</label>
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

<!-- ------------------------------------------------------------------------------------------------------- -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>

	    (function($) 
	    {
		  "use strict"; // Start of use strict

		  // Toggle the side navigation
		    $("#sidebarToggle").on('click', function(e) 
		    {
			    e.preventDefault();
			    $("body").toggleClass("sidebar-toggled");
			    $(".sidebar").toggleClass("toggled");
		    }); 

		
			// Scroll to top button appear
			$(document).on('scroll', function() 
			{
			    if ($(this).scrollTop() > 100) 
			    {
			      $('#scroll-to-top').fadeIn();
			    } 
			    else 
			    {
			      $('#scroll-to-top').fadeOut();
			    }
			});

			// Smooth scrolling using jQuery easing
			/*$(document).on('click', 'a.scroll-to-top', function(event) {
			    var $anchor = $(this);
			    $('html, body').stop().animate({
			      scrollTop: ($($anchor.attr('href')).offset().top)
			    }, 1000, 'easeInOutExpo');
			    event.preventDefault();
			});
*/
		})(jQuery);

	</script>

</body>
</html>

