<?php

if(!$this->session->userdata('admin_id'))
          return redirect('login');

?>
<!DOCTYPE html>
<html>
<head>
<!------------------- Bootsrap -------------------------------------------->	
	<title>Manage Deaprtment</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!------------------------------------------------------------------------>

<!-- This is css for hiding and showing courses/staff/student tables---- -->

	<style type="text/css">

#myDIV {
  width: 100%;
  padding: 50px 0;

 
  margin-top: 20px;
  display: none;
}

#myDIV2 {
  width: 100%;
  padding: 50px 0;

 
  margin-top: 20px;
  display: none;
}

#myDIV3 {
  width: 100%;
  padding: 50px 0;

 
  margin-top: 20px;
  display: none;
}

#myDIV4 {
  width: 100%;
  padding: 50px 0;

 
  margin-top: 20px;
  display: none;
}

#myDIV5 {
  width: 100%;
  padding: 50px 0;

 
  margin-top: 20px;
  display: none;
}

#myDIV6 {
  width: 100%;
  padding: 50px 0;

 
  margin-top: 20px;
  display: none;
}
	</style>
<!----------------------------------------------------------------------->
	
<!-- This is js for hiding and showing courses/staff/student tables---- -->

	<script type="text/javascript" language="javascript">
		
		function mng_crs()
		{
            var x = document.getElementById("myDIV"); 
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}
		
		function crt_crs()
		{
            var x = document.getElementById("myDIV2"); 
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}

		function mng_stf()
		{
            var x = document.getElementById("myDIV3"); 
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}

		function add_stf()
		{
            var x = document.getElementById("myDIV4"); 
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}

		function mng_sdt()
		{
            var x = document.getElementById("myDIV5"); 
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}

		function add_sdt()
		{
            var x = document.getElementById("myDIV6"); 
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}



	</script>
<!----------------------------------------------------------------------->
</head>
<body>
	<?php
	$dname = $this->session->userdata('dname');
   	$d_id = $this->session->userdata('d_id');
  ?>

     <center>
     	<h1><?= $dname; ?></h1>

     	<br/><br/>

     	<h2><?= $d_id; ?></h2>

     </center>

	<?php if( $crs_msg = $this->session->flashdata('crs_msg'))
	{ echo '<div class="alert alert-dismissible alert-success">' . $crs_msg . '</div>'; } ?>

	<?php if( $stf_msg = $this->session->flashdata('stf_msg'))
	{ echo '<div class="alert alert-dismissible alert-success">' . $stf_msg . '</div>'; } ?>

	 <div class="container" align="left">

    <a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>
    
  </div>
  <div class="container">

  <br/><br/>

	
<!------------------------- Buttons of dashboard ----------------------->
    <button type="button" class="btn btn-outline-primary" onclick="mng_crs()" >Manage Courses</button>
  
   <button type="button" class="btn btn-outline-primary" onclick="mng_stf()" >Manage Staff</button>

     <button type="button" class="btn btn-outline-primary" onclick="mng_sdt()" >Manage Students</button>
<!----------------------------------------------------------------------->
  
<!---------------------------------- Courses------------------------------>
    <div id="myDIV">
    
         <button type="button" class="btn btn-outline-success" onclick="crt_crs()" >Create A New Course</button>
         <div id="myDIV2">
    	<?php echo form_open('Admin/create_course');  

	$d_data = array(
                    'dname'  => $dname,
                   'd_id' => $d_id,
                    );
    echo form_hidden($d_data);
	echo "Enter Name of Course to be created :  ";
	echo form_input(['name'=>'new_crs_name','placeholder'=>' Name of Course','value'=>set_value('crs_name')]); 
	echo "<br/><br/>";
	echo "Enter course code of Course to be created &nbsp; :&nbsp; ";
	echo form_input(['name'=>'new_crs_code','placeholder'=>' Course Code ','value'=>set_value('crs_code')]); 
    echo "<br/><br/>";
    
	echo form_submit(['name'=>'submit','value'=>'Create','class'=>'btn btn-primary']); 

	echo form_close();
	?>
    </div><br><br>

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
				<?php foreach( $crs_names->result() as $crs_name ): ?>
				<td><?= ++$count ?></td>
				<td><?= $crs_name->course_code; ?></td>
				<td><?= $crs_name->name; ?></td>
				<td><?php 

				echo form_open('Admin/delete_course');

     			echo form_hidden('id',$crs_name->id);
				echo form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-outline-danger']); 
				echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
    </div>

    

<!---------------------------------------------------------------------->

<!------------------------------ Staff --------------------------------->

    <div id="myDIV3">
    	
         <button type="button" class="btn btn-outline-success" onclick="add_stf()" > Add staff</button><br><br>

         <div id="myDIV4">
    	<?php echo form_open('Admin/add_staff');

	$d_data = array(
                    'dname'  => $dname,
                   'd_id' => $d_id,
                    );
    echo form_hidden($d_data);
	
	echo "Enter id of staff to be added :  ";
	echo form_input(['name'=>'new_staff_id','placeholder'=>' staff id ','value'=>set_value('staff id')]); 
    echo "<br/><br/>";

    echo "Enter name of staff to be added &nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_staff_name','placeholder'=>' Name of satff','value'=>set_value('staff_name')]); 
	echo "<br/><br/>";

	echo "Enter username of staff to be added &nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_staff_username','placeholder'=>' UserName of satff','value'=>set_value('staff_username')]); 
	echo "<br/><br/>";
    
    echo "Enter PASSWORD of staff to be added &nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_staff_pw','placeholder'=>' password of satff','value'=>set_value('staff_pw')]); 
	echo "<br/><br/>";

	echo form_submit(['name'=>'submit','value'=>'Add','class'=>'btn btn-primary']); 

	echo form_close();
	?>
    </div>

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
				<?php foreach( $staff_names->result() as $staff_name ): ?>
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
<!------------------------------------------------------------------------->

<!------------------------------ Students ---------------------------------->


<div id="myDIV5" class="container">
    	
         <button type="button" class="btn btn-outline-success" onclick="add_sdt()" > Add Student</button><br><br>

         <div id="myDIV6" class="container">
    	<?php echo form_open('Admin/add_student');

	$d_data = array(
                    'dname'  => $dname,
                   'd_id' => $d_id,
                    );
    echo form_hidden($d_data);
	
	echo "Enter rollno of Student to be added :  ";
	echo form_input(['name'=>'new_student_rollno','placeholder'=>' student rollno ']); 
    echo "<br/><br/>";

    echo "Enter PASSWORD of student to be added &nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_student_password','placeholder'=>' password of student']); 
	echo "<br/><br/>";

	echo form_submit(['name'=>'submit','value'=>'Add','class'=>'btn btn-primary']); 

	echo form_close();
	?>
    </div>

          <table class="table table-dark table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Roll no.</td>
				<td>student Name</td>
				<td>Department</td>
				<td>Delete</td>
			</tr>
		</thead>
		<tbody>
			
			<tr>
	
				<?php $count =0; ?>	
				<?php foreach( $students->result() as $student ): ?>
				<td><?= ++$count ?></td>
				<td><?= $student->rollno; ?></td>
				<td><?= $student->name; ?></td>
				<td><?= $student->department; ?></td>
				<td><?php 

				echo form_open('Admin/delete_student');
 
			echo form_hidden('id',$student->id);
				echo form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-outline-danger']);
				 echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
     </div>
    </div> 


<!-------------------------------------------------------------------------->

</body>
</html>