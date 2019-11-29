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

    <?php

  // echo "<pre>";
  // echo var_dump($uad->result());
  // echo "</pre>";

  //$ua = $uad->result();

 // $ua = $uad->fetch_all(MYSQLI_ASSOC);

  //echo $ua.assignment_no;
    
    if($uad->result())
    {

      
    foreach ($uad->result() as $i => $u) {
    $ua[$i]['a_no'] = $u->assignment_no;
    $ua[$i]['t'] = $u->text;
    $ua[$i]['p'] = $u->pdf_path;
    }

    // echo "SUBMITTED ASSIGNMENTS NO<br/>";

    // echo "<pre>";
    // echo var_dump($ua);
    // echo "</pre>";

  }else
  {
    $ua[0]['t'] = NULL;
  }

  $submitted_assignments_no = Array();
    foreach ($uad->result() as $i => $ua1) {
    $submitted_assignments_no[$i] = $ua1->assignment_no;
    }



  // echo "<pre>";
  //  echo var_dump($ua);
  //  echo "</pre>";



  ?>

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
          <th>Update</th>
          <th>view</th>
          <th>Marks</th>

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
    					{ 
    						echo "<button class='btn btn-warning' onclick='uploadPDF(".$a->assignment_no.")'".(in_array($a->assignment_no, $submitted_assignments_no) ? 'disabled' : '')." >Upload PDF</button>";
    						
    					 } ?>

              <?php 
    					 if ($a->type == 2) { 
    					 		echo "<button class='btn btn-warning' onclick='uploadText(".$a->assignment_no.")'".(in_array($a->assignment_no, $submitted_assignments_no) ? 'disabled' : '')." >Upload Text</button>";
    					  } ?>               
    					
    				</td>
            <td>
              <?php if(in_array($a->assignment_no, $submitted_assignments_no)){ ?>
              <p class="text-success">Submitted</p>
            <?php }else{ ?>
              <p class="text-danger">Not Submitted yet</p> 
            <?php } ?>
              
            </td>
    				<td>
    					<?php if($a->type == 1)
              { 
                echo "<button class='btn btn-primary' onclick='updatePDF(".$a->assignment_no.")'".(in_array($a->assignment_no, $submitted_assignments_no) ? '' : 'disabled')." >Update PDF</button>";
                
               } ?>

              <?php 
               if ($a->type == 2) { 

                $key = array_search($a->assignment_no, array_column($ua, 'a_no'));

                
                $submitted_text = $ua[$key]['t'];
                $submitted_text = trim($submitted_text);

                if($submitted_text!=NULL)
                {
                 //echo "$submitted_text";
                }
                  $str = "<input type='hidden' id='id".$a->assignment_no."' value='".$submitted_text."'>";
                   echo $str."<button class='btn btn-primary' onclick='updateText(".$a->assignment_no.",document.getElementById(\"id".$a->assignment_no."\").value)'".(in_array($a->assignment_no, $submitted_assignments_no) ? '' : 'disabled').">Update Text</button>";
                } 
                ?>   
    					
    				</td>
            <td>
             <?php if($a->type == 1)
              { 
                // echo "<button class='btn btn-success' onclick='uploadPDF(".$a->assignment_no.")'".(in_array($a->assignment_no, $submitted_assignments_no) ? '' : 'disabled')." >View PDF</button>";
                
                $key = array_search($a->assignment_no, array_column($ua, 'a_no'));

                
                $pdf_path = $ua[$key]['p'];
                //$submitted_text = trim($submitted_text);

                $strV = "<input type='hidden' id='idpv".$a->assignment_no."' value='".$pdf_path."'>";
                echo $strV."<button class='btn btn-primary' onclick='viewPDF(".$a->assignment_no.",document.getElementById(\"idpv".$a->assignment_no."\").value)'".(in_array($a->assignment_no, $submitted_assignments_no) ? '' : 'disabled').">View PDF</button>";

               } ?>

              <?php 
               if ($a->type == 2) { 
                  
                $key = array_search($a->assignment_no, array_column($ua, 'a_no'));

                
                $submitted_text = $ua[$key]['t'];
                //$submitted_text = trim($submitted_text);

                $strV = "<input type='hidden' id='idv".$a->assignment_no."' value='".$submitted_text."'>";
                echo $strV."<button class='btn btn-primary' onclick='viewText(".$a->assignment_no.",document.getElementById(\"idv".$a->assignment_no."\").value)'".(in_array($a->assignment_no, $submitted_assignments_no) ? '' : 'disabled').">View Text</button>";
                } ?>   
              
            </td>
            <td>
              <p class="text-danger">Not assessd yet</p>
              
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
            echo form_hidden($data); ?>
		 <input type="hidden" name="assignment_no" id="text_assignment_no" value="">
			<?php echo "Type assignment Text&nbsp; :&nbsp; ";
			echo form_textarea(['name'=>'a_text','class'=>'form-control','id'=>'my123','placeholder'=>' Assignment   ']); 
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

<!------------------ The Text Update Assignment Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="updatessignmentTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
        <?php echo form_open('Student/update_assignment_text'); 



          $data = array(
                    'course_code'  => $course_code,
                   'course_name' => $course_name,
                    'rollno' => $rollno
                          );
            echo form_hidden($data); ?>
     <input type="hidden" name="assignment_no" id="update_text_assignment_no" value="">
      
      <?php echo "Type assignment Text to Update &nbsp; :&nbsp; "; ?>

      <textarea name="updated_a_text" id="myassignment" value="" class="form-control" placeholder="Assignment" type="textarea" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off></textarea><br>

      
      
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

<!------------------ The View Text  Assignment Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="viewAssignmentTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View submitted assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
        
     
     <div align="left" id="viewmyassgnmenttext">
       
     </div>
      
      
          <!-- Modal footer -->
          
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    ); 
                    echo form_hidden($data);  ?>
            

			<div class="form-group">
		      <label for="userfile" class="col-lg-4 control-label">Select PDF of assignment to Upload : </label>
		      <div>
            <input type="hidden" name="assignment_no" id="pdf_assignment_no" value="">
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

<!------------------ The PDF Update Assignment Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="updateAssignmentPdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
        <?php echo form_open_multipart('Student/update_assignment_pdf'); 



          $data = array(
                    'course_code'  => $course_code,
                   'course_name' => $course_name,
                   'rollno' => $rollno
                    ); 
                    echo form_hidden($data);  ?>
            

      <div class="form-group">
          <label for="userfile" class="col-lg-4 control-label">Select PDF of assignment to Upload : </label>
          <div>
            <input type="hidden" name="assignment_no" id="update_pdf_assignment_no" value="">
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

<!------------------ The View PDF Assignment Modal ------------------------------>


<!-- Modal -->
<div class="modal fade" id="viewAssignmentPDFModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View submitted assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
        
     
     

      <div class="container">

  <center>

    <object id="viewmyassgnmentpdf" data="" type="application/pdf" width="80%" height="1000px">

        </object>

  </center>

 </div>
       
     
      
      
          <!-- Modal footer -->
          
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   </div>
       
            </div>
           </div>
          </div>
        </div>
      


</div>
<!-- ------------------------------------------------------------------------------------- -->

</div>

</body>

<script type="text/javascript">
  function uploadText(a_no)
  {
    var an = a_no;

   $('#uploadAssignmentTextModal').modal("show");

   document.getElementById('text_assignment_no').value = an; 

   //console.log(an);          
         
  }

  function uploadPDF(a_no)
  {
    var an = a_no;

   $('#uploadAssignmentPdfModal').modal("show");

   document.getElementById('pdf_assignment_no').value = an; 

  }

  function updateText(a_no,submitted_text)
  {
    var an = a_no;
    
   $('#updatessignmentTextModal').modal("show");

   
   document.getElementById('update_text_assignment_no').value = an; 
   document.getElementById('myassignment').value = submitted_text ;
  }

  

  function viewText(a_no,submitted_text)
  {
    var an = a_no;
    //alert(submitted_text);
   //  console.log(a_no);
   // console.log(submitted_text);


   $('#viewAssignmentTextModal').modal("show");

   
   //document.getElementById('update_text_assignment_no').value = an; 
   document.getElementById('viewmyassgnmenttext').innerHTML = "<pre>"+submitted_text+"</pre>" ;
  }

  function updatePDF(a_no)
  {
     var an = a_no;

   $('#updateAssignmentPdfModal').modal("show");

   document.getElementById('update_pdf_assignment_no').value = an; 

  }

  function viewPDF(a_no,submitted_text)
  {
    var an = a_no;
    //alert(submitted_text);
   console.log(a_no);
   console.log(submitted_text);


   

   
   //document.getElementById('update_text_assignment_no').value = an; 
   document.getElementById('viewmyassgnmentpdf').data = submitted_text;

   $('#viewAssignmentPDFModal').modal("show");
  }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>