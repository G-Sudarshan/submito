<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<?php 

	$this->load->helper('form');
  
      echo form_open('Mycal/add_event');


      echo "<br/><br/>";

      echo "Enter Event Title : ";

     echo form_input(['name'=>'title','placeholder'=>'Event Title','value'=>set_value('title')]);

     echo "<br/><br/>";
     echo "Enter Event Description : <br/>";
     echo form_textarea(['name'=>'body','placeholder'=>'Event Description','value'=>set_value('body')]);

     echo "<br/><br/>";

     echo "Enter Event Date : ";  echo form_input(['name'=>'date','type'=>'date','value'=>set_value('date')]);

     echo "<br/><br/>";

     echo form_submit(['name'=>'submit','value'=>'Add Event','class'=>'btn btn-primary']);

     echo form_close();




	?>

</body>
</html>
