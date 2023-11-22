<?php include('includes/dbconnection.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/email-verif.php" />
    <title>Verify Account</title>
</head>

<body>
    <?php

    session_start();
 
        if (isset($_POST["verify_email"]))
        {
            $verification_code = $_SESSION['vc'];
            $email = $_SESSION['mail'];
            $verif_code = $_POST["verif_code"];
            $userid = $_SESSION['bpmsuid'];

            $sql = "SELECT * FROM verification_log WHERE user = '$userid' AND code = '$verif_code' ORDER BY id DESC LIMIT 1";
            $query = mysqli_query($con, $sql);

            if(mysqli_num_rows($query) != 0){
                $sql = "UPDATE tbluser SET `status` = 1, WHERE user = '$userid'";
                if(mysqli_query($con, $sql)){
                    ?>
                    <script>
                        window.location.replace("verified.php");
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Invalid verification code");
                </script>
                <?php
            } 
        }

    ?>
     
    <form method="POST">
        <div class="container">
            <h2>Verify Your Account</h2>
            <p>We sent a verification code to your email <br/> Enter the code below to confirm your
                email address.</p>
            <div class="code-container">
                <input type="text" class="code" name="verif_code"required>
            </div>
            <small class="info">
                <button class="eb" name="verify_email">Verify</button>
            </small>
        </div>
    </form>
</body>

</html>