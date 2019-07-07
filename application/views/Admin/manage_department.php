<!DOCTYPE html>
<html>
<head>
	<title>Manage Deaprtment</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
	</style>

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



	</script>
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

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn btn-outline-primary" onclick="mng_crs()" >Manage Courses</button>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <button type="button" class="btn btn-outline-primary" onclick="mng_stf()" >Manage Staff</button>

    <div id="myDIV">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <button type="button" class="btn btn-outline-success" onclick="crt_crs()" >Create A New Course</button>

         <table class="table">
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

				echo form_open('Admin/mng_dpt');

//				echo form_hidden($d_data);
				echo form_submit(['name'=>'submit','value'=>'Manage','class'=>'btn btn-outline-success']); echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?>
    </div>

    <div id="myDIV2">
    	<?php echo form_open('Admin/create_course'); ?>

    	

	<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?>

	<?php 

	$d_data = array(
                    'dname'  => $dname,
                   'd_id' => $d_id,
                    );
    echo form_hidden($d_data);
	echo "Enter Name of Course to be created &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  ";
	echo form_input(['name'=>'new_crs_name','placeholder'=>' Name of Course','value'=>set_value('crs_name')]); 
	echo "<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "Enter course code of Course to be created &nbsp; :&nbsp; ";
	echo form_input(['name'=>'new_crs_code','placeholder'=>' Course Code ','value'=>set_value('crs_code')]); 
    echo "<br/><br/>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo form_submit(['name'=>'submit','value'=>'Create','class'=>'btn btn-primary']); 

	echo form_close();
	?>
    </div>

</body>
</html>