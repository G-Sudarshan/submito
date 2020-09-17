<?php

if(!$this->session->userdata('student_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Assignments</title>
  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap font awesome link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <script> 
        function printDiv() { 
            var divContents = document.getElementById("viewmyassgnmenttext").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            var d = Date(); 
            var img = "<span><h2> Submitted Assignment   <img src='http://" + window.location.hostname + "/cms/assets/images/submito_verified.jpg' height='30px' width='30px'></h2></span>" 
    
  // Converting the number value to string 
            da = d.toString();
    
  // Printing the current date 
            a.document.write("<body>Printed on : " + da + " | assignment submitted online using SubMito! ");
            a.document.write(img); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 

        function printDivPDF()
        {  var divContents = document.getElementById("printPDFAssignment").innerHTML;
           var a = window.open('', '', 'height=500, width=500');
           var d = Date(); 
    
  // Converting the number value to string 
            da = d.toString();
    
  // Printing the current date 
            a.document.write("<body>Printed on : " + da + " | assignment submitted online using SubMito! ");
            a.document.write('<span><h2> Submitted Assignment   <img src="http://localhost/cms/assets/images/submito_verified.jpg" height="30px" width="30px"></h2></span>'); 
            a.document.write(divContents); 
            
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        }
    </script> 

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
  <div class="hm-gradient">

  <?php
    if($uad->result())
    {      
      foreach ($uad->result() as $i => $u) 
      {
        $ua[$i]['a_no'] = $u->assignment_no;
        $ua[$i]['t'] = $u->text;
        $ua[$i]['p'] = $u->pdf_path;
        $ua[$i]['c'] = $u->checked;
        $ua[$i]['m'] = $u->marks;
        $ua[$i]['d'] = $u->upload_datetime;
      }  
    }
    else
    {
      $ua[0]['t'] = NULL;
      $ua[0]['p'] = NULL;
      $ua[0]['c'] = NULL;
      $ua[0]['m'] = NULL;
      $ua[0]['d'] = NULL;
    }

    $submitted_assignments_no = Array();
    foreach ($uad->result() as $i => $ua1) 
    {
      $submitted_assignments_no[$i] = $ua1->assignment_no;
    }
  ?>

  <section>

    <!-- ----------------------------------------------- Header-------------------------------------------- -->    
    
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="#">SubMito!</a>
    </nav>

    <!-- ------------------------------------------------------------------------------------------------- -->
    <!-- ------------------------------------------ Content--------------------------------------------- -->

    <div class="container-fluid">
      <div align="left">&nbsp;
        <h4><a href="<?= base_url('Student'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
      </div>
    </div>

    <div class="container-fluid" align="center">
      <h1><?= $rollno; ?></h1>
      <h2>Upload Assignment</h2>
      <h4><?= $course_name; ?><br/><?= $course_code ?></h4>

      <!-- Flashdata -->
      <?php 
        if($success = $this->session->flashdata('success')): 
          echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
        endif; 
      ?>
      <br/><br/>

      <div>
        <table class="table table-striped">
          <thead>
            <th>Assignment No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Assigned By</th>
            <th>Last Date to Submit</th>
            <th>Type</th>
            <th>Upload</th>
            <th>Submission Status</th>
            <th>Update</th>
            <th>View</th>
            <th>Marks</th>
          </thead>
          <tbody>
            <?php foreach ($cad->result() as $a): ?>
            <tr>
              <td><?= $a->assignment_no; ?></td>
              <td><?= $a->name; ?></td>
              <td><?= $a->description; ?></td>
              <td><?= $a->created_by; ?></td>
              <td><?= $a->deadline; ?></td>
              <td>
                <?php 
                  if($a->type == 1)
                  {
                    echo "PDF";
                  }
                  elseif ($a->type == 2) 
                  {
                    echo "Text";
                  }
                  else 
                  {
                    echo "Error : contatct developer";
                  } 
                ?>
              </td>
              <td>
                <?php 
                  if($a->type == 1)
                  { 
                    echo "<button class='btn btn-warning' onclick='uploadPDF(".$a->assignment_no.")'".(in_array($a->assignment_no, $submitted_assignments_no) ? 'disabled' : '')." >Upload PDF</button>";
                  } 
                ?>
                <?php 
                  if ($a->type == 2) 
                  { 
                    echo "<button class='btn btn-warning' onclick='uploadText(".$a->assignment_no.")'".(in_array($a->assignment_no, $submitted_assignments_no) ? 'disabled' : '')." >Upload Text</button>";
                  } 
                ?>                   
              </td>
              <td>
                <?php 
                  if(in_array($a->assignment_no, $submitted_assignments_no))
                  { 
                ?>
                <p class="text-success">Submitted</p>
                <?php 
                  }
                  else
                  { 
                ?>
                <p class="text-danger">Not Submitted yet</p> 
                <?php 
                  } 
                ?>
              </td>
              <td>
                <?php 
                  if($a->type == 1)
                  { 
                    $key = array_search($a->assignment_no, array_column($ua, 'a_no'));
                    $checked = $ua[$key]['c'];
                    echo "<button class='btn btn-primary' onclick='updatePDF(".$a->assignment_no.")'".(in_array($a->assignment_no, $submitted_assignments_no) && $checked == 0  ? '' : 'disabled')." >Update PDF</button>";   
                  } 
                ?>
                <?php 
                  if ($a->type == 2) 
                  { 
                    $key = array_search($a->assignment_no, array_column($ua, 'a_no'));  
                    $submitted_text = $ua[$key]['t'];
                    $checked = $ua[$key]['c'];
                    $str = "<input type='hidden' id='id".$a->assignment_no."' value='".$submitted_text."'>";
                    echo $str."<button class='btn btn-primary' onclick='updateText(".$a->assignment_no.",document.getElementById(\"id".$a->assignment_no."\").value)'".(in_array($a->assignment_no, $submitted_assignments_no) && $checked == 0 ? '' : 'disabled').">Update Text</button>";
                  } 
                ?>               
              </td>
              <td>
                <?php 
                  if($a->type == 1)
                  { 
                    $key = array_search($a->assignment_no, array_column($ua, 'a_no'));
                    $marks = $ua[$key]['m'];
                    $submitted_on = $ua[$key]['d'];
                  
                    $strM = "<input type='hidden' id='idvM".$a->assignment_no."' value='".$marks."'>";
                    $pdf_path = $ua[$key]['p'];
                    $strV = "<input type='hidden' id='idpv".$a->assignment_no."' value='".base_url($pdf_path)."'>";
                    echo $strV.$strM."<button class='btn btn-primary' onclick='viewPDF(".$a->assignment_no.",document.getElementById(\"idpv".$a->assignment_no."\").value".",document.getElementById(\"idvM".$a->assignment_no."\").value".",\"".$course_name."\",\" ".$course_code." \",\" ".$rollno." \",\" ".$submitted_on." \")'".(in_array($a->assignment_no, $submitted_assignments_no) ? '' : 'disabled').">View PDF</button>";
                  } 
                ?>
                <?php 
                  if ($a->type == 2) 
                  {  
                    $key = array_search($a->assignment_no, array_column($ua, 'a_no'));
                    $submitted_text = $ua[$key]['t'];
                    $marks = $ua[$key]['m'];
                    $submitted_on = $ua[$key]['d'];
                    $strV = "<input type='hidden' id='idv".$a->assignment_no."' value='".$submitted_text."'>";
                    $strM = "<input type='hidden' id='idvM".$a->assignment_no."' value='".$marks."'>";
                    echo $strV.$strM."<button class='btn btn-primary' onclick='viewText(".$a->assignment_no.",document.getElementById(\"idv".$a->assignment_no."\").value".",document.getElementById(\"idvM".$a->assignment_no."\").value".",\"".$course_name."\",\" ".$course_code." \",\" ".$rollno." \",\" ".$submitted_on." \")'".(in_array($a->assignment_no, $submitted_assignments_no) ? '' : 'disabled').">View Text</button>";
                  } 
                ?>     
              </td>
              <td>
                <?php 
                  if(in_array($a->assignment_no, $submitted_assignments_no))
                  {
                    $key = array_search($a->assignment_no, array_column($ua, 'a_no'));
                    $checked = $ua[$key]['c'];
                    if($checked==1)
                    {
                      $marks = $ua[$key]['m'];
                      echo "<p class='text-success' >$marks</p>";
                    }
                    else
                    {
                ?>
                      <p class="text-danger">Not assessd yet</p>
                <?php 
                    } 
                  }
                  else
                  {
                ?>
                    <p class="text-danger">Not assessd yet</p>
                <?php
                  }
                ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

    <!-- -------------------------------------------------------------------------------------------- -->
  <!-- ------------------------------- The Text Upload Assignment Modal --------------------------------- -->

  <!-- Modal -->
  <div class="modal fade " id="uploadAssignmentTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Submit New Assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="form-group">
            <?php 
              echo form_open('Student/upload_assignment_text'); 
              $data = array(
                        'course_code'  => $course_code,
                       'course_name' => $course_name,
                        'rollno' => $rollno
                              );
              echo form_hidden($data); 
            ?>
              <input type="hidden" name="assignment_no" id="text_assignment_no" value="">
            <?php 
              echo "Type assignment Text&nbsp; :&nbsp; ";
              echo form_textarea(['name'=>'a_text','class'=>'form-control','id'=>'my123','placeholder'=>' Assignment', 'onpaste'=>'return false;','onselectstart'=>'return false', 'onpaste'=>'return false;', 'onCopy'=>'return false', 'onCut'=>'return false', 'onDrag'=>'return false', 'onDrop'=>'return false', 'autocomplete'=>'off'],'','required'); 
            ?>

           <!--  <textarea type="text" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/></textarea><br> -->
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
        
  <!-- ---------------------------------------------------------------------------------------------------- -->
  <!-- ----------------------------- The Text Update Assignment Modal ------------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="updatessignmentTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="form-group">
            <?php 
              echo form_open('Student/update_assignment_text'); 
              $data = array(
                      'course_code'  => $course_code,
                     'course_name' => $course_name,
                      'rollno' => $rollno
                            );
              echo form_hidden($data); 
            ?>
              <input type="hidden" name="assignment_no" id="update_text_assignment_no" value=""> 
            <?php 
              echo "Type Assignment Text to Update &nbsp; :&nbsp; "; 
            ?>
              <textarea name="updated_a_text" id="myassignment" value="" class="form-control" placeholder="Assignment" type="textarea" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off></textarea>
              <br/>
          </div>
        </div>
        <!-- Modal footer -->    
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
          <?php 
            echo form_submit('submit', 'Submit',"class='btn btn-primary'");
            echo form_close(); 
          ?>
        </div>
      </div>
    </div>
  </div>
         
  <!-- ---------------------------------------------------------------------------------------------------- -->
  <!-- --------------------------------------- The View Text Assignment Modal------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="viewAssignmentTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">View Submitted Assignment &nbsp;&nbsp;&nbsp;&nbsp;<button  onclick="printDiv()" class="btn btn-success btn-sm">Print</button></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body -->
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
        
  <!-- ---------------------------------------------------------------------------------------------------- -->
  <!-- ----------------------------------- The PDF Upload Assignment Modal--------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="uploadAssignmentPdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create new assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="form-group">
            <?php 
              echo form_open_multipart('Student/upload_assignment_pdf'); 
              $data = array(
                        'course_code'  => $course_code,
                       'course_name' => $course_name,
                       'rollno' => $rollno
                        ); 
              echo form_hidden($data);  
            ?>    
              <label for="userfile" class="col-lg-4 control-label">Select PDF of Assignment to Upload : </label>
              <div>
                <input type="hidden" name="assignment_no" id="pdf_assignment_no" value="">
                <?php echo form_upload(['name'=>'userfile','class'=>'form-control','accept'=>'application/pdf']); ?>
              </div>
              <p class="text-danger">
                Note: Upload PDF file of size less than 1MB (1024 KB)
              </p>
              <p class="text-success">
                If your PDF's size is more than 1 MB you can compress it on 
                <span class="text-primary"><a href="https://www.ilovepdf.com/compress_pdf" target="_blank"> ilovepdf.com</a> </span> 
                or
                <span class="text-primary"> <a href="https://pdfcandy.com/compress-pdf.html" target="_blank">pdfcandy.com</a> </span>
              </p>
          </div>
        </div>
        <!-- Modal footer -->        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php 
            echo form_submit('submit', 'Submit',"class='btn btn-primary'");
            echo form_close(); 
          ?>
        </div> 
      </div>
    </div>
  </div>

  <!-- ----------------------------------------------------------------------------------------------------- -->
  <!-- ----------------------------- The PDF Update Assignment Modal----------------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="updateAssignmentPdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="form-group">
            <?php 
              echo form_open_multipart('Student/update_assignment_pdf'); 
              $data = array(
                        'course_code'  => $course_code,
                       'course_name' => $course_name,
                       'rollno' => $rollno
                        ); 
              echo form_hidden($data);  
            ?>
              <label for="userfile" class="col-lg-4 control-label">Select PDF of assignment to Update : </label>
              <div>
                <input type="hidden" name="assignment_no" id="update_pdf_assignment_no" value="">
                <?php echo form_upload(['name'=>'updateuserfile','class'=>'form-control','accept'=>'application/pdf']); ?>
              </div>
              <div>
                <p class="text-danger">
                  Note: Upload PDF file of Size less than 1MB (1024 KB)
                </p>
                <p class="text-success">
                  If your PDF's size is more than 1 MB you can compress it on 
                  <span class="text-primary"><a href="https://www.ilovepdf.com/compress_pdf" target="_blank"> ilovepdf.com</a> </span> 
                  or
                  <span class="text-primary"> <a href="https://pdfcandy.com/compress-pdf.html" target="_blank">pdfcandy.com</a> </span>
                </p>
              </div>
        <!-- Modal footer -->     
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
          <?php 
            echo form_submit('submit', 'Submit',"class='btn btn-primary'");
            echo form_close(); 
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

  <!-- ---------------------------------------------------------------------------------------------------------------- -->
  <!-- -----------------------------------The View PDF Assignment Modal------------------------------------------------ -->

  <!-- Modal -->
  <div class="modal fade" id="viewAssignmentPDFModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <!-- Modal Header-->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">View Submitted Assignment &nbsp;&nbsp;&nbsp;&nbsp;<button  onclick="printDivPDF()" class="btn btn-primary btn-sm">Print Front Page</button></h5>
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
        

  <!-- -------------------------------------------------------------------------------------------------- -->
    <!-- --------------------------------------- Footer ------------------------------------------------ -->

    <br/><br/><br/><br/>
    <footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>

    <!-- -------------------------------------------------------------------------------------------------------------- -->

  </section>
</div>
<div id="printPDFAssignment" style="visibility: hidden">
</div>

  
  <script type="text/javascript">

    function uploadText(a_no)
    {
      var an = a_no;
      $('#uploadAssignmentTextModal').modal("show");
      document.getElementById('text_assignment_no').value = an;    
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

    function viewText(a_no,submitted_text,marks,course_name,course_code,rn,submitted_on)
    {
      var an = a_no;
      
      var marksJS;
      if(marks == 0)
      {
        marksJS = "Not assessd yet";
      }
      else
      {
        marksJS = marks;
      }
      $('#viewAssignmentTextModal').modal("show");
      document.getElementById('viewmyassgnmenttext').innerHTML = "<h3>Roll no : "+rn+"</h3><h3> Assignment no : "+an+"</h3><b><h3> Marks : "+marksJS+"</h3></b><h3>Submitted On : "+submitted_on+"</h3><h3> Assignment Type : TEXT </h3><h3> Course : "+course_name+"</h3><h3> Course Code : "+course_code+"</h3><hr/><br/>"+"<pre><xmp>"+submitted_text+"</xmp></pre>" ;
    }

    function updatePDF(a_no)
    {
      var an = a_no;
      $('#updateAssignmentPdfModal').modal("show");
      document.getElementById('update_pdf_assignment_no').value = an; 
    }

   function viewPDF(a_no,submitted_text,marksJS,course_name,course_code,rn,submitted_on)
    {
      var an = a_no;
      console.log(a_no);
      console.log(submitted_text);
      var str = '<object data="'+submitted_text+'" type="application/pdf" width="80%" height="1000px"></object>';
      document.getElementById('viewmyassgnmentpdf').innerHTML = str;
      $('#viewAssignmentPDFModal').modal("show");

      document.getElementById('printPDFAssignment').innerHTML = "<h3>Roll no : "+rn+"</h3><h3> Assignment no : "+an+"</h3><b><h3> Marks : "+marksJS+"</h3></b><h3>Submitted On : "+submitted_on+"</h3><h3> Assignment Type : PDF </h3><h3> Course : "+course_name+"</h3><h3> Course Code : "+course_code+"</h3><hr/>" ;
    }

  

  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>
  <script>
   
    var options = {
    bottom: '64px', // default: '32px'
    right: '32px', // default: '32px'
    left: 'unset', // default: 'unset'
    time: '0.5s', // default: '0.3s'
    mixColor: '#fff', // default: '#fff'
    backgroundColor: '#ffffff',  // default: '#fff'
    buttonColorDark: 'grey',  // default: '#100f2c'
    buttonColorLight: '#ffffff', // default: '#fff'
    saveInCookies: false, // default: true,
    label: '🐧', // default: ''
    autoMatchOsTheme: true // default: true
  }

  const darkmode = new Darkmode(options);
  darkmode.showWidget();
   
  </script>
</body>
</html>