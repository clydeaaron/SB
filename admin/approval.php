<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['bpmsaid']==0)) {
        header('location:logout.php');
    }

    $admin = $_SESSION['bpmsaid'];
    $appointment = [];

    $sql = "SELECT a.*, b.FirstName FROM tblbook a
    LEFT JOIN tbluser b on a.UserID = b.ID";
    $query = mysqli_query($con, $sql);
    while($row = $query -> fetch_assoc()){
        array_push($appointment, $row);
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
<title>SB Aesthetic || Manage Services</title>

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
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

    </head>
    <body>
        <div class="container">
            <table class="table">
                <tr>
                    <th>Appointment Number</th>
                    <th>Customer</th>
                    <th>Date Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach($appointment as $list): ?>
                    <tr>
                        <td><?= $list['AptNumber'] ?></td>
                        <td><?= $list['FirstName'] ?></td>
                        <td><?= $list['BookingDate'] ?></td>
                        <td><button class="btn btn-success btn-sm" onclick="approved.call(this)" value="<?= $list['ID'] ?>">approve</button></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </body>
    </html>

    <script>
        function approved(){
            let row = $(this).closest("tr");
            let button = $(this).val();
            $.ajax({
                url: "function/approval.php",
                type: "POST",
                dataType: "json",
                async: false,
                success: function(res){
                    if(res.valid){
                        row.find("td:eq(3)").html("POSTED");
                    } else {
                        alert(res.msg)
                    }
                },
                error: function(res){
                    console.log(res)
                }
            })
        }
    </script>