<?php
   $con = mysqli_connect("localhost", "id5843086_otp", "12345", "id5843086_otp");
    
    
    $otp = $_POST["otp"];
    

    $statement = mysqli_prepare($con, "INSERT INTO otp (otp) VALUES (?)");
    mysqli_stmt_bind_param($statement, "s", $otp);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>