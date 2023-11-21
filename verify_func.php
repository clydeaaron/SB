<?php 
    include('includes/dbconnection.php');
    session_start(); 
    if (strlen($_SESSION['bpmsuid']==0)) {
    header('location:logout.php');
    }
    
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
    $mail->addAddress($email, $lname, $fname);

    //Set email format to HTML
    $mail->isHTML(true);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $_SESSION['vc'] = $verification_code;
    $_SESSION['mail'] = $email;

    // Email Verification Note
    $mail->Subject = 'Email verification';
    $mail->Body    = '<h1 style="color: #D8973C;">Welcome to SB Aesthetic</h1>

    <p>We are so happy and excited to have you here. Thank you for signing up and making a connection with <br>
        us. To get started, please use the provided code below to confirm your new account.</p>
    <p>CODE: <b style="font-size: 25px;">'.$verification_code.'</b></p>

    <p>If you have any questions, please contact us and notify us about your concern.</p>

    <p>Enjoy and once again welcome to our website</p>

    <p style="font-size: 20px; color: #D8973C;">SB Aesthetic</p>';

    // insert in users table
    if(!$mail->send()){
    ?>
        <script>
            alert("<?php echo "Register Failed, Invalid Email "?>");
            window.location.replace('signup.php');
        </script>
    <?php
    }else{
        ?>
        <script>
            alert("<?php echo "Register Successfully, A verification code is sent to " . $email ?>");
            window.location.replace('email-verif.php');
        </script>
        <?php
    }