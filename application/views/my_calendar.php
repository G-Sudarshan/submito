<?php

if(!$this->session->userdata('admin_id'))
          return redirect('login');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academic Calendar</title>
    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap font awesome link -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zabuto_calendar/1.6.4/zabuto_calendar.cssx" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

    <style type="text/css">
      /* body */ 
      .hm-gradient 
      {
          background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
          font-family: 'Source Sans Pro', sans-serif;
      } 
    </style>
</head>
<body class="hm-gradient">
  

    <section>

    <!-- ---------------------------------------------- Header----------------------------------------------------- -->  

      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="#">SubMito!</a>
      </nav>

      <!-- ---------------------------------------------------------------------------------------------------------- -->
      <!-- ---------------------------------------------- Content---------------------------------------------------- -->

      <div class="container-fluid">
        <div align="left">&nbsp;
          <h4><a href="<?= base_url('Admin'); ?>" ><i class="fa fa-arrow-circle-left font-weight-bold text-dark"></i></a></h4>
        </div>
      </div>
      
      <div class="container">
        <center>
          <h1>Academic Calendar</h1>
          <br/><br/>
          <div class="row" style="width:50%">
            <div class="col-md-12">
              <div id="calendar"></div>
            </div>
          </div>
        </center>
      </div>

      <div id="container">
        <br/>
        <center>
          <a type="button" class="btn btn-primary" href=<?= base_url('CaledarController/form_as'); ?>>Add Event </a>
        </center>
      </div>

      <!-- ---------------------------------------------------------------------------------------------------------- -->
      <!-- ------------------------------------------------ Footer -------------------------------------------------- -->

      <br/><br/><br/>
      <footer class="py-3 bg-dark">
        <div class="container text-center text-white-50">
          <small>&COPY; 2020 TEAM SUBMITO. All Rights Reserved</small>
        </div>
      </footer>

      <!-- ----------------------------------------------------------------------------------------------------------- -->

    </section>

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
  
</body>
</html>