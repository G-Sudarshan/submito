<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zabuto_calendar/1.6.4/zabuto_calendar.cssx" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
  <div class="container" align="left">
<br/>
    <a class="btn btn-info" href=<?= base_url('Login') ?> >Back</a>
    <br/>
  </div>
  
<div class="container">
    <h1 style="color: black"><center>Academic Calendar </center></h1>
    <br>
    <center><div class="row" style="width:50%">
       <div class="col-md-12">
           <div id="calendar"></div>
       </div>
    </div></center>
</div>

 
<script type="text/javascript">
   
    var events = <?php echo json_encode($data) ?>;
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
           
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      events    : events
    });
</script>

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