<?php

if(!$this->session->userdata('admin_id'))
          return redirect('login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Notification</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  
  <?php if($success = $this->session->flashdata('success')): 
    echo '<div class="alert alert-dismissible alert-success">' . $success . '</div>';
   endif; ?>

	<?php echo form_open_multipart('Admin/add_notification'); ?>
 <div class="container" align="left">

    <a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>
    
  </div>
  <div class="container">
	<div class="row">
      	<div class="col-lg-6">  
      	  <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Notification Title</label>
      <div class="col-lg-8">
      	<?php echo form_input(['name'=>'title','class'=>'form-control' ,'placeholder'=>'Notification Title','value'=>set_value('title')],'','required'); ?>
      </div>
    </div>
</div>
<div class="col-lg-6">
	<?php echo form_error('title'); ?>
</div>

      </div>

      <div class="row">
        <div class="col-lg-6">  
          <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Select PDF of notification to Upload </label>
      <div class="col-lg-8">
        <?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
      </div>
    </div>
</div>
<div class="col-lg-6">
  <?php if(isset($upload_error)) echo $upload_error ?>
</div>

      </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
      
         form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']); ?>
        
      </div>
    </div>
  </fieldset>
<?php echo form_close(); ?></div>

<div class="container">

  <table class="table table-striped">
    <thead>
      <th>Sr. NO.</th>
      <th>Title</th>
      <th>view</th>
      <th>Delete</th>
    </thead>
    <tbody>
       <?php $i=1 ?>
      
        <?php foreach ($data->result() as $notification):  ?>
          <tr>
        <td><?= $i++; ?></td> 
        <td><?= $notification->title; ?></td>
        <td><a  class="btn btn-success" target="_blank" href=<?= base_url($notification->pdf_path); ?> >View</a></td>
        <td><?php

        echo form_open('Admin/delete_notification');
        echo form_hidden('id',$notification->id);
        echo form_hidden('path',$notification->pdf_path); 
        echo form_submit(['value'=>'Delete','class'=>'btn btn-danger']);
        echo form_close();
        ?></td>
      </tr>
    <?php endforeach; ?>
      
    </tbody>
    
  </table>
  
</div>

</body>
</html>