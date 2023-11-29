<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
} else{
if($_GET['delid']){
    $sid=$_GET['delid'];
    mysqli_query($con,"delete from tblservices where ID ='$sid'");
    echo "<script>alert('Data Deleted');</script>";
    echo "<script>window.location.href='manage-services.php'</script>";
}
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
<body class="cbp-spmenu-push">
	<div class="main-content">
        
<body class="cbp-spmenu-push">
	<div class="main-content">
        <div>
            <?php include "includes/header.php";
                include "includes/sidebar.php";
            ?>

        </div>

        <div style="display: flex; padding-top: 10%" class="container">
            <div style="width: 50%">

            </div>
            <div style="width: 75%;">
                <div  style="display: flex; padding: 10px;">
                    <label for="full_name">Enter Name: </label>
                    <input type="text" class="form-control input-sm" id="full_name">
                </div>
                <div  style="display: flex; padding: 10px;">
                    <label for="address">Enter Email Address</label>
                    <input type="text" class="form-control input-sm" id="address">
                </div>
                <div style="display: flex; padding: 10px;">
                    <label for="password">Enter Password</label>
                    <input type="password" class="form-control input-sm" >
                </div>
                
                <div  style="display: flex; padding: 10px;">
                    <button type="button" id="submit">Submit</button>
                </div>
            </div>
        </div>
<!--         
        <div>
            < ?php include "includes/footer.php" ?>
        </div> -->
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            let name = $("#full_name").val();
            let address = $("#address").val();
            let gender = $("#gender:checked").val();
            let doctor = $("#doctor").val();
            
            $.ajax({
                url: "function/th_doctor.php",
                data: {
                    name: name,
                    address: address,
                    gender: gender,
                    doctor: doctor
                },
                success: function(res){
                    alert(res.msg3)
                },
                error: function(res){
                    console.log(res)
                }
            })

        })
    })
</script>