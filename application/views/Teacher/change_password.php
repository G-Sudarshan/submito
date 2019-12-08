<!DOCTYPE html>
<html>
<head>
	<title>Change Password </title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- -----------------------New Font Awesome CDN link ---------------------------------------------------->
     <script src="https://use.fontawesome.com/668fe47dcd.js"></script>
<!-- ---------------------------------------------------------------------------------------------- -->

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

       
      
</head>
<body>
	<div class="container" align="center">
<h2>Enter new password for <?php echo $teacher['username']; ?> of <?php echo $teacher['department']; ?> Department : <br/><br/><br/><br/>

	
	<div class="row"><div class="col-lg-6" >
		<?php 
            $attributes = ['id' => 'teacherPasswordForm'];
        	echo form_open('Login/update_teacher_password', $attributes);
        ?>
        	<div class="form-group">
                <label for="new_password">Your New Password:</label>
                <input type="text" name="new_password" class="form-control" placeholder="Enter new password" autocomplete="off">
            </div>
        <?php 
			echo form_hidden('id',$teacher['id']);
			echo form_submit(['value'=>'Change Password','class'=>'btn btn-success']);

			echo form_close();
		?>
			
		</div>
	</div>
</h2>
</div>


<script type="text/javascript">
    
    $(document).ready(function() 
    {

      $('#teacherPasswordForm').bootstrapValidator(
      {
          message: 'This value is not valid',
          feedbackIcons: 
          {
              valid: 'fa fa-check-circle text-success',
              invalid: 'fa fa-times text-danger',
              validating: 'fa fa-refresh text-primary'
          },
          fields: 
          {
              new_password: 
              {
                  validators: 
                  {
                      notEmpty: 
                      {
                          message: '<span class="text-danger small">Please fill the Password</span>'
                      },
                      stringLength: 
                      {
                      	  min: 8,
                          max: 50,
                          message: '<span class="text-danger small">The Password must be between 8 and 50 characters long<span>'
                      }
                  }
              }
          }
      });
    });

  </script>
</body>
</html>