<!DOCTYPE html>
<html>
<head>
	<title>Share Study Material</title>
	<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <!-- Bootstrap font awesome link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div class="container" align="center">

	<h1>Teachers dashboard</h1><br/>
	<h2 class="text-primary"><?= $course_name."<br/>".$course_code; ?></h2>
	

<?php 

if(isset($error))
{
	echo $error;
}
?>
<h4 align="left"><a href="<?= base_url('Teacher'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4><br><br><br><br><br>
<h4 class="text-success">You can share word document, excel sheet, powerpoint presentation,  png, jpg, gif, pdf etc.</h4>
<br><br>
<?php echo form_open_multipart('Teacher/upload_notes');?>
<?php 

echo form_input(['name'=>'title','placeholder'=>'Enter Title for notes','class'=>'form-control'],'','required'); 
?>
<br><br>
<input type="file" name="userfile" class="form-control" />

<br />

<?php $data = array(
                             'course_code'  => $course_code,
                             'course_name' => $course_name,
                             'teacher_name' => $teacher_name
                              );
                    echo form_hidden($data); ?>


<button type="submit" class="btn btn-primary" >Share Notes</button>

<?php echo form_close(); ?></div>
</body>
</html>