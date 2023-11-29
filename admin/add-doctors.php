<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

/*if(isset($_POST['submit']))
  {
    $sername=$_POST['sername'];
    $serdesc=$_POST['serdesc'];
    $cost=$_POST['cost'];
   $image=$_POST['image'];
$image=$_FILES["image"]["name"];
// get the image extension
$extension = substr($image,strlen($image)-4,strlen($image));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$newimage=md5($image).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$newimage);
     
    $query=mysqli_query($con, "insert into  tblservices(ServiceName,ServiceDescription,Cost,Image) value('$sername','$serdesc','$cost','$newimage')");
    if ($query) {
    	echo "<script>alert('Service has been added.');</script>"; 
    		echo "<script>window.location.href = 'add-services.php'</script>";   
    
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
    }

  
}
}*/
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>SB Aesthetic | Add Doctors</title>

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
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Add Doctor's/Staff's</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-body">
							<form method="post" enctype="multipart/form-data">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
							 <div class="form-group"> <label for="exampleInputEmail1">Doctor's/Staff's Name</label> <input type="text" class="form-control" id="sername" name="sername" placeholder="Doctor's/Staff's Name" value="" required="true"> </div>
							 <div class="form-group"> <label for="exampleInputEmail1">Doctor's/Staff's Username</label> <input type="text" class="form-control" id="user" name="user" required="true"></div>
							 <div class="form-group"> <label for="exampleInputEmail1">Doctor's/Staff's Email</label> <input type="text" class="form-control" name="email" id="email" required="true"> </div>
							 <div class="form-group"> <label for="exampleInputEmail1">Doctor's/Staff's Phone Number</label> <input type="number" name="phone" id="phone" class="form-control" required> </div>
							<div class="form-group"> <label for="exampleInputEmail1">Doctor's/Staff's Password</label> <input type="password" name="password" id="password" class="from-control" required="true"> </div>
							  <button type="submit" name="submit" class="btn btn-default">Add</button> </form> 
						</div>
						
					</div>	
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
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
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            let name = $("#sername").val();
            let email = $("#email").val();
			let user = $("#user").val();
			let phone = $("#phone").val();
            let password = $("#password").val();
            
            $.ajax({
                url: "function/th_doctor.php",
                data: {
                    name: name,
                    email: email,
					user: user,
					phone: phone,
					password: password
                },
                success: function(res){
                    alert(res.msg)
                },
                error: function(res){
                    console.log(res)
                }
            })

        })
    })
</script>
<?php } ?>