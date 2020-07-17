<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style type="text/css">
        .container-fluid, .container 
        {
            font-family: 'Source Sans Pro', sans-serif;
            line-height: 1.5;
            color: #323232;
            font-weight: 400;
            font-size: 15px;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
        }
        .hm-gradient 
        {
            background-image: linear-gradient(to top, #f3e7e9 30%, #e3eeff 100%, #e3eeff 100%);
        }
        .navbar {
                position: relative;
                min-height: 50px;
                margin-bottom: 0px;
                border: 1px solid transparent;
                border-radius: 0px;
        }
    </style>
</head>
<body class="hm-gradient">
    
    <div class="hm-gradient" >

    <br/><br/><br/><br/><br/>
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert success"><?php echo $_SESSION['success']; ?></div>
    <?php } ?>
<div class="container" align="center">
    <?php if($error = $this->session->flashdata('login_failed')): ?>
        <div class="row">
            <div class="col-lg-6" >
                <div class="alert alert-dismissible alert-danger">
                    <?= $error ?>
                </div>
            </div>
        </div>
    <?php endif; ?></div>

    <div class="container">
        <div class="row">
          
            <div class="col-lg-4 col-md-4 col-sm-12">
            <?php 
                $attributes = ['id' => 'studentLogin'];
                echo form_open('Login/student_login', $attributes);
            ?>
            <h2>Student Login</h2>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <?php 
                    echo form_submit(['name'=>'student_login','value'=>'Login','class'=>'btn btn-primary']);
                    echo form_close(); 
                ?>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <iframe style="border: 10px solid #FFFFFF" width="560" height="315" src="https://www.youtube.com/embed/BPJ9OMhbILw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

      </div>
 
    <br/><br/><br/><br/>  <br/><br/>
    </div>  



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

  <!--JQuery Validations-->
  <script type="text/javascript">
      
      $(document).ready(function() 
      {
        /*Admin Login*/
        $('#admin').bootstrapValidator(
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
                username:
                {
                    validators: 
                    {
                        notEmpty: 
                        {
                            message: '<span class="text-danger">**Please fill the Username</span>'
                        },
                        stringLength: 
                        {
                            max: 50,
                            message: '<span class="text-danger">**The Username must be less than 50 characters long</span>'
                        }
                    }
                },
                password:
                { 
                    validators: 
                    {
                        notEmpty: 
                        {
                            message: '<span class="text-danger">**Please fill the Password</span>'
                        },
                        stringLength: 
                        {
                            min: 8,
                            max: 50,
                            message: '<span class="text-danger">**The Password must be between 8 and 50 characters long</span>'
                        }
                    }
                }
            }
        });

        /*Teacher Login*/
        $('#teacherLogin').bootstrapValidator(
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
                username:
                {
                    validators: 
                    {
                        notEmpty: 
                        {
                            message: '<span class="text-danger">**Please fill the Username</span>'
                        },
                        stringLength: 
                        {
                            max: 50,
                            message: '<span class="text-danger">**The Username must be less than 50 characters long</span>'
                        }
                    }
                },
                password:
                { 
                    validators: 
                    {
                        notEmpty: 
                        {
                            message: '<span class="text-danger">**Please fill the Password</span>'
                        },
                        stringLength: 
                        {
                            min: 8,
                            max: 50,
                            message: '<span class="text-danger">**The Password must be between 8 and 50 characters long</span>'
                        }
                    }
                }
            }
        });

        /*Student Login*/
        $('#studentLogin').bootstrapValidator(
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
                username:
                {
                    validators: 
                    {
                        notEmpty: 
                        {
                            message: '<span class="text-danger">**Please fill the Username</span>'
                        },
                        stringLength: 
                        {
                            max: 50,
                            message: '<span class="text-danger">**The Username must be less than 50 characters long</span>'
                        }
                    }
                },
                password:
                { 
                    validators: 
                    {
                        notEmpty: 
                        {
                            message: '<span class="text-danger">**Please fill the Password</span>'
                        },
                        stringLength: 
                        {
                            min: 8,
                            max: 50,
                            message: '<span class="text-danger">**The Password must be between 8 and 50 characters long</span>'
                        }
                    }
                }
            }
        });

      });
      
  </script><script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script></body>
</html>                            