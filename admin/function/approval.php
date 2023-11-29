<?php 
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');

    $id = $_POST['id'];
    $sql = "UPDATE tblbook"
