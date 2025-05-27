<?php
// Initialize the session
session_start();


// Include config file
require_once "config.php";



$sql = "UPDATE license SET valid_until=? WHERE id=?";
         
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "si", $param_date, $param_id);
    
    // Set parameters
    $newDate = date("Y-m-d");
    $time = strtotime($newDate);
    $month = date("F");
    $year = date("Y");
    $year += 1;
    $day = date("j");
    $param_date = $year."-".date("m-d");//$year."-".$month."-".$day;
    $param_id = 1;
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Records updated successfully. Redirect to landing page
        header("location: auth.php");
        exit();
    } else{
        header("location: azazer/xoqrzy/admin/error.php");
    }
}
    
// Close statement
mysqli_stmt_close($stmt);


// Close connection
mysqli_close($link);