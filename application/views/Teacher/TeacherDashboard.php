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
      

          <div class="form-group">
          <div class="form-check">
  <table class="table table-hover">
          <?php $i=0; ?>
      <tr>
          <?php foreach( $courses->result() as $course ): ?>

         
      <div class="form-check" align="left">
     

     <?php 

     echo "<input type='checkbox'  class='form-check-input' id='cc' value='$course->course_code' >
        <label class='form-check-label' for='exampleCheck1'>".$course->course_code.' ( '.$course->name.' ) '."</label>";
        $i++;
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

      <button type="button" class="btn btn-primary" onclick="saveMySubjects()">Save changes</button>
            </div>
           </div>
          </div>
        </div>
      </div>

<!-- -------------------------------------------------------------- -->


</div></center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 <script type="text/javascript">

  function saveMySubjects(){
      
      var c = document.getElementById('cc');
      for(var i in c)
      {
        console.log(c);
      }
      // var firstname = $('#firstname').val();
      // var lastname = $('#lastname').val();
      // var email = $('#email').val();
      // var mobile = $('#mobile').val();


      // $.ajax({
      //   url:"backend1.php",
      //   type:"POST",
      //   data: {
      //     firstname: firstname,
      //     lastname: lastname,
      //     email: email,
      //     mobile: mobile
      //   },

      //   success:function(data,status){
      //     readRecords();
      //   }
      // });

       
  }

   
 </script>

</body>
</html>