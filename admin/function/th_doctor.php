<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include('../includes/dbconnection.php');

    $name = $_REQUEST['name'];
    $addres = $_REQUEST['address'];
    $gender = $_REQUEST['gender'];
    $type = $_REQUEST['type'];

    $sql = "INSERT INTO tbldoctor (`name`, `address`, `gender`, `type`, `status`) VALUES ('$name', '$address', '$gender', '$type', 1)";
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