<?php 
  if(!isset($_SESSION)){
    session_start();
    error_reporting(0);
  }
    
    include('includes/dbconnection.php'); 
?> 


<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<script src='includes/index.global.js'></script>
<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js-->
<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="admin/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="admin/js/wow.min.js"></script>
	<script>
    new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="admin/js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="admin/css/clndr.css" type="text/css" />
<script src="admin/js/underscore-min.js" type="text/javascript"></script>
<script src= "admin/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="admin/js/clndr.js" type="text/javascript"></script>
<script src="admin/js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
</style>
</head>
<body class="cbp-spmenu-push">
  <div class="main-content">
      <?php include_once('includes/header.php');?>

    <div class="row calender widget-shadow" style='min-height: 50%' >
        <div class="main-page">
          <div class="row calender widget-shadow">
            <div class="row-one">
              <div id='calendar' ></div>
            </div>
          </div>
        </div >
    </div>
    <?php include_once('includes/footer.php');?>
</div>
</body>
</html>

<script src="admin/js/classie.js"></script>
<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
<script type='text/javascript'>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}

    document.addEventListener('DOMContentLoaded', function() {
        var schedules = [];
        $.ajax({
        url: 'admin/function/schedule.php',
        dataType: 'json',
        success: function(res) {
            if (res.valid) {
            res.data.forEach(function(item) {
                let user = item.FirstName + " " + item.LastName
                let booking = item.AptDate + " " + item.AptTime
                schedules.push({
                groupId: item.ID,
                title: user,
                start: booking
                });
            });
            } else {
            console.log("No Data has found!");
            }       

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: new Date(),
            editable: false,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true,
            events: schedules,
            eventRender: function (info) {
                var start = formatAMPM(info.event.start);
                var end = formatAMPM(info.event.end);
                var timeText = start + ' - ' + end;
                info.el.querySelector('.fc-time').innerText = timeText;

                // Add custom classes based on AM/PM
                if (info.event.start.getHours() < 12) {
                info.el.classList.add('event-am');
                } else {
                info.el.classList.add('event-pm');
                }
            }
            });

            calendar.render();
        },
        error: function(res) {
            console.log('Error:', res);
        }
        });
    });

    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // The hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }
</script>