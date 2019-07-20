<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    <div class="container">
        <br/><br/><br/><br/>
        <h4><marquee> 

        <?php 
          
          foreach ($n_data->result() as $n) {
             
              ?> 


            <a href=<?= $n->pdf_path ?> > <?= $n->title; ?> </a> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 

            <?php 

          }

        ?>

        

    </marquee></h4>
        <br/><br/><br/><br/>     

        <?php if(isset($_SESSION['success'])) { ?>
            <div class="alert alert success"><?php echo $_SESSION['success']; ?></div>
        <?php } ?>

        <?php if($error = $this->session->flashdata('login_failed')): ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-dismissible alert-danger">
                        <?= $error ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    	<div class="row">
            <div class="col-sm">
                        <?php echo form_open('Login/admin_login'); ?>
                        <h2>Admin Login</h2>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" id="username">
                                <?php echo form_error('username'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?php echo form_error('password'); ?>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="admin_login">Login</button>
                            </div>
            			<?php echo form_close() ?>
            </div>

            <div class="col-sm">
                        <?php echo form_open('Login/teacher_login'); ?>
                        <h2>Teacher Login</h2>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" id="username">
                                <?php echo form_error('username', '<div class="error">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?php echo form_error('username', '<div class="error">', '</div>') ?>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="teacher_login">Login</button>
                            </div>
                        <?php echo form_close() ?>
            </div>

            <div class="col-sm">
                        <?php echo form_open('Login/student_login'); ?>
                        <h2>Student Login</h2>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" id="username">
                                <?php echo form_error('username', '<div class="error">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?php echo form_error('username', '<div class="error">', '</div>') ?>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="student_login">Login</button>
                            </div>
                        <?php echo form_close() ?>
            </div>
        </div>
    </div>
</body>
</html>                            