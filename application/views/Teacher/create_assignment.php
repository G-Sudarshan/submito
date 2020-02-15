<?php
  if(!$this->session->userdata('teacher_id'))
          return redirect('Login');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Assignments</title>
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

  <section>

    <!-- ----------------------------------------- Header-------------------------------------------- -->    
    
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="#">SubMito!</a>
    </nav>

    <!-- ----------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------- Content ---------------------------------------- -->

    <div class="container-fluid">
      <div align="left">&nbsp;
        <h4><a href="<?= base_url('Teacher'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
      </div>
    </div>

    <div class="container" align="center">
      <h2>Create Assignment</h2>
      <h4><?= $course_name; ?><br/><?= $course_code ?></h4>

      <!-- Flashdata -->
      <?php 
        if($success = $this->session->flashdata('success')): 
          echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
        endif; 
      ?>
      <br/><br/>

      <div align="left">
        <button class="btn btn-success" data-toggle="modal" data-target="#createAssignmentModal">Create New Assignment</button>
      </div>
      <br/>
      
      <!-- Table -->
      <div>
        <table class="table table-striped">
          <thead>
            <th>Assignment No.</th>
            <th>Title</th>
            <th>Created By</th>
            <th>Last Date to Submit</th>
            <th>Type</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php foreach ($cad->result() as $a): ?>
            <tr>
              <td><?= $a->assignment_no; ?></td>
              <td><?= $a->name; ?></td>
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
                  echo "<button class='btn btn-warning' onclick='editAssignment(".$a->assignment_no.",\"".$a->name."\",".$a->deadline.",\"".$a->description."\")'>Edit</button>"; 
                ?>
              </td>
              <td>
                <?php
                  echo form_open('Teacher/delete_static_assignment');
                  $data = array(
                        'course_code'  => $course_code,
                       'course_name' => $course_name,
                       't_name' => $teacher_name
                        );
                  echo form_hidden($data);
                  echo form_hidden('id',$a->id);
                  echo form_hidden('assignment_no',$a->assignment_no);
                  echo form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']); 
                  echo form_close();
                ?> 
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    
    </div>

    <!-- ------------------------------------------------------------------------------------------------- -->
    <!-- ------------------------------------------ Footer -------------------------------------------- -->

    <br/><br/><br/><br/><br/><br/><br/><br/>
    <footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>

    <!-- ------------------------------------------------------------------------------------------ -->

  </section>

  <!-- ---------------------------------------------------------------------------------------------------- -->
  <!-- --------------------------------- Create Assignment Modal -------------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="createAssignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header-->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create New Assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
        	<div class="form-group">
            <?php 
              echo form_open('Teacher/create_assignment'); 
              $data = array(
                        'course_code'  => $course_code,
                       'course_name' => $course_name,
                       't_name' => $teacher_name
                        );
              echo form_hidden($data);

        			echo "Enter Assignment No :";
        			echo form_input(['name'=>'a_no','class'=>'form-control','placeholder'=>' Assignment No. eg. 1,2,3,4 etc.'],'','required'); 
        			
        			echo "Enter title of Assignment to be created :";
        			echo form_input(['name'=>'a_title','class'=>'form-control','placeholder'=>' Title of assignment eg. Write a program for Hello world in C '],'','required'); 

        			echo "Enter Description of Assignment to be created :";
        			echo form_textarea(['name'=>'a_description','class'=>'form-control','placeholder'=>' description of assignment  '],'','required');

        			echo "Enter last date to submit for Assignment to be created :";
        			echo form_input(['name'=>'a_deadline','type'=>'date','class'=>'form-control','placeholder'=>' Last date to submit assignment ','value'=>set_value('crs_code')],'','required');
        		   
        		  echo "Choose assignment type :"; 
            ?>

              <div class="form-check form-check-inline">
        			  <input class="form-check-input" type="radio" name="a_type" id="inlineRadio1" value="1">
        			  <label class="form-check-label" for="inlineRadio1">PDF</label>
        			</div>
        			<div class="form-check form-check-inline">
        			  <input class="form-check-input" type="radio" name="a_type" id="inlineRadio2" value="2">
        			  <label class="form-check-label" for="inlineRadio2">Text</label>
        			</div>

          </div>
        </div>
        <!-- Modal footer -->            
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>    
          <?php 
            echo form_submit('submit', 'Create',"class='btn btn-primary'");
            echo form_close(); 
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- ------------------------------------------------------------------------------------------------ -->
  <!-- -------------------------------------- Edit Assignment Modal ----------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="editAssignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header-->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          <div class="form-group">
            <?php 
              echo form_open('Teacher/edit_assignment'); 
              $data = array(
                      'course_code'  => $course_code,
                     'course_name' => $course_name,
                     't_name' => $teacher_name
                      );
              echo form_hidden($data);

              echo "Assignment No:  ";
            ?>
              <input type="text" class="form-control" name="assignment_no" id="edit_assignment_no" disabled>
              <input type="hidden" name="a_no" id="aa">
            <?php             
              echo "Enter title of Assignment to be created :";
              echo form_input(['name'=>'a_title','class'=>'form-control','placeholder'=>' Title of Assignment eg. Write a program for Hello world in C ','id'=>'edit_assignment_name'],'','required');

              echo "Enter Description of Assignment to be created :";
              echo form_textarea(['name'=>'a_description','class'=>'form-control','placeholder'=>' Description of Assignment  ','id'=>'edit_assignment_description'],'','required');
            ?>
          </div>
        </div>
        <!-- Modal footer -->          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>     
          <?php 
            echo form_submit('submit', 'Save Changes','class="btn btn-primary"');
            echo form_close(); 
          ?>
        </div>
      </div>
    </div>
  </div>
        
  <!-- ------------------------------------------------------------------------------------------------ -->

  <!-- Script links -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript">

    function editAssignment(assignment_no,name,deadline,description)
    {
      $('#editAssignmentModal').modal("show");
      document.getElementById('edit_assignment_no').value = assignment_no; 
      document.getElementById('edit_assignment_name').value = name ;
      document.getElementById('aa').value = assignment_no; 
      document.getElementById('edit_assignment_description').value = description ;
    }

  </script>
 
</body>
</html>