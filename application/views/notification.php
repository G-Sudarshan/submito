<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Notifications</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style type="text/css">
    .hm-gradient 
    {
        background-image: linear-gradient(to top, #f3e7e9 30%, #e3eeff 100%, #e3eeff 100%);
        font-family: 'Source Sans Pro', sans-serif;
        line-height: 1.5;
        color: #323232;
        font-weight: 400;
        font-size: 15px;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
    }
  </style>

</head>
<body class="hm-gradient ">
  
  <br/><br/>
  <section>
    <div class="container text-center">
      <h1>All Notifications</h1>
      <br/><br/>
      <table class="table table-striped">
        <thead>
          <th>Sr. No.</th>
          <th>Title</th>
          <th>View</th>       
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
  </section>
  <br/><br/><br/><br/><br/>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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