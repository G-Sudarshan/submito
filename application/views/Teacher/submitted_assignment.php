<?php

if(!$this->session->userdata('teacher_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Check Submitted Assignments</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap font awesome link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
  <!-- Style -->
  <style type="text/css">

    /* body */
    .hm-gradient 
    {
        background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
        font-family: 'Source Sans Pro', sans-serif;
    } 

  </style>
</head>
<body class="hm-gradient">

  <?php
    if($sad->result())
    {    
      foreach ($sad->result() as $i => $u) 
      {
        $sa[$i]['a_no'] = $u->assignment_no;
        $sa[$i]['rollno'] = $u->rollno;
        $sa[$i]['t'] = $u->text;
        $sa[$i]['p'] = $u->pdf_path;
      }
    }
    else
    {
      $sa[0]['t'] = NULL;
    }
  ?>

  <section>

    <!-- ------------------------------------------ Header --------------------------------------------- -->
    
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="#">SubMito!</a>
    </nav>

    <!-- -------------------------------------------------------------------------------------------------- -->
    <!-- -------------------------------------- Content ----------------------------------------------- -->

    <div class="container-fluid">
      <div align="left">&nbsp;
        <h4> <?php
                    echo form_open('Teacher/back_to_checked_assignments');
                    $data = array(
                             'course_code'  => $course_code,
                             'course_name' => $course_name,
                             'teacher_name' => $teacher_name
                              );
                    echo form_hidden($data);?>
                  <!-- i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i>  --><?
                   $data = array(
                      'name' => 'submit',
                      'value' => 'true',
                      'type' => 'submit',
                      'class' => 'btn btn-default btn-lg',
                      'content' => '<i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i>'
                    );

                    echo form_button($data); 
                    echo form_close();
                  ?> </h4>
      </div>
    </div>

    <div class="container" align="center">

      <h2>Check Submitted Assignment</h2>
      <h4><?= $course_name; ?><br/><?= $course_code ?><br/></h4>
      <h5><?= "Assignment No:".$assignment_no ?></h5>

      <!-- Flashdata -->
      <?php 
        if($success = $this->session->flashdata('success')): 
          echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
        endif; 
      ?>
      <br/><br/>

      <div align="left">
        <?php
          echo form_open('Teacher/load_previously_checked_assignment');
          $data = array(
                   'course_code'  => $course_code,
                   'course_name'  => $course_name,
                   'assignment_type' => $assignment_type,
                   'assignment_no' => $assignment_no,
                   'teacher_name' => $teacher_name
                    );
          echo form_hidden($data);
          echo form_submit('submit', 'Previously checked assignments',"class='btn btn-primary btn-sm '");
          echo form_close();
        ?>
        <br/>
        
        <br/><br/>
      </div>

      <?php 
        if($assignment_type == 1 ) 
        {
      ?>
          <div>
            <table class="table table-striped">
              <thead>
                <th>Roll No.</th>
                <th>Submitted On</th>
                <th>View</th>
                <th>Marks</th>
                <th>Submit</th>
                <th>Send Feedback</th>
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
                               'assignment_type' => $assignment_type,
                               'teacher_name' => $teacher_name
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
                  <td>
                    <?php 
                   
                    echo "<button class='btn btn-primary' onclick='sendFeedback(\"".$a->rollno."\",\"".$course_code."\",\"".$a->assignment_no."\",\"".$assignment_type."\",\"".$teacher_name."\",\"".$course_name."\"".")'><i class='fa fa-paper-plane' ></i>&nbsp;Send Feedback</button>" ?></td>  
                </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

      <?php
        } 
        elseif ($assignment_type == 2) 
        { 
      ?>
          <div>
            <table class="table table-striped">
              <thead>
                <th>Roll no.</th>
                <th>Submitted On</th>
                <th>View</th>
                <th>Marks</th>
                <th>Submit</th>
                <th>Send Feedback</th>
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
                               'assignment_type' => $assignment_type,
                               'teacher_name' => $teacher_name
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
                  <td>
                    <?php 
                   
                    echo "<button class='btn btn-primary' onclick='sendFeedback(\"".$a->rollno."\",\"".$course_code."\",\"".$a->assignment_no."\",\"".$assignment_type."\",\"".$teacher_name."\",\"".$course_name."\"".")'><i class='fa fa-paper-plane' ></i>&nbsp;Send Feedback</button>" ?></td>  
                </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

      <?php   
        }
        else 
        {
          echo "Error : Contact Developer";
        }
      ?>

    </div>

    <!-- -------------------- The Send Feedback Modal--------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="sendFeedbackModal" tabindex="-3" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Send Feedback</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="form-group">
            <?php 
              echo form_open('Teacher/sendFeedback'); 
              ?>

              <input type="hidden" id="feedback_rollno" name="rollno">
              <input type="hidden" id="feedback_course_code" name="course_code">
              <input type="hidden" id="feedback_course_name" name="course_name">
              <input type="hidden" id="feedback_teacher_name" name="teacher_name">
              <input type="hidden" id="feedback_assignment_no" name="assignment_no">
              <input type="hidden" id="feedback_assignment_type" name="assignment_type">

              <span id="ft"></span><br/>
              <?php 
             // echo "Feedback :&nbsp; "."<br/>";
              echo form_textarea(['name'=>'feedback','class'=>'form-control','id'=>'my123','placeholder'=>' Your Feedback to Student'],'','required'); 
            ?>
              
          </div>
        </div>
        <!-- Modal footer -->        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php 
            echo form_submit('submit', 'Send Feedback',"class='btn btn-success'");
            echo form_close(); 
          ?>
        </div> 
      </div>
    </div>
  </div>

  <!-- ----------------------------------------------------------------------------------------------------- -->

    <!-- ------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------- Footer ----------------------------------------------- -->

    <br/><br/><br/><br/><br/><br/><br/><br/>
    <footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>

    <!-- ------------------------------------------------------------------------------------------------ -->

  </section>

  <!-- --------------------------------------------------------------------------------------------- -->
  <!-- ----------------------------The View PDF Assignment Modal------------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="viewAssignmentPDFModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <!-- Modal Header-->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">View Submitted Assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          <div class="form-group">
            <div class="container">
              <center>
                <div id = "viewmyassgnmentpdf"></div>
              </center>
            </div>
          </div>
        </div>
        <!-- Modal footer -->     
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        

  <!-- ------------------------------------------------------------------------------------------------ -->
  <!-- ----------------------------------The View Text Assignment Modal------------------------------------ -->

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
            <div align="left" id="viewmyassgnmenttext"></div>
          </div>
        </div>
        <!-- Modal footer -->     
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 

  <!-- --------------------------------------------------------------------------------------------------- -->

  <!-- Script links -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript">

   	function viewPDF(a_no,submitted_text)
    {
      var an = a_no;
      console.log(a_no);
      console.log(submitted_text);
      var str = '<object data="'+submitted_text+'" type="application/pdf" width="80%" height="1000px"></object>';
      document.getElementById('viewmyassgnmentpdf').innerHTML = str;
      $('#viewAssignmentPDFModal').modal("show");
    }

    function viewText(a_no,submitted_text)
    {
      var an = a_no;
      $('#viewAssignmentTextModal').modal("show");
      document.getElementById('viewmyassgnmenttext').innerHTML = "<pre><xmp>"+submitted_text+"</xmp></pre>" ;
    }

     function sendFeedback(rollno,course_code,assignment_no,assignment_type,teacher_name,course_name)
    {
      //var an = a_no;
      console.log('send feedback');
      console.log(rollno);
      console.log(course_code);
      console.log(assignment_no);
      console.log(assignment_type);
      console.log(teacher_name);
      console.log(course_name);
      $('#sendFeedbackModal').modal("show");
      document.getElementById('ft').innerHTML ="<b>Feedback to "+rollno+" : </b>";

      document.getElementById('feedback_rollno').value = rollno; 
      document.getElementById('feedback_course_code').value = course_code; 
      document.getElementById('feedback_course_name').value = course_name; 
      document.getElementById('feedback_teacher_name').value = teacher_name; 
      document.getElementById('feedback_assignment_no').value = assignment_no; 
      document.getElementById('feedback_assignment_type').value = assignment_type; 

     // document.getElementById('pdf_assignment_no').value = an; 

     // <input type="hidden" id="feedback_rollno" name="rollno">
     //          <input type="hidden" id="feedback_course_code" name="course_code">
     //          <input type="hidden" id="feedback_course_name" name="course_name">
     //          <input type="hidden" id="feedback_teacher_name" name="teacher_name">
     //          <input type="hidden" id="feedback_assignment_no" name="assignment_no">
     //          <input type="hidden" id="feedback_assignment_type" name="assignment_type">
    }


  </script>         

</body>
</html>