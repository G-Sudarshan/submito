<!DOCTYPE html>
<html>
<head>
	<title>Teacher Dashboard </title>
	  <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


 
</head>
<body>

	<div class="container" align="right">
		
		<a class="btn btn-outline-danger" href=<?= base_url('Login/logout'); ?>  >Log out</a>
    <br/><br/>
    <a class="btn btn-outline-primary" href=<?= base_url('Teacher/load_change_password_teacher'); ?>  >Change Password</a>

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
<div align="right">
<button class="btn btn-primary" data-toggle="modal" data-target="#mySubjectModal">Edit My Subjects</button>

<button class="btn btn-warning" data-toggle="modal" data-target="#myUpdateModal">Update My Info</button>
</div>

<br/>

<div>
  <table class="table table-striped">
    <thead>
      <th>Sr no.</th>
      <th>Course Code</th>
      <th>Name</th>
      <th>Actions</th>
      
    </thead>
    <tbody>
      <?php $i=1 ?>
      
        <?php foreach ($selectedcourses->result() as $selectedCourse):  ?>
          <tr>
        <td><?= $i++; ?></td> 
        <td><?= $selectedCourse->course_code; ?></td>
        <td><?= $selectedCourse->name; ?></td>
        <td>
          <button class="btn btn-info btn-sm">Create assignements</button>
          <button class="btn btn-success btn-sm">check assignements</button>
          <button class="btn btn-warning btn-sm">Upload front pages</button>
        </td>
      
      </tr>

      <?php endforeach; ?>
    </tbody>
    
  </table>  
</div>




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
        <?php echo form_open('Teacher/saveMySubjects'); ?>
      

          <div class="form-group">
          <div class="form-check">
  <table class="table table-hover">
          
      <tr>
          <?php foreach( $courses->result() as $course ): ?>

         
      <div class="form-check" align="left">
     

     <?php 

       echo "<input type='checkbox' name='check_list[]'' value='$course->course_code'".(in_array($course->course_code, $scc) ? ' checked="checked"' : '')." ><label class='form-check-label' for='exampleCheck1'>"."&nbsp;&nbsp".$course->course_code.' ( '.$course->name.' ) '."</label>"

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

         
     <?php 

      echo form_submit('submit', 'Save changes',"class='btn btn-primary'");

       echo form_close(); ?>
       
            </div>
           </div>
          </div>
        </div>
      


</div>

       <input type="hidden" id="curl" name="curl" value=<?= base_url('Teacher/saveMySubjects'); ?>>

       
      
<!-- -------------------------------------------------------------- -->

<!--------------------------------- updata model ------------------------------->

    <div class="modal" id="myUpdateModal">
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
            <?php echo form_open('Teacher/update_teacher'); ?>

      

  

  <?php 

  
  echo "Your Name :  ";
  echo form_input(['name'=>'teacher_name','placeholder'=>'Enter your name','class'=>'form-control','value'=>set_value('teacher_name',$teacherData->name)]);
   echo "<br/><br/>"; 
  
  echo "Your Email :  ";
  echo form_input(['name'=>'teacher_email','type'=>'email','placeholder'=>'Enter email eg. ganesha@gmail.com','class'=>'form-control','value'=>set_value('teacher_email',$teacherData->email)]); 
    echo "<br/><br/>";

   
    echo " Mobile no :  ";
  echo form_input(['name'=>'teacher_mobile','placeholder'=>'Enter your mobile no','class'=>'form-control','value'=>set_value('teacher_mobile',$teacherData->mobile_no)]); 
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
<!------------------------------------------------------------------------->



</div></center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>