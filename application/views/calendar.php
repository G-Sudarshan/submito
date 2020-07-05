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
      
      .hm-gradient 
      {
          background-image: linear-gradient(to top, #f3e7e9 20%, #e3eeff 60%, #e3eeff 100%);
          font-family: 'Source Sans Pro', sans-serif;
      } 
      footer{
      position: relative;!important;
    }
    </style>
</head>
<body class="hm-gradient">
<div class="hm-gradient">

  <section>

      <!-- ---------------------------------------------- Content---------------------------------------------------- -->

      <div class="container">
        <center>
          <br/>
          <h1>Academic Calendar</h1>
          <br
          <div class="row" style="width:50%">
            <div class="col-md-12">
              <div id="calendar"></div>
            </div>
          </div>
        </center>
      </div>


      <!-- ---------------------------------------------------------------------------------------------------------- -->

    </section>

  <br/><br/><br/><br/>
</div>

<footer class="py-3 bg-dark">
      <div class="container text-center text-white-50">
        <h6><a target="_blank" href=<?= base_url('Login/aboutus'); ?>  >About Us&nbsp;|</a>
        <a target="_blank" href=<?= base_url('Login/terms'); ?> >Terms and Conditions&nbsp;|</a>
        <a target="_blank" href=<?= base_url('Login/privacy'); ?> >Privacy Policy&nbsp;|</a>
        <a target="_blank" href=<?= base_url('Login/contactus'); ?> >Contact Us &nbsp;|</a>
        <a target="_blank" href="https://submito.business.site/" ><i class="fa fa-globe" aria-hidden="true"></i> &nbsp;| </a>
        <a target="_blank" href="https://www.youtube.com/channel/UCAzHBeop4ACbeOKuoDcMoAQ" ><i class="fa fa-youtube" aria-hidden="true"></i> &nbsp;| </a>

        <a target="_blank" href="https://www.instagram.com/__team_submito_1/" ><i class="fa fa-instagram" aria-hidden="true"></i> &nbsp; </a>
        </h6>
          <small>&COPY; 2020 TEAM SUBMITO. &nbsp;All Rights Reserved</small>
      </div>
  </footer>

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