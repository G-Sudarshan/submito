<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
#myDIV {
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
		
	</script>

</head>
<body>
	<?php $this->load->helper('form'); ?>

	<h1><?php echo $clg_name; ?></h1>

	<br/>
	<br/>

	<?php if( $feedback = $this->session->flashdata('feedback'))
	{ echo '<div class="alert alert-dismissible alert-success">' . $feedback . '</div>'; } ?>
    

	Admin dashnoard

<button type="button" class="btn btn-outline-primary" onclick="edit_clg_name()" >Edit college name</button>
<!--button type="button" class="btn btn-outline-secondary">Secondary</button>
<button type="button" class="btn btn-outline-success">Success</button>
<button type="button" class="btn btn-outline-info">Info</button>
<button type="button" class="btn btn-outline-warning">Warning</button>
<button type="button" class="btn btn-outline-danger">Danger</button-->

<br/>
<br/>

<div id="myDIV">

	<?php echo form_open('Admin/update_clg_name'); ?>

	<?php echo form_input(['name'=>'new_clg_name','placeholder'=>$clg_name,'value'=>set_value('clg_name')]); 
	echo form_submit(['name'=>'submit','value'=>'update college name','class'=>'btn btn-primary']); ?>
      
</div>

</body>
</html>