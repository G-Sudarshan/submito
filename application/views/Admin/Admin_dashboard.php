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
	<style>
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
</style>

	<script type="text/javascript" language="javascript">

		function edit_clg_name()
		{
            var x = document.getElementById("myDIV"); 
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}

		function mng_dpt()
		{
			var x = document.getElementById("myDIV2");
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }

		}

		function crt_dpt()
		{
			var x = document.getElementById("myDIV3");
            if (x.style.display === "none") {
               x.style.display = "block";
                 } else {
                    x.style.display = "none";
               }
		}
		
	</script>

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
    

	<h2>Admin dashboard</h2>
</center><div class="container">
	<br/><br/>



<button type="button" class="btn btn-outline-primary" onclick="edit_clg_name()" >Edit college name</button>


<button type="button" class="btn btn-outline-primary" onclick="mng_dpt()" >Manage Departments</button>



<a class="btn btn-outline-primary" href=<?= base_url('CaledarController'); ?>  >Academic Calender</a>



<a class="btn btn-outline-primary" href=<?= base_url('Admin/notification'); ?>  >Add Notification</a>



<a class="btn btn-outline-primary" href=<?= base_url('Login/change_password_admin'); ?>  >Change Password</a>



<a class="btn btn-outline-danger" href=<?= base_url('Login/logout'); ?>  >Log out</a>
<br/><br/>


<a class="btn btn-outline-primary" href=<?= base_url('Admin/load_change_teacher_password'); ?>  > Change Password of Teacher </a>

<a class="btn btn-outline-primary" href=<?= base_url('Admin/load_change_student_password'); ?>  > Change Password of Student </a>




<br/>
<br/>

<div id="myDIV">


	<?php echo form_open('Admin/update_clg_name'); ?>

	<?php 
	 
	echo form_input(['name'=>'new_clg_name','placeholder'=>$clg_name,'value'=>set_value('clg_name')]); 
	echo form_submit(['name'=>'submit','value'=>'update college name','class'=>'btn btn-primary']); 

	echo form_close();
	?>


      
</div>



<div id="myDIV2">
          
         <button type="button" class="btn btn-outline-success" onclick="crt_dpt()" >Create A New Department</button>

         <div id="myDIV3">


	<?php echo form_open('Admin/create_dpt'); 

	echo "Enter Name of Department to be created &nbsp; :&nbsp; ";
	echo form_input(['name'=>'new_dpt_name','placeholder'=>' Name of Department','value'=>set_value('dpt_name')]); 
	
	echo "<br/><br/>Enter id no. of Department to be created &nbsp; :&nbsp; ";
	echo form_input(['name'=>'new_dpt_id','placeholder'=>' id Number ','value'=>set_value('dpt_id')]); 
    echo "<br/><br/>";
    
	echo form_submit(['name'=>'submit','value'=>'Create','class'=>'btn btn-primary']); 

	echo form_close();
	?>
      
</div><br><br>

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

</body>
</html>

