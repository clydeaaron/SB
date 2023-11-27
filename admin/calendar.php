<?php 
  if(!isset($_SESSION)){
    session_start();
    error_reporting(0);
  }
    
    include('includes/dbconnection.php');
    if (strlen($_SESSION['bpmsaid']==0)) {
      header('location:logout.php');
    } 
?> 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<script src='../includes/index.global.js'></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
    new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
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
    <?php include_once('includes/sidebar.php');?>
      <?php include_once('includes/header.php');?>

    <div class="row calender widget-shadow" style='min-height: 50%' >
        <div class="main-page">
          <div class="row calender widget-shadow">
            <div class="row-one">
              <div style="display: flex; justify-items: right; justify-content: right; width: 100%; margin-right: 0;">
                  <div style="width: 75%; height: 50%">
                      <div id="calendar"></div>
                  </div>
              </div>
            </div>
          </div>
        </div >
    </div>
    <?php include_once('includes/footer.php');?>
  </div>
</body>
</html>

<script src="js/classie.js"></script>
<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
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
      url: 'function/schedule.php',
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
          editable: true,
          selectable: true,
          businessHours: true,
          dayMaxEvents: true,
          events: schedules,
          
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