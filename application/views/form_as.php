<?php

if(!$this->session->userdata('admin_id'))
          return redirect('login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container" align="left">

    <a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>
  </div>

  <div class="container">

	<?php 

	$this->load->helper('form');
      echo form_open('CaledarController/add_event');


      echo "<br/><br/>";

      echo "Enter Event Title : ";

     echo form_input(['name'=>'title','placeholder'=>'Event Title','value'=>set_value('title')]);

     echo "<br/><br/>";
     echo "Enter Event start_date : <br/>";
     echo form_input(['name'=>'start_date','type'=>'date','value']);

     echo "<br/><br/>";

     echo "Enter Event end_date : ";  echo form_input(['name'=>'end_date','type'=>'date','value']);

     echo "<br/><br/>";

     echo form_submit(['name'=>'submit','value'=>'Add Event','class'=>'btn btn-primary']);

     echo form_close();




	?>

</body>
</html>
