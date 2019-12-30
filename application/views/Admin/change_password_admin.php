<?php

if(!$this->session->userdata('admin_id'))
          return redirect('Login');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Passsword</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body><center>
	<h1>Chnage your passsword</h1><br><br>
	 <div class="container" align="left">

    <a class="btn btn-info" href=<?= base_url('Admin') ?> >Back to Admin Dashboard</a>
    
  </div>

	<div class="conatainer">
		<div class="col-lg-6" >
		<?php echo form_open('Login/update_admin_password');


			  echo form_input(['name' => 'new_password','placeholder'=>'Enter new password','class'=>'form-control']);
			  echo "<br/>";


			  echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-primary']);

			  echo form_close();
		?>
	</div>
</div>
</center>

</body>
</html>