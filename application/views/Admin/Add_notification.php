<!DOCTYPE html>
<html>
<head>
	<title>Add Notification</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<?php echo form_open_multipart('Admin/add_notification'); ?>

	<div class="row">
      	<div class="col-lg-6">  
      	  <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Notification Title</label>
      <div class="col-lg-8">
      	<?php echo form_input(['name'=>'title','class'=>'form-control' ,'placeholder'=>'Notification Title','value'=>set_value('title')]); ?>
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
<?php echo form_close(); ?>

</body>
</html>