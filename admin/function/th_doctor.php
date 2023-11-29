<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include('../includes/dbconnection.php');

    $name = $_REQUEST['name'];
    $user = $_REQUEST['user'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];

    $sql = "INSERT INTO tblAdmin (`AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegDate`) VALUES ('$name', '$user', '$phone', '$email', '$password', NOW())";
    if(mysqli_query($con, $sql)){
        echo json_encode([
            'valid' => true,
            'msg' => "Successfully Insert";
        ]);
    } else{ 
        echo json_encode([
            'valie' => false,
            'msg' => "Unsuccessful Insert";
        ]);
    }