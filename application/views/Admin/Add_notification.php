<?php

if(!$this->session->userdata('admin_id'))
          return redirect('login');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Notification</title>
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
  <center>
  <section>

    <!-- ---------------------------------------------- Header----------------------------------------------------- -->  


      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="#">SubMito!</a>
      </nav>

      <!-- ---------------------------------------------------------------------------------------------------------- -->
      <!-- ---------------------------------------------- Content---------------------------------------------------- -->

      <div class="container-fluid">
        <div align="left">&nbsp;
          <h4><a href="<?= base_url('Admin'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
        </div>
      </div>
      <div class="text-center">
        <h2>Add Notifications</h2>
      </div>
      <?php 
        if($success = $this->session->flashdata('success')): 
        echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
        endif; 
      ?>
      <br/><br/>
      <?php echo form_open_multipart('Admin/add_notification'); ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12"></div>
          <div class="col-lg-6 col-md-6 col-sm-12">

            <div class="form-group">
              <label for="inputEmail" class="control-label">Notification Title</label>
              <div>
                <?php echo form_input(['name'=>'title','class'=>'form-control' ,'placeholder'=>'Notification Title','value'=>set_value('title')],'','required'); ?>
              </div>
            </div>
            <div>
              <?php echo form_error('title'); ?>
            </div>

            <div class="form-group">
              <label for="inputEmail" class="control-label">Select PDF of Notification to Upload </label>
              <div >
                <?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
              </div>
            </div>
            <div>
              <?php if(isset($upload_error)) echo $upload_error ?>
            </div>

            <br/>
            <div class="form-group">
              <?php 
                echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-success']),
                form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']); 
              ?>       
            </div>
              <?php echo form_close(); ?>

          </div>
          <div class="col-lg-3 col-md-3 col-sm-12"></div>
        </div>
      </div>

      <br/><br/>
      <div class="container">
        <table class="table table-striped">
          <thead>
            <th>Sr. No.</th>
            <th>Title</th>
            <th>View</th>
            <th>Delete</th>
          </thead>
          <tbody>
             <?php $i=1 ?>
              <?php foreach ($data->result() as $notification):  ?>
              <tr>
                <td><?= $i++; ?></td> 
                <td><?= $notification->title; ?></td>
                <td><a  class="btn btn-success" target="_blank" href=<?= base_url($notification->pdf_path); ?> >View</a></td>
                <td>
                  <?php
                    echo form_open('Admin/delete_notification');
                    echo form_hidden('id',$notification->id);
                    echo form_hidden('path',$notification->pdf_path); 
                    echo form_submit(['value'=>'Delete','class'=>'btn btn-danger']);
                    echo form_close();
                  ?>
                </td>
              </tr>
              <?php endforeach; ?>   
          </tbody>  
        </table> 
      </div>

      <!-- -------------------------------------------------------------------------------------------- -->
      <!-- ------------------------------------------ Footer -------------------------------------------------- -->

      <br/><br/><br/><br/><br/>
      <footer class="py-3 bg-dark">
        <div class="container text-center text-white-50">
          <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
        </div>
      </footer>

      <!-- ----------------------------------------------------------------------------------------------- -->

    </section>
  </center>

    <!-- ------------------------------------------------------------------------------------------------- -->

    <!-- Script links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>