<!DOCTYPE html>
<html>
<head>
	<title>Teacher Dashboard </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div class="container" align="right">
		
		<a class="btn btn-outline-danger" href=<?= base_url('Login/logout'); ?>  >Log out</a>

<br/><br/>

	</div>

	<center><div class="container">

<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
    
<h1> Teacher Dashboard </h1>
<?php 

echo "Welcome : ".$teacherData->name."<br/>";
echo "Department : ".$teacherData->department."<br/>";
echo "Department id : ".$teacherData->department_id."<br/>";
echo " your username  : ".$teacherData->username."<br/>";
echo "your staff id : ".$teacherData->staff_id."<br/>";


?> 

<br/><br/>

<h1>Assignments to be checked </h1>
  <table class="table table-hover">
    <thead>
      <tr>
        <td>Sr. No.</td>
        <td>subject</td>
        <td>Assignment no.</td>
        <td>Roll no</td>
        <td>Student Name</td>
        <td>Assignment</td>
        <td>Upload date and time</td>
        
        
        
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <? if( count($a_data)): ?>
          <?php $count = 0; ?>
          <?php foreach( $a_data->result() as $a ): ?>
        <td><?= ++$count ?></td>
        <td><?= $a->subject; ?></td>
        <td><?= $a->assignment_no; ?></td>
        <td><?= $a->rollno; ?></td>
        <td><?= $a->name; ?></td>
        <td><?= anchor($a->pdf_path,'view assignment') ?></td>
        <td><?= $a->upload_datetime; ?></td>
      </tr>
        

   <?php endforeach; ?>

      <? else : ?>
        <tr>
        <td colspan="3"> No more assignments for checking.</td>
          </tr>
        <? endif; ?>

        </tbody>
  </table> 




</div></center>

</body>
</html>