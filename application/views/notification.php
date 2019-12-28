
<!DOCTYPE html>
<html>
<head>
	<title>Notifications</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  
  <br/>
<div class="container" align="left">
	
    <a class="btn btn-info" href=<?= base_url('Login') ?> >Back</a>
    </div>
  <br/>

	    
        

<div class="container">

  <table class="table table-striped">
    <thead>
      <th>Sr. NO.</th>
      <th>Title</th>
      <th>view</th>
      
    </thead>
    <tbody>
       <?php $i=1 ?>
      
        <?php foreach ($data->result() as $notification):  ?>
          <tr>
        <td><?= $i++; ?></td> 
        <td><?= $notification->title; ?></td>
        <td><a  class="btn btn-success" target="_blank" href=<?= base_url($notification->pdf_path); ?> >View</a></td>
       
      </tr>
    <?php endforeach; ?>
      
    </tbody>
    
  </table>
  
</div>

</body>
</html>