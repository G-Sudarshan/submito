<!DOCTYPE html>
<html>
<head>
	<title>Upload Assignments</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container" align="center">
	<h1 class="text-primary">Upload Assignment</h1>
	<h3 class="text-success"><?= $course_name; ?><br/><?= $course_code ?></h3>
	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>
	<div align="left">
	<a class="btn btn-info" href="<?= base_url('Student'); ?>" >Back to Student Dashboard</a>
    </div><br/>

    <div>
    	<table class="table table-striped">
    		<thead>

    			<th>Assignment no.</th>
    			<th>Title</th>
    			<th>Description</th>
    			<th>Assigned By</th>
    			<th>Last date to submit</th>
    			<th>Type</th>
    			<th>Upload</th>
    			<th>Submission Status</th>

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
    					<?= $a->description; ?>
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
    					<?php if($a->type == 1)
    					{ ?>
    						<button class="btn btn-warning" data-toggle="modal" data-target="#uploadAssignmentPdfModal">Upload PDF</button>
    						
    					<?php }
    					 elseif ($a->type == 2) { ?>
    					 		<button class="btn btn-warning" data-toggle="modal" data-target="#uploadAssignmentTextModal">Upload Text</button>
    					 <?php }
    					 else {
    					  	echo "Error : contatct developer";
    					  } ?>
    					
    				</td>
    				<td>
    					<button class="btn btn-danger ">Delete</button>
    					
    				</td>
    			</tr>

    		<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>

    <!------------------ The Text Upload Assignment Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="uploadAssignmentTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
        <?php echo form_open('Student/upload_assignment_text'); 



        	$data = array(
                    'course_code'  => $course_code,
                   'course_name' => $course_name,
                    'rollno' => $rollno
                          );
            echo form_hidden($data); 
			
			echo "Type assignment Text&nbsp; :&nbsp; ";
			echo form_textarea(['name'=>'a_text','class'=>'form-control','placeholder'=>' Assignment   ']); 
			?>
			
		  
          <!-- Modal footer -->
          
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

         
     <?php 

      echo form_submit('submit', 'Submit',"class='btn btn-primary'");

       echo form_close(); ?>
   </div>
       
            </div>
           </div>
          </div>
        </div>
      


</div>
<!-- ------------------------------------------------------------------------------------- -->

<!------------------ The PDF Upload Assignment Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="uploadAssignmentPdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
        <?php echo form_open_multipart('Student/upload_assignment_pdf'); 



        	$data = array(
                    'course_code'  => $course_code,
                   'course_name' => $course_name,
                   'rollno' => $rollno
                   
                    ); ?>
            

			<div class="form-group">
		      <label for="inputEmail" class="col-lg-4 control-label">Select PDF of assignment to Upload : </label>
		      <div>
		        <?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
		      </div>
		    </div>
			
		   
		   
          <!-- Modal footer -->
          
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

         
     <?php 

      echo form_submit('submit', 'Submit',"class='btn btn-primary'");

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