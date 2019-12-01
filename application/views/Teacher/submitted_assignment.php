<!DOCTYPE html>
<html>
<head>
	<title>Check Submitted Assignment</title>
	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<?php

	 if($sad->result())
    {

      
    foreach ($sad->result() as $i => $u) {
    $sa[$i]['a_no'] = $u->assignment_no;
    $sa[$i]['rollno'] = $u->rollno;
    $sa[$i]['t'] = $u->text;
    $sa[$i]['p'] = $u->pdf_path;
    }

    // echo "SUBMITTED ASSIGNMENTS NO<br/>";

    // echo "<pre>";
    // echo var_dump($ua);
    // echo "</pre>";

  }else
  {
    $sa[0]['t'] = NULL;
  }

	?>
	<div class="container" align="center">
	<h1 class="text-primary">check Submitted assignment</h1>
	<h3 class="text-success"><?= $course_name; ?><br/><?= $course_code ?><br/><?= "Assignment no :".$assignment_no ?></h3>

	<?php if($success = $this->session->flashdata('success')): 
		echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
	 endif; ?>

	<div align="left">
	<a class="btn btn-info" href="<?= base_url('Teacher'); ?>" >Back to Teacher Dashboard</a>
	<br/><br/> 

	<?php
		          echo form_open('Teacher/load_previously_checked_assignment');

		          $data = array(
		                   'course_code'  => $course_code,
		                   'course_name'  => $course_name,
		                   //'teacher_name' => $teacher_name,
		                   'assignment_type' => $assignment_type,
		                   'assignment_no' => $assignment_no
		                    );
		            echo form_hidden($data);

		           echo form_submit('submit', 'Previously checked assignments',"class='btn btn-primary btn-sm '");


		            echo form_close();

          ?>
 
	<button class="btn btn-success btn-sm">Print rollno and marks matrix</button>

    </div>
    <br/>

    <?php if($assignment_type == 1 ) 
          {
          	?>
          	  <div>
    	<table class="table table-striped">
    		<thead>

    			<th>Roll no.</th>
    			<th>Submitted On</th>
    			<th>View</th>
    			<th>Marks</th>
    			<th>submit</th>
    			

    		</thead>
    		<tbody>
    			<?php foreach ($sad->result() as $a): 

    				if($a->checked == 0):?>
    			
    			
    			<tr>
    				<td class="text-primary"><?= $a->rollno ?></td>
    				<td><?= $a->upload_datetime ?></td>
    				<td>


    					<?php
    			$key = array_search($a->rollno, array_column($sa, 'rollno'));

                
                $pdf_path = $sa[$key]['p'];
                //$submitted_text = trim($submitted_text);

                $strV = "<input type='hidden' id='idpv".$a->rollno."' value='".base_url($pdf_path)."'>";
                echo $strV."<button class='btn btn-primary' onclick='viewPDF(".$a->assignment_no.",document.getElementById(\"idpv".$a->rollno."\").value)'".">View PDF</button>";
    					?>

    				</td>
    				<td>
    					<?php

    					echo form_open('Teacher/submit_marks');

    					$data = array(
		                   'course_code'  => $course_code,
		                   'rollno' => $a->rollno,
		                   'assignment_no' => $a->assignment_no,
		                   'assignment_type' => $assignment_type
		                    );
		            echo form_hidden($data);

    					echo form_input(['name'=>'marks','class'=>'form-control col-lg-2']);

    					?>
    				</td>
    				<td>
    				 <?php

    				 echo form_submit(['name'=>'submit','value'=>'submit','class'=>'btn btn-success btn sm']);

    					echo form_close();

    					?>
    						
    					</td>
    				

    				
    				
    			</tr>
    		<?php endif; ?>
    		<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>





          	<?php
          } 
          elseif ($assignment_type == 2) 
          { ?>
          	<div>
    	<table class="table table-striped">
    		<thead>

    			<th>Roll no.</th>
    			<th>Submitted On</th>
    			<th>View</th>
    			<th>Marks</th>
    			<th>submit</th>
    			

    		</thead>
    		<tbody>
    			<?php foreach ($sad->result() as $a): 

    				if($a->checked == 0):?>
    			
    			
    			<tr>
    				<td class="text-primary"><?= $a->rollno ?></td>
    				<td><?= $a->upload_datetime ?></td>
    				<td>


    					<?php
    			$key = array_search($a->rollno, array_column($sa, 'rollno'));

                
                $submitted_text = $sa[$key]['t'];
                //$submitted_text = trim($submitted_text);

                $strV = "<input type='hidden' id='idtv".$a->rollno."' value='".$submitted_text."'>";
                echo $strV."<button class='btn btn-primary' onclick='viewText(".$a->assignment_no.",document.getElementById(\"idtv".$a->rollno."\").value)'".">View Text</button>";
    					?>

    				</td>
    				<td>
    					<?php

    					echo form_open('Teacher/submit_marks');

    					$data = array(
		                   'course_code'  => $course_code,
		                   'rollno' => $a->rollno,
		                   'assignment_no' => $a->assignment_no,
		                   'assignment_type' => $assignment_type
		                    );
		            echo form_hidden($data);

    					echo form_input(['name'=>'marks','class'=>'form-control col-lg-2']);

    					?>
    				</td>
    				<td>
    				 <?php

    				 echo form_submit(['name'=>'submit','value'=>'submit','class'=>'btn btn-success btn sm']);

    					echo form_close();

    					?>
    						
    					</td>
    				

    				
    				
    			</tr>
    		<?php endif; ?>
    		<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>

    	
    	<?php   }
    	 else {
    	 echo "Error : contatct developer";
    		  }
          ?>

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
    <div id = "viewmyassgnmentpdf">
      
    </div>
    

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


 <script type="text/javascript">
 	function viewPDF(a_no,submitted_text)
  {
    var an = a_no;
    //alert(submitted_text);
   console.log(a_no);
   console.log(submitted_text);
   //alert(submitted_text);
   var str = '<object data="'+submitted_text+'" type="application/pdf" width="80%" height="1000px"></object>';

   

   
   //document.getElementById('update_text_assignment_no').value = an; 
   document.getElementById('viewmyassgnmentpdf').innerHTML = str;
   // document.getElementById('viewmyassgnmentpdf').reload();
   $('#viewAssignmentPDFModal').modal("show");
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
 </script>         

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>