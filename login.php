<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
error_reporting(0);

if(isset($_POST['login']))
{
    $emailcon=$_POST['emailcont'];
    $password=($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password'");
    $check_query=mysqli_fetch_array($query);
    if($check_query>0){
        if($check_query['status'] == 1){
            $_SESSION['bpmsuid']=$check_query['ID'];
            header('location:index.php');
        } else {
            //Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);
                //Enable verbose debug output
                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

                //Send using SMTP
                $mail->isSMTP();

                //Set the SMTP server to send through
                $mail->Host = 'smtp.gmail.com';

                //Enable SMTP authentication
                $mail->SMTPAuth = true;

                //SMTP username
                $mail->Username = 'sbaesthetic00@gmail.com';

                //SMTP password
                $mail->Password = 'sxcs pegf ojwb papn';

                //Enable TLS encryption;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('sbaesthetic00@gmail.com', 'SB OTP Verification');

                //Add a recipient
                $mail->addAddress($emailcon, $lname, $fname);

                //Set email format to HTML
                $mail->isHTML(true);

                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                $_SESSION['vc'] = $verification_code;
                $_SESSION['mail'] = $emailcon;

                // Email Verification Note
                $mail->Subject = 'Email verification';
                $mail->Body    = '<h1 style="color: #D8973C;">Welcome to SB Aesthetic</h1>

                <p>We are so happy and excited to have you here. Thank you for signing up and making a connection with <br>
                    us. To get started, please use the provided code below to confirm your new account.</p>
                <p>CODE: <b style="font-size: 25px;">'.$verification_code.'</b></p>

                <p>If you have any questions, please contact us and notify us about your concern.</p>

                <p>Enjoy and once again welcome to our website</p>

                <p style="font-size: 20px; color: #D8973C;">SB Aesthetic</p>';

                $id = $check_query['ID'];
                $sql = "INSERT INTO verification_log (`user`, `code`, `date`) VALUES('$id', '$verification_code', NOW())";
                // insert in users table
                if(!$mail->send()){
                    mysqli_query($con, $sql);
        ?>
                
                    <script>
                        alert("<?php echo "Register Failed, Invalid Email "?>");
                        window.location.replace('login.php');
                    </script>
                <?php
                }else{
                    ?>
                    <script>
                        alert("<?php echo "Register Successfully, A verification code is sent to " . $emailcon ?>");
                        window.location.replace('email-verif.php');
                    </script>
                    <?php
                }
            }
            
        }
        else{
            echo "<script>alert('Invalid Details.');</script>";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>SB Aesthetic | Login</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body id="home">
<?php include_once('includes/header.php');?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Login Page
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Login</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view">
                <div class="cont-details">
                    <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class="fa fa-phone text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Call Us</h6>
                            <p class="para"><a href="tel:+44 99 555 42">+<?php  echo $row['MobileNumber'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Email Us</h6>
                            <p class="para"><a href="mailto:example@mail.com" class="mail"><?php  echo $row['Email'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Address</h6>
                            <p class="para"> <?php  echo $row['PageDescription'];?></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Time</h6>
                            <p class="para"> <?php  echo $row['Timing'];?></p>
                        </div>
                    </div>
               <?php } ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <form method="post">
                        <div>
                            <input type="text" class="form-control" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true">
                           
                        </div>
                        <div style="padding-top: 30px;">
                          <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                        
                        </div>
                        
                        <div class="twice-two" style="padding-top: 30px;">
                          <a class="link--gray" style="color: blue;" href="forgot-password.php">Forgot Password?</a>
                        
                        </div>
                        <button type="submit" class="btn btn-contact" name="login">Login</button>
                    </form>
                </div>
    </div>
   
    </div></div>
</section>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
<!-- /move top -->
</body>

</html>