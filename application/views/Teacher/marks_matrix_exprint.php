<?php
  if(!$this->session->userdata('teacher_id'))
          return redirect('Login');
?>
<!-- marks matrix -->
<!DOCTYPE html>
<html>
<head>
	<title>Marks Matrix | Print and Excel spreadsheet</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap font awesome link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->



 



   <style type="text/css">
   	 .hm-gradient 
    {
        background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
        font-family: 'Source Sans Pro', sans-serif;
    } 
   </style>
</head>
<body>
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	      <a class="navbar-brand mr-1" href="#">SubMito!</a>
	    </nav>
<div class="hm-gradient">
	<div class="container " align="center" id="pdiv">
	<br/><h4 class="text-primary">Marks Matrix</h4>
	
	<h5 class="text-success"><?= $course_name; ?></h5>
	
	<h5 class="text-success"><?= $course_code; ?></h5>
	
	<h5 class="text-success"><?= $teacher_name; ?></h5>

	 <div class="container-fluid">
          <div align="left">&nbsp;
            <h4> <?php
                    echo form_open('Teacher/load_marks_matrix');
                    $data = array(
                             'course_code'  => $course_code,
                             'course_name' => $course_name,
                             'teacher_name' => $teacher_name
                            
                              );
                    echo form_hidden($data);?>
                  <!-- i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i>  --><?
                   $data = array(
                      'name' => 'submit',
                      'value' => 'true',
                      'type' => 'submit',
                      'class' => 'btn btn-default btn-lg',
                      'content' => '<i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i>'
                    );

                    echo form_button($data); 
                    echo form_close();
                  ?> </h4>

          </div>

           <div class="container-fluid">
          <div align="right">&nbsp;
            <h4><button onclick="window.print()" class="btn btn-lg btn-default"><i class="fa fa-print" aria-hidden="true" >Print</i></button></h4>
            &nbsp;&nbsp;
            <h4> 
                  <?php echo "<button class='btn btn-success' onclick=\"exportToExcel('ex','".$course_name."')\" >Download Excel File</button>";
						
						?>
                </h4>
          </div>
         

          

	<h6 class="" align="left"> NA : Not Assessed <br/> - : Not Submitted</h6>

	<br>
	<table class="table" border="2" id="ex">

		<thead>
			<th>Roll No.</th>
			<?php
			foreach ($sac as $an) {
				echo "<th>".$an->assignment_no."</th>";
			}
			?>
			
			
		</thead>
		<tbody>
			<?php foreach ($rn->result() as $r){ ?>
			<tr>
				
				<td>
					<?= $r->rollno; ?>
					
					
					</td>

				<?php 
				foreach ($sac as $an) {
					$flag = 0;
				  foreach ($matrix as $m) {

				 	if($m->rollno == $r->rollno )
					{
				     
				     $current_static_assignment =  $an->assignment_no;

				      				
						if($current_static_assignment == $m->assignment_no)
					{
						if($m->marks == 0)
						{
						?>
							<td>NA</td>
						<?php }else
						{


						?>




						<td><?= $m->marks; ?></td>
						<?php
					    }
						$flag = 1;
						break;
					}

							
			}
			 } 
			 if($flag == 0)
			 	{
			 		echo "<td>-</td>";
			 	}} ?>
			
			
				
			</tr>
		<?php } ?>
		</tbody>
			
	</table>

</div>
<br/><br/>

</div></div></div>

<footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
      </div>
    </footer>

 
</body>
<script type="text/javascript">
function exportToExcel(tableID, filename = ''){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}
 
</script>
  

</html>