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
	<title>Student Dashboard</title>
  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body-s{
        height: 375px;
        overflow-y: auto;
    }

    /* .navbar{
      width: 100%;
      height:auto;
    } */

    /* #subject_table{
      width: 100%;
      height: auto;
      display: flex;
      flex-direction: column;
    } */

  </style>

</head>
<body>
  <div class="hm-gradient">

  <section>

    <!-- -------------------------------------------Header------------------------------------------------------------ -->    
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="#">SubMito!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="navbar-brand mr-1" href=<?= base_url('Login'); ?>><?= $clgname; ?></a>
        <!-- Right corner menu -->
        <ul class="nav navbar-nav ml-auto">
           <li>
            <a class="navbar-brand mr-1" href="#"><?= "Welcome ".$studentData->name; ?></a>
          </li>
            
          <li>
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="fa fa-user-circle "></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Profile</a>
              <a class="dropdown-item" href=<?= base_url('Login/change_password_student'); ?> >Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
          </li>
        </ul> 
    </nav>

    <!-- ------------------------------------------------------------------------------------------------- -->
    <!-- ------------------------------------------ Content------------------------------------------------- -->

    <div class="container text-center">

      <br/><br/>
      <h1>Student Dashboard</h1>

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

      <div align="right">
        <button class="btn btn-primary" data-toggle="modal" data-target="#mySubjectModal">Edit Subjects</button>
      </div>
      <br/>

      <!-- Subject Table -->
      <div>
        <table id="subject_table" class="table table-striped">
          <thead>
            <th>Sr. No.</th>
            <th>Course Code</th>
            <th>Name</th>
            <th>Upload</th>
            <th>Download</th>      
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
                    echo form_open('Student/load_upload_assignment');
                    $data = array(
                              'course_code'  => $selectedCourse->course_code,
                             'course_name' => $selectedCourse->name,
                             'rollno' => $studentData->rollno
                                  );
                    echo form_hidden($data);
                    echo form_submit('submit', 'Upload assignments',"class='btn btn-primary btn-sm '");
                    echo form_close();

                  ?>
                </td>           
                <td>
                <?php
                    echo form_open('Student/load_shared_notes');
                    $data = array(
                              'course_code'  => $selectedCourse->course_code,
                             'course_name' => $selectedCourse->name,
                             'rollno' => $studentData->rollno
                                  );
                    echo form_hidden($data);
                    echo form_submit('submit', 'See shared Study material',"class='btn btn-success btn-sm '");
                    echo form_close();

                  ?></td>  
              </tr>
            <?php endforeach; ?>
          </tbody>  
        </table>  
      </div>

    </div>

    <!-- ------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------Footer----------------------------------------- -->

    <br/><br/><br/><br/><br/>
    <footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>

    <!-- ------------------------------------------------------------------------------------------------- -->

  </section>

  <!-- -------------------------------------------------------------------------------------------------- -->  
  <!-- ----------------------------------------Profile Modal-------------------------------------------- -->

  <!-- Modal-->
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <!-- Modal Header-->
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body-->
            <div class="modal-body">
              <?php
                echo "Name : ".$studentData->name."<br/>";
                echo "Roll No.: ".$studentData->rollno."<br/>";
                echo "Email : ".$studentData->email."<br/>";
                echo "Department : ".$studentData->department."<br/>";
                echo "Department Id : ".$studentData->department_id."<br/>";
                echo "Mobile No. : ".$studentData->mobile_no."<br/>";
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

  <!-- ---------------------------------------------------------------------------------------------------------------- --> 
  <!-- --------------------------------------------------Logout Modal----------------------------------------------------->

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

  <!-- ------------------------------------------------------------------------------------------------------ --> 
  <!-- ------------------------------------------------ Subject Modal-------------------------------------- -->


  <!-- Modal -->
  <div class="modal fade" id="mySubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Subjects</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body-s">
          <?php echo form_open('Student/saveMySubjects'); ?>
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
          <?php echo form_submit(['name'=>'submit','value'=>'Save changes','class'=>'btn btn-primary']);
                echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- --------------------------------------------------------------------------------------------------- --> 
  <!---------------------------------------Edit Profie modal----------------------------------------------->

  <!-- Modal -->
  <div class="modal" id="editProfileModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <div class="form-group">
          <?php echo form_open('Student/update_student'); ?>
            <?php 
              echo "Name:  ";
              echo form_input(['name'=>'student_name','placeholder'=>'Name of Student','class'=>'form-control','value'=>set_value('student_name',$studentData->name)],'','required');
              echo "<br/>"; 

              echo "Email:  ";
              echo form_input(['name'=>'student_email','type'=>'email','placeholder'=>'Enter email eg. ganesha@gmail.com','class'=>'form-control','value'=>set_value('student_email',$studentData->email)],'','required'); 
              echo "<br/>";

              echo "Year:  ";
              echo form_input(['name'=>'student_year','placeholder'=>'Enter year eg. First Year ','class'=>'form-control','value'=>set_value('student_year',$studentData->year)],'','required'); 
              echo "<br/>";

              echo " Mobile No.:  ";
              echo form_input(['name'=>'student_mobile','placeholder'=>'Enter your mobile no','class'=>'form-control','value'=>set_value('student_mobile',$studentData->mobile_no)],'','required');  
            ?>
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
</div>
  <!-- ---------------------------------------------------------------------------------------------------------------- -->

  <!-- Script links -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>
  <script>
   
    var options = 
    {
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