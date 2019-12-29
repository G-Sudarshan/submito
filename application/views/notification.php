
<!DOCTYPE html>
<html>
<head>
	<title>Notifications</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>
<script>
 
  var options = {
  bottom: '64px', // default: '32px'
  right: '32px', // default: '32px'
  left: 'unset', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#ffffff',  // default: '#fff'
  buttonColorDark: 'grey',  // default: '#100f2c'
  buttonColorLight: '#ffffff', // default: '#fff'
  saveInCookies: false, // default: true,
  label: '🐧', // default: ''
  autoMatchOsTheme: true // default: true
}

const darkmode = new Darkmode(options);
darkmode.showWidget();
 
</script>
</body>
</html>