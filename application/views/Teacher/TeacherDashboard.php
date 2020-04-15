<?php

if(!$this->session->userdata('teacher_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher Dashboard</title>
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

    /* Right Corner Menu */

    .dropdown-item
    {
      color: #333;
      font-size: 13px;
    }

    /* Important part */
    .modal-dialog
    {
      overflow-y: initial !important
    }
    .modal-body-s
    {
      height: 375px;
      overflow-y: auto;
    }

  </style>
 
</head>
<body class="hm-gradient">

  <section>

    <!-- ----------------------------------------- Header -------------------------------------------- -->
    
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href=<?= base_url('Login'); ?>>SubMito!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="navbar-brand mr-1" href=<?= base_url('Login'); ?>><?= $clgname; ?></a>
        <!-- Right corner menu -->
        <ul class="nav navbar-nav ml-auto">
          <li>
            <a class="navbar-brand mr-1" href="#"><?= "Welcome ".$teacherData->name; ?></a></li><li>
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="fa fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Profile</a>
              <a class="dropdown-item" href=<?= base_url('Login/change_password_teacher'); ?> >Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
          </li>
        </ul>
    </nav>

    <!-- ----------------------------------------------------------------------------------------------- -->
    <!-- ------------------------------------------ Content ------------------------------------------- -->
    <div class="container text-center">

      <br/><br/>
      <h1>Teacher Dashboard</h1>

      <!-- Flashdata -->
      <br/>
      <?php if($success = $this->session->flashdata('success')): 
              echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
            endif; 
      ?>
      <?php if($failure = $this->session->flashdata('failure')): 
              echo '<div class="alert alert-dismissible alert-danger">' . $failure . '</div>';
            endif; 
      ?>
      <br/>

      <br/>

      <!-- Subject Table -->
      <div>
        <?php if($selectedcourses!=NULL): ?>
        <table class="table table-striped">
          <thead>
            <th>Sr No.</th>
            <th>Course Code</th>
            <th>Name</th>
            <th>Create</th>
            <th>Check</th>         
            <th>Share</th>
            <th>Marks</th> 
            
          </thead>
          <tbody>
            <?php $i=1 ?>            
              <?php foreach ($selectedcourses->result() as $selectedCourse):  ?>
              <tr>
                <td><?= $i++; ?></td> 
                <td><?= $selectedCourse->course_code; ?></td>
                <td><?= $selectedCourse->name; ?></td>
                <td>
                  <?php
                    echo form_open('Teacher/load_create_assignment');
                    $data = array(
                             'course_code'  => $selectedCourse->course_code,
                             'course_name' => $selectedCourse->name,
                             'teacher_name' => $teacherData->name
                              );
                    echo form_hidden($data);
                    echo form_submit('submit', 'Create assignments',"class='btn btn-primary btn-sm '");
                    echo form_close();
                  ?>                   
                </td>          
                <td>
                  <?php
                    echo form_open('Teacher/load_check_assignment');
                    $data = array(
                             'course_code'  => $selectedCourse->course_code,
                             'course_name' => $selectedCourse->name,
                             'teacher_name' => $teacherData->name
                              );
                    echo form_hidden($data);
                    echo form_submit('submit', 'check assignments',"class='btn btn-success btn-sm '");
                    echo form_close();
                  ?>
                </td>
                <td>
                <?php
                    echo form_open('Teacher/load_share_notes');
                    $data = array(
                             'course_code'  => $selectedCourse->course_code,
                             'course_name' => $selectedCourse->name,
                             'teacher_name' => $teacherData->name
                              );
                    echo form_hidden($data);
                    echo form_submit('submit', 'Share study material',"class='btn btn-info btn-sm '");
                    echo form_close();
                  ?></td> 
                  <td>
                <?php
                    echo form_open('Teacher/load_marks_matrix');
                    $data = array(
                             'course_code'  => $selectedCourse->course_code,
                             'course_name' => $selectedCourse->name,
                             'teacher_name' => $teacherData->name
                              );
                    echo form_hidden($data);
                    echo form_submit('submit', 'Marks Matrix',"class='btn btn-warning btn-sm '");
                    echo form_close();
                  ?></td> 
              </tr>
              <?php endforeach; ?>
          </tbody> 
        </table>  
      <?php endif; ?>
      </div>

    </div>

    <!-- ----------------------------------------------------------------------------------------------- -->
    <!-- -------------------------------------- Footer----------------------------------------------- -->

    <br/><br/><br/><br/><br/><br/>
    <footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>

    <!-- ---------------------------------------------------------------------------------------------- -->

  </section>

  <!-- ---------------------------------------------------------------------------------------------------- -->
  <!-- ----------------------------------- Profile Modal---------------------------------------------- -->

  <!-- Modal-->
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <!-- Modal Header-->
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile <i class=" fa fa-user-o" ></i> </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body-->
            <div class="modal-body">
              <?php
                echo "Name: ".$teacherData->name."<br/>";
                echo "Username: ".$teacherData->username."<br/>";
                echo "Email: ".$teacherData->email."<br/>";
                echo "Department: ".$teacherData->department."<br/>";
                echo "Department Id: ".$teacherData->department_id."<br/>";
                echo "Staff Id: ".$teacherData->staff_id."<br/>";
              ?>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editProfileModal" >Edit Profile</a>
            </div>
          </div>
      </div>
  </div>

  <!-- -------------------------------------------------------------------------------------------- -->
  <!-- ------------------------------------- Logout Modal ----------------------------------------------->

  <!-- Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <!-- Modal Header-->
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body-->
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href=<?= base_url('Login/logout'); ?> >Logout</a>
            </div>
          </div>
      </div>
  </div>

  <!-- ----------------------------------------------------------------------------------------- -->
  
  <!---------------------------------- Edit Profie Model---------------------------------------------->

  <div class="modal" id="editProfileModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <?php echo form_open('Teacher/update_teacher'); ?>
            <?php   
              echo "Name :  ";
              echo form_input(['name'=>'teacher_name','placeholder'=>'Enter your name','class'=>'form-control','value'=>set_value('teacher_name',$teacherData->name)],'','required');
              echo "<br/>"; 
            
              echo "Email :  ";
              echo form_input(['name'=>'teacher_email','type'=>'email','placeholder'=>'Enter email eg. ganesha@gmail.com','class'=>'form-control','value'=>set_value('teacher_email',$teacherData->email)],'','required'); 
              echo "<br/>";

              echo "Mobile No. :  ";
              echo form_input(['name'=>'teacher_mobile','placeholder'=>'Enter your mobile no','class'=>'form-control','value'=>set_value('teacher_mobile',$teacherData->mobile_no)],'','required'); 
              echo "<br/>"; ?>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">            
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php  
            echo form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']); 
            echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- --------------------------------------------------------------------------------------------------- -->

  <!-- Script links -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>