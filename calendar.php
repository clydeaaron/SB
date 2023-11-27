<?php 
    if(!isset($_SESSION)){
        session_start();
        error_reporting(0);
    }
    
    include('includes/dbconnection.php'); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src='includes/index.global.js'></script>
    <script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="admin/css/style.css" rel='stylesheet' type='text/css' />

<link href="admin/css/font-awesome.css" rel="stylesheet"> 

<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="admin/js/modernizr.custom.js"></script>

<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>


<link href="admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="admin/js/wow.min.js"></script>
	<script>
    new WOW().init();
	</script>

<script src="admin/js/Chart.js"></script>
<link rel="stylesheet" href="admin/css/clndr.css" type="text/css" />
<script src="admin/js/underscore-min.js" type="text/javascript"></script>
<script src= "admin/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="admin/js/clndr.js" type="text/javascript"></script>
<script src="admin/js/site.js" type="text/javascript"></script>

<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
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
<body  class="cbp-spmenu-push" style="padding: 0;">
    <div class="main-content" style="width: 100%; padding: 0; margin-top:0">

            <?php include('includes/header.php');?>

        <div style="display: flex; justify-items: center; justify-content: center; right: 0;width: 100%; margin-right: 0;">
            <div style="width: 50%; height: 50%">
                <div id="calendar"></div>
            </div>
        </div>
        <div style="display: relative;">
            <?php include_once('includes/footer.php');?>
        </div>
    </div>
</body>
</html>


<script src="admin/js/classie.js"></script>
<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
<script type='text/javascript'>
			// var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			// 	showLeftPush = document.getElementById( 'showLeftPush' ),
			// 	body = document.body;
				
			// showLeftPush.onclick = function() {
			// 	classie.toggle( this, 'active' );
			// 	classie.toggle( body, 'cbp-spmenu-push-toright' );
			// 	classie.toggle( menuLeft, 'cbp-spmenu-open' );
			// 	disableOther( 'showLeftPush' );
			// };
			

			// function disableOther( button ) {
			// 	if( button !== 'showLeftPush' ) {
			// 		classie.toggle( showLeftPush, 'disabled' );
			// 	}
			// }

    // document.addEventListener('DOMContentLoaded', function() {
    //     var schedules = [];
    //     $.ajax({
    //     url: 'admin/function/schedule.php',
    //     dataType: 'json',
    //     success: function(res) {
    //         if (res.valid) {
    //         res.data.map((item, index) => {
    //             let user = item.FirstName + " " + item.LastName
    //             let booking = item.AptDate + " " + item.AptTime
    //             schedules.push({
    //                 groupId: item.ID,
    //                 title: user,
    //                 start: booking
    //             });
    //         });
    //         } else {
    //             console.log("No Data has found!");
    //         }       

    //         console.log(schedules)
    //         var calendarEl = document.getElementById('calendar');
    //         var calendar = new FullCalendar.Calendar(calendarEl, {
    //             initialDate: new Date(),
    //             editable: false,
    //             selectable: true,
    //             businessHours: true,
    //             dayMaxEvents: true,
    //             events: schedules,
    //             eventRender: function (info) {
    //                 var start = formatAMPM(info.event.start);
    //                 var end = formatAMPM(info.event.end);
    //                 var timeText = start + ' - ' + end;
    //                 info.el.querySelector('.fc-time').innerText = timeText;

    //                 // Add custom classes based on AM/PM
    //                 if (info.event.start.getHours() < 12) {
    //                 info.el.classList.add('event-am');
    //                 } else {
    //                 info.el.classList.add('event-pm');
    //                 }
    //             }
    //         });

    //         calendar.render();
    //     },
    //     error: function(res) {
    //         console.log('Error:', res);
    //     }
    //     });
    // });

    // function formatAMPM(date) {
    //     var hours = date.getHours();
    //     var minutes = date.getMinutes();
    //     var ampm = hours >= 12 ? 'PM' : 'AM';
    //     hours = hours % 12;
    //     hours = hours ? hours : 12; // The hour '0' should be '12'
    //     minutes = minutes < 10 ? '0' + minutes : minutes;
    //     var strTime = hours + ':' + minutes + ' ' + ampm;
    //     return strTime;
    // }
</script>

<script type='text/javascript'>

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
            // events: schedules,
            events: schedules,
            eventRender: function (info) {
                console.log(info)
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