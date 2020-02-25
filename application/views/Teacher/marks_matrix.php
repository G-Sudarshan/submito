<?php
  if(!$this->session->userdata('teacher_id'))
          return redirect('Login');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Marks Matrix</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap font awesome link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->



 



   <style type="text/css">
   	 .hm-gradient 
    {
        background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
        font-family: 'Source Sans Pro', sans-serif;
    }


   </style>
</head>
<body>
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	      <a class="navbar-brand mr-1" href="#">SubMito!</a>
	    </nav>
<div class="hm-gradient">
	<div  align="center" id="pdiv">
	<br/><h4 class="text-primary">Marks Matrix</h4>
	
	<h5 class="text-success"><?= $course_name; ?></h5>
	
	<h5 class="text-success"><?= $course_code; ?></h5>
	
	<h5 class="text-success"><?= $teacher_name; ?></h5>
 <?php if($success = $this->session->flashdata('success')): 
              echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
            endif; 
      ?>
	 <div class="container-fluid">
          <div align="left">&nbsp;
            <h4><a href="<?= base_url('Teacher'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
          </div>

           <div class="container-fluid">
          <div align="right">&nbsp;
            
                    <?php
                    echo form_open('Teacher/exprint');
                    $data = array(
                             'course_code'  => $course_code,
                             'course_name' => $course_name,
                             'teacher_name' => $teacher_name
                              );
                    echo form_hidden($data);
                    echo form_submit('submit', 'Export to Excel or Print',"class='btn btn-primary btn-sm '");
                    echo form_close();
                  ?>    
                </h4>
          </div>
         

          

	<h6 class="" align="left"> NA : Not Assessed <br/> - : Not Submitted</h6>

	<br>
	<table class="table" border="2" id="ex">

		<thead>
			<th>Roll No.</th>
			<?php
			foreach ($sac as $an) {
				echo "<th>".$an->assignment_no."</th>";
			}
			?>
			<th><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Update</th>
			
		</thead>
		<tbody>
			<?php foreach ($rn->result() as $r){ ?>
			<tr>
				<?php  echo form_open('Teacher/UpdateMarksThroughMatrix'); ?>
				<td>
					<?= $r->rollno; ?>
					<input type="hidden" name="rollno" value="<?= $r->rollno; ?>">	
					<input type="hidden" name="course_code" value="<?= $course_code; ?>">
					<input type="hidden" name="teacher_name" value="<?= $teacher_name; ?>">
					<input type="hidden" name="course_name" value="<?= $course_name; ?>">
					</td>

				<?php 
				foreach ($sac as $an) {
					$flag = 0;
				  foreach ($matrix as $m) {

				 	if($m->rollno == $r->rollno )
					{
				     
				     $current_static_assignment =  $an->assignment_no;

				      				
						if($current_static_assignment == $m->assignment_no)
					{
						if($m->marks == 0)
						{
						?>
							<td><input type="" name="marksmatrixstudent[<?= $current_static_assignment ?>]" class="form-control" placeholder="NA" required></td>
						<?php }else
						{


						?>




						<td><input type="" name="marksmatrixstudent[<?= $current_static_assignment ?>]" class="form-control" value="<?= $m->marks; ?>" required>
						</td>
						<?php
					    }
						$flag = 1;
						break;
					}

							
			}
			 } 
			 if($flag == 0)
			 	{
			 		echo "<td>-</td>";
			 	}} ?>
			
			<td><?php echo form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']) ?></td>
			<?php echo form_close(); ?>
				
			</tr>
		<?php } ?>
		</tbody>
			
	</table>

</div>
<br/><br/>

</div></div></div>

<footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>

 
</body>
  

</html>