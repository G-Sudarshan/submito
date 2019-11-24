<!DOCTYPE html>
<html>
<head>
	<title>Create Assignments</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container" align="center">
	<h1 class="text-primary">Create Assignment</h1>
	<h3 class="text-success"><?= $course_name; ?><br/><?= $course_code ?></h3>
	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
	<div align="left">
	<a class="btn btn-info" href="<?= base_url('Teacher'); ?>" >Back to Teacher Dashboard</a>
    </div>
    <br/>
    
    <div align="left">
    	    	<button class="btn btn-primary" data-toggle="modal" data-target="#createAssignmentModal">Create new assignment</button>
    </div>
    <br/>
    <div>
    	<table class="table table-striped">
    		<thead>

    			<th>Assignment no.</th>
    			<th>Title</th>
    			<th>Created By</th>
    			<th>Last date to submit</th>
    			<th>Type</th>
    			<th>Edit</th>
    			<th>Delete</th>

    		</thead>
    		<tbody>
    			<?php foreach ($cad->result() as $a): ?>
    			
    			
    			<tr>
    				<td>
    					<?= $a->assignment_no; ?>
    				</td>
    				<td>
    					<?= $a->name; ?>
    				</td>
    				<td>
    					<?= $a->created_by; ?>
    				</td>
    				<td>
    					<?= $a->deadline; ?>
    				</td>
    				<td>
    					<?php if($a->type == 1)
    					{
    						echo "PDF";
    					 }
    					 elseif ($a->type == 2) {
    					 		echo "Text";
    					 }
    					 else {
    					  	echo "Error : contatct developer";
    					  } ?>
    				</td>
    				<td>
    					<button class="btn btn-warning ">Edit</button>
    				</td>
    				<td>
    					<button class="btn btn-danger ">Delete</button>
    					
    				</td>
    			</tr>

    		<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>




















    <!------------------ The Create Assignment Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="createAssignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create new assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      	<div class="form-group">
        <?php echo form_open('Teacher/create_assignment'); 



        	$data = array(
                    'course_code'  => $course_code,
                   'course_name' => $course_name,
                   't_name' => $teacher_name
                    );
            echo form_hidden($data);
			echo "Enter assignment no :  ";
			echo form_input(['name'=>'a_no','class'=>'form-control','placeholder'=>' Assignment no. eg. 1,2,3,4 etc.']); 
			
			echo "Enter title of of assignment to be created &nbsp; :&nbsp; ";
			echo form_input(['name'=>'a_title','class'=>'form-control','placeholder'=>' Title of assignment eg. Write a program for Hello world in C ']); 
			echo "Enter description of assignment to be created &nbsp; :&nbsp; ";
			echo form_textarea(['name'=>'a_description','class'=>'form-control','placeholder'=>' description of assignment  ']);
			echo "Enter last date to submit for assignment to be created &nbsp; :&nbsp; ";
			echo form_input(['name'=>'a_deadline','type'=>'date','class'=>'form-control','placeholder'=>' Last date to submit assignment ','value'=>set_value('crs_code')]);
		   
		    echo "Choose assignment type &nbsp; :&nbsp; "; ?>
			
                <!-- <input id="gender" name="a_type" type="radio" class="form-control"  value="1" />
                <label for="a_type" class="form-control">PDF</label>

                <input id="a_type" name="a_type" type="radio" class="form-control" value="2" />
                <label for="a_type" class="form-control">Text</label> -->

                <div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="a_type" id="inlineRadio1" value="1">
				  <label class="form-check-label" for="inlineRadio1">PDF</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="a_type" id="inlineRadio2" value="2">
				  <label class="form-check-label" for="inlineRadio2">Text</label>
				</div>
		  
          <!-- Modal footer -->
          
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

         
     <?php 

      echo form_submit('submit', 'Create',"class='btn btn-primary'");

       echo form_close(); ?>
   </div>
       
            </div>
           </div>
          </div>
        </div>
      


</div>
<!-- ------------------------------------------------------------------------------------- -->

</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>