<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



</head>
<body>
	<div class="container" align="right">
		
		<a class="btn btn-outline-danger" href=<?= base_url('Login/logout'); ?>  >Log out</a>

		<br/><br/>
    <a class="btn btn-outline-primary" href=<?= base_url('Student/load_change_password_student'); ?>  >Change Password</a>

<br/><br/>

	</div>
	<center><div class="container"><h1>Student Dashboard</h1>

	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
	 <br/><br/>
<?php

echo "Welcome : ".$studentData->name."<br/>";
echo "Your roll no : ".$studentData->rollno."<br/>";
echo "Deapartment : ".$studentData->department."<br/>";
echo "Deapartment id : ".$studentData->department_id."<br/>";
echo "Your mobile no : ".$studentData->mobile_no."<br/>";
?>
<div class="container">


	
	<div class="col-lg-4" >
	<?php 
	// echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
	</div>
	<?php
	// echo "<br/><br/>";

	// echo form_hidden('name',$studentData->name);
	// echo form_hidden('rollno',$studentData->rollno);

	// echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']);
	// echo form_submit(['name'=>'submit','value'=>'Upload','class'=>'btn btn-primary']);

	// echo form_close();

	?>
	</div>

	<button class="btn btn-primary" data-toggle="modal" data-target="#mySubjectModal">My Subjects</button>




<!------------------ The My Subject Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="mySubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">My Subjects</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
     <?php echo form_open('Student/saveMySubjects'); ?>

          <div class="form-group">
          <div class="form-check">
  <table class="table table-hover">
          
      <tr>
          <?php foreach( $courses->result() as $course ): ?>


         
    <div class="form-check" align="left">
       
     <?php 

       echo "<input type='checkbox' name='check_list[]'' value='$course->course_code'><label class='form-check-label' for='exampleCheck1'>"."&nbsp;&nbsp".$course->course_code.' ( '.$course->name.' ) '."</label>"

         ?>

      </div>

            </tr>
        
          
          <?php endforeach; ?></table>
      </div>
    </div>
  </div>
         
      
          <!-- Modal footer -->
          
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <?php  echo form_submit(['name'=>'submit','value'=>'Save changes','class'=>'btn btn-primary']);

            echo form_close();
           ?>
            </div>
           </div>
          </div>
        </div>
      </div>

<!-- -------------------------------------------------------------- -->


</div>


</div>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</center>
</body>
</html>