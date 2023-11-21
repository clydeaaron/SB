<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    include('../includes/dbconnection.php');

    $sql = "SELECT a.*, b.FirstName, b.LastName FROM tblbook a left join tbluser b on a.UserID = b.ID";
    $query = mysqli_query($con, $sql);
    $data = [];
    while($row = $query -> fetch_assoc()){
        array_push($data, $row);
    }

    echo json_encode([
        'valid' => true,
        'data' => $data
    ]);