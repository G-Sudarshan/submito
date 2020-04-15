<?php

if(!$this->session->userdata('admin_id'))
          return redirect('login');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Allocate Subjects</title>
	 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap font awesome link -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

 
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
	<a class="navbar-brand mr-1" href="#"><h3><?php echo " &nbsp;&nbsp;".$clgname; ?></h3></a>	

	<div class="container-fluid">
      <div align="left">&nbsp;
        <h4> <?php
                    echo form_open('Admin/load_manage_teachers');
                    $data = array(
                            'dname'  => $dname,
		                        'd_id' => $did
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
    <div class="container">

	<h2>allocate subjects to <span class="text-success"> <?php echo $teacher_name; ?></span></h2>
	  <div align="center">
        <button class="btn btn-primary" data-toggle="modal" data-target="#mySubjectModal">Edit Subjects</button>
      </div>

	<br/><br/>

	<!-- Modal -->
  <div class="modal fade" id="mySubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header-->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Subjects</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body-->
        <div class="modal-body-s">
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
                    <?php endforeach; ?>
                </table>
              </div>
            </div>
        </div>
        <!-- Modal footer -->           
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>     
          <?php 
          	$data = array(
                            'dname'  => $dname,
		                        'd_id' => $did
                              );
                    echo form_hidden($data);

            echo form_hidden('teacher_id',$teacher_id);
            echo form_submit('submit', 'Save changes',"class='btn btn-primary'");
            echo form_close(); 
          ?>       
        </div>
      </div>
    </div>
  </div>
        
  <!-- ------------------------------------------------------------------------------------------ -->


</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php $this->view('footer'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>