<?php 
include('includes/dbconnection.php');
session_start(); 

?>


<!doctype html>
<html lang="en">
  <head>


    <title>SB Aesthetic | Signup Page</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>

  <!-- Header start -->
  <body id="home">
<?php include_once('includes/header.php');?>

<!-- Common jquery plugin -->
<script src="assets/js/jquery-3.3.1.min.js"></script>

<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>

<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
  <!-- Header End -->

  <?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';


    if (isset($_POST["submit"]))
    {
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $email = $_POST['email'];
      $contno = $_POST['mobilenumber'];
      $password = $_POST['password'];

      $check_query = mysqli_query($con, "SELECT * FROM tbluser where Email ='$email' OR MobileNumber = '$contno'");
      $rowCount = mysqli_num_rows($check_query);



      if(!preg_match("/^[a-zA-Z\s]+$/", $fname) || !preg_match("/^[a-zA-Z\s]+$/", $fname))
        {
          ?>
          <script>
            alert("Please enter character only");
          </script>
          <?php
        }elseif(!preg_match("/^[0-9]*$/", $contno))
        {
          ?>
          <script>
            alert("Please enter valid mobile number");
          </script>
          <?php
        }elseif(strlen($contno)<11)
        {
          ?>
          <script>
            alert("Please enter proper number");
          </script>
          <?php
        }elseif(strlen($contno)>11)
        {
          ?>
          <script>
            alert("Number is too large. Enter a valid number");
          </script>
          <?php
        }elseif(strlen($password)<8)
        {
          ?>
          <script>
            alert("Password should be at least 8 characters");
          </script>
          <?php
        }elseif(strlen($password)>20)
        {
          ?>
          <script>
            alert("Password too long");
          </script>
          <?php
        }elseif(!empty($email) || !empty($contno)) {
        if ($rowCount > 0) {
          ?>
          <script>
            alert("Email or Mobile Number already exist");
          </script>
          <?php
        }else{
          $sql = "INSERT INTO tbluser SET
          firstname='$fname',
          lastname='$lname',
          email='$email',
          mobilenumber='$contno',
          password='$password',
          email_verif_at='NULL',
          status = 0
        ";
          mysqli_query($con, $sql);

        }
      }
    }
?>

<div class="container">
  
          
            
            <div class="column-2">
            <div class="wrapper">
              <div class="title"><span>Create Account</span></div>
              <p>Enter your details to create your own account.</p>

              <form method="POST">
                <div class="row">
                <input type="text" placeholder="First Name" name="firstname" required>
                </div>
                <br>
                <div class="row">
                <input type="text" placeholder="Last Name" name="lastname" required>
                </div>
                <br>
              <div class="row">
              <input type="email" placeholder="Email Address" name="email" required>
              </div>
              <br>
              <div class="row">
                <input type="num" name="mobilenumber" placeholder="Contact Number">
              </div>
              <br>
              <div class="row">
              <input type="password" placeholder="Password" name="password" required>
              </div>

              <br>

              <div class="row">
              <button class="btn btn-contact" name="submit">Register</button>
              </div>

                <div class="Login">Already have an account?
                <button id="LoginNow" class="LoginNow" onclick="LoginNow()"><a href="login.php">Login Now</a></button>
                </div>
              </form>

            </div>
            </div>
          </div>
                      
  </div>
  <!-- js -->
<script>
  // script for open login module
  document.getElementById("LoginNow").addEventListener("click", function(){
    document.querySelector(".LoginContainer").style.display = "block";
  })

  document.getElementById("close-btn").addEventListener("click", function(){
  document.querySelector(".LoginContainer").style.display = "none";
})
  </script>

    <!-- Footer Start -->
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
    <!-- Footer End -->
</body>
</html>