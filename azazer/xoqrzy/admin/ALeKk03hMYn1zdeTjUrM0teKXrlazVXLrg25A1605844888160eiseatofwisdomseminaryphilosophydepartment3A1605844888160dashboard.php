<?php
// Initialize the session
session_start();

// Include config file
require_once "../../config.php";


// Check if license has expired
$sqlLicense = "SELECT * FROM license WHERE id ='1'";
if($resultLicense = mysqli_query($link, $sqlLicense)){
    if(mysqli_num_rows($resultLicense) > 0){
        while($rowLicense = mysqli_fetch_array($resultLicense)){
            // Assign old license date
            $oldDate = $rowLicense['valid_until'];
            // Assign current license date
            $newDate = date("Y-m-d");
            // Assign date sections into variable
            $time = strtotime($oldDate);
            $month = date("F",$time);
            $year = date("Y",$time);
            $day = date("j",$time);
            $oldDateFormated = $day." ".$month." ".$year;
        }
        // Free result set
        mysqli_free_result($resultLicense);
    } else{
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else{
    echo "ERROR: Could not able to execute $sqlLicense. " . mysqli_error($link);
}
if($oldDate < $newDate){
    
  // Destroying session
    session_destroy();
} 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 400){
    header("location: ../../../auth.php");
    exit;
}


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // assign session variables
    $PHIL201 = trim($_POST["PHIL201"]);
    $PHIL216 = trim($_POST["PHIL216"]);
    $PHIL223 = trim($_POST["PHIL223"]);
    $PHIL236 = trim($_POST["PHIL236"]);
    $PHIL243 = trim($_POST["PHIL243"]);
    $PHIL242 = trim($_POST["PHIL242"]);
    $PHIL245 = trim($_POST["PHIL245"]);
    $PHIL246 = trim($_POST["PHIL246"]);
    $PHIL265 = trim($_POST["PHIL265"]);
    $PHIL262 = trim($_POST["PHIL262"]);
    $PHIL271 = trim($_POST["PHIL271"]);
    $PHIL264 = trim($_POST["PHIL264"]);
    $GST223 = trim($_POST["GST223"]);
    $PHIL268 = trim($_POST["PHIL268"]);
    $CMP202 = trim($_POST["CMP202"]);
    $GST222 = trim($_POST["GST222"]);

    // Store data in session variables
    $_SESSION["PHIL201"] = $PHIL201;
    $_SESSION["PHIL216"] = $PHIL216;
    $_SESSION["PHIL223"] = $PHIL223;
    $_SESSION["PHIL236"] = $PHIL236;
    $_SESSION["PHIL243"] = $PHIL243;
    $_SESSION["PHIL242"] = $PHIL242;
    $_SESSION["PHIL245"] = $PHIL245;
    $_SESSION["PHIL246"] = $PHIL246;
    $_SESSION["PHIL265"] = $PHIL265;
    $_SESSION["PHIL262"] = $PHIL262;
    $_SESSION["PHIL271"] = $PHIL271;
    $_SESSION["PHIL264"] = $PHIL264;
    $_SESSION["GST223"] = $GST223;
    $_SESSION["PHIL268"] = $PHIL268;
    $_SESSION["CMP202"] = $CMP202;
    $_SESSION["GST222"] = $GST222;

    //for the 1st course in second year 1st semester
    try{
        // clear data in variable
        $_totalgp = 0;
        $_semstergpa = 0;
        
        if ($PHIL201 >= 70)
        {
            $PHIL201grade = "A"; 
            $PHIL201gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL201 >= 60)
        {
            $PHIL201grade = "B"; 
            $PHIL201gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL201 >= 50)
        {
            $PHIL201grade = "C"; 
            $PHIL201gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL201 >= 45)
        {
            $PHIL201grade = "D"; 
            $PHIL201gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL201 >= 40)
        {
            $PHIL201grade = "E"; 
            $PHIL201gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL201 >= 0)
        {
            $PHIL201grade = "F"; 
            $PHIL201gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL201: " . $e->getMessage() . "</p>";
    }

    //for the 2nd course in second year 1st semester
    try{
        if ($PHIL223 >= 70)
        {
            $PHIL223grade = "A"; 
            $PHIL223gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL223 >= 60)
        {
            $PHIL223grade = "B"; 
            $PHIL223gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL223 >= 50)
        {
            $PHIL223grade = "C"; 
            $PHIL223gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL223 >= 45)
        {
            $PHIL223grade = "D"; 
            $PHIL223gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL223 >= 40)
        {
            $PHIL223grade = "E"; 
            $PHIL223gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL223 >= 0)
        {
            $PHIL223grade = "F"; 
            $PHIL223gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL223: " . $e->getMessage() . "</p>";
    }

    //for the 3rd course in second year 1st semester
    try{
        if ($PHIL243 >= 70)
        {
            $PHIL243grade = "A";
            $PHIL243gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL243 >= 60)
        {
            $PHIL243grade = "B";
            $PHIL243gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL243 >= 50)
        {
            $PHIL243grade = "C";
            $PHIL243gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL243 >= 45)
        {
            $PHIL243grade = "D";
            $PHIL243gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL243 >= 40)
        {
            $PHIL243grade = "E";
            $PHIL243gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL243 >= 0)
        {
            $PHIL243grade = "F";
            $PHIL243gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL243: " . $e->getMessage() . "</p>";
    }

    //for the 4th course in second year 1st semester
    try{
        if ($PHIL245 >= 70)
        {
            $PHIL245grade = "A";
            $PHIL245gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL245 >= 60)
        {
            $PHIL245grade = "B";
            $PHIL245gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL245 >= 50)
        {
            $PHIL245grade = "C";
            $PHIL245gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL245 >= 45)
        {
            $PHIL245grade = "D";
            $PHIL245gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL245 >= 40)
        {
            $PHIL245grade = "E";
            $PHIL245gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL245 >= 0)
        {
            $PHIL245grade = "F";
            $PHIL245gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL245: " . $e->getMessage() . "</p>";
    }

    //for the 5th course in second year 1st semester
    try{
        if ($PHIL265 >= 70)
        {
            $PHIL265grade = "A";
            $PHIL265gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL265 >= 60)
        {
            $PHIL265grade = "B";
            $PHIL265gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL265 >= 50)
        {
            $PHIL265grade = "C";
            $PHIL265gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL265 >= 45)
        {
            $PHIL265grade = "D";
            $PHIL265gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL265 >= 40)
        {
            $PHIL265grade = "E";
            $PHIL265gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL265 >= 0)
        {
            $PHIL265grade = "F";
            $PHIL265gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL265: " . $e->getMessage() . "</p>";
    }

    //for the 6th course in second year 1st semester
    try{
        if ($PHIL271 >= 70)
        {
            $PHIL271grade = "A";
            $PHIL271gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL271 >= 60)
        {
            $PHIL271grade = "B";
            $PHIL271gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL271 >= 50)
        {
            $PHIL271grade = "C";
            $PHIL271gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL271 >= 45)
        {
            $PHIL271grade = "D";
            $PHIL271gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL271 >= 40)
        {
            $PHIL271grade = "E";
            $PHIL271gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL271 >= 0)
        {
            $PHIL271grade = "F";
            $PHIL271gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL271: " . $e->getMessage() . "</p>";
    }

    //for the 7th course in second year 1st semester
    try{
        if ($GST223 >= 70)
        {
            $GST223grade = "A";
            $GST223gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST223 >= 60)
        {
            $GST223grade = "B"; 
            $GST223gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST223 >= 50)
        {
            $GST223grade = "C"; 
            $GST223gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST223 >= 45)
        {
            $GST223grade = "D"; 
            $GST223gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST223 >= 40)
        {
            $GST223grade = "E"; 
            $GST223gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST223 >= 0)
        {
            $GST223grade = "F"; 
            $GST223gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST223: " . $e->getMessage() . "</p>";
    }
    
    $_finaltotalgp21 = $_totalgp;
    $_semstergpa = $_totalgp / 18;
    $SEMESTER_GPA_SECOND_YEAR_SEMSTER_1 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_SECOND_YEAR_SEMSTER_1 = $_totalgp;
    $TOTAL_CU_SECOND_YEAR_SEMSTER_1 = "18";
    $_finaltotalcu2 = 0;
    $_finaltotalcu2 = $_finaltotalcu2 + 18;

    
    
    //for the 1st course in second year 2nd semester
    try{
        // clear data in variable
        $_totalgp = 0;
        $_semstergpa = 0;
        
        if ($PHIL216 >= 70)
        {
            $PHIL216grade = "A"; 
            $PHIL216gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL216 >= 60)
        {
            $PHIL216grade = "B"; 
            $PHIL216gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL216 >= 50)
        {
            $PHIL216grade = "C"; 
            $PHIL216gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL216 >= 45)
        {
            $PHIL216grade = "D"; 
            $PHIL216gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL216 >= 40)
        {
            $PHIL216grade = "E"; 
            $PHIL216gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL216 >= 0)
        {
            $PHIL216grade = "F"; 
            $PHIL216gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL216: " . $e->getMessage() . "</p>";
    }

    //for the 2nd course in second year 2nd semester
    try{
        if ($PHIL236 >= 70)
        {
            $PHIL236grade = "A"; 
            $PHIL236gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL236 >= 60)
        {
            $PHIL236grade = "B"; 
            $PHIL236gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL236 >= 50)
        {
            $PHIL236grade = "C"; 
            $PHIL236gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL236 >= 45)
        {
            $PHIL236grade = "D"; 
            $PHIL236gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL236 >= 40)
        {
            $PHIL236grade = "E"; 
            $PHIL236gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL236 >= 0)
        {
            $PHIL236grade = "F"; 
            $PHIL236gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL236: " . $e->getMessage() . "</p>";
    }

    //for the 3rd course in second year 2nd semester
    try{
        if ($PHIL242 >= 70)
        {
            $PHIL242grade = "A"; 
            $PHIL242gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL242 >= 60)
        {
            $PHIL242grade = "B"; 
            $PHIL242gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL242 >= 50)
        {
            $PHIL242grade = "C"; 
            $PHIL242gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL242 >= 45)
        {
            $PHIL242grade = "D"; 
            $PHIL242gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL242 >= 40)
        {
            $PHIL242grade = "E"; 
            $PHIL242gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL242 >= 0)
        {
            $PHIL242grade = "F"; 
            $PHIL242gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL242: " . $e->getMessage() . "</p>";
    }

    //for the 4th course in second year 2nd semester
    try{
        if ($PHIL246 >= 70)
        {
            $PHIL246grade = "A";
            $PHIL246gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL246 >= 60)
        {
            $PHIL246grade = "B"; 
            $PHIL246gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL246 >= 50)
        {
            $PHIL246grade = "C";
            $PHIL246gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL246 >= 45)
        {
            $PHIL246grade = "D"; 
            $PHIL246gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL246 >= 40)
        {
            $PHIL246grade = "E"; 
            $PHIL246gp =$_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL246 >= 0)
        {
            $PHIL246grade = "F"; 
            $PHIL246gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL246: " . $e->getMessage() . "</p>";
    }

    //for the 5th course in second year 2nd semester
    try{
        if ($PHIL262 >= 70)
        {
            $PHIL262grade = "A"; 
            $PHIL262gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL262 >= 60)
        {
            $PHIL262grade = "B"; 
            $PHIL262gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL262 >= 50)
        {
            $PHIL262grade = "C"; 
            $PHIL262gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL262 >= 45)
        {
            $PHIL262grade = "D"; 
            $PHIL262gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL262 >= 40)
        {
            $PHIL262grade = "E"; 
            $PHIL262gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL262 >= 0)
        {
            $PHIL262grade = "F"; 
            $PHIL262gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL262: " . $e->getMessage() . "</p>";
    }

    //for the 6th course in second year 2nd semester
    try{
        if ($PHIL264 >= 70)
        {
            $PHIL264grade = "A"; 
            $PHIL264gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL264 >= 60)
        {
            $PHIL264grade = "B"; 
            $PHIL264gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL264 >= 50)
        {
            $PHIL264grade = "C"; 
            $PHIL264gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL264 >= 45)
        {
            $PHIL264grade = "D"; 
            $PHIL264gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL264 >= 40)
        {
            $PHIL264grade = "E"; 
            $PHIL264gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL264 >= 0)
        {
            $PHIL264grade = "F"; 
            $PHIL264gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL264: " . $e->getMessage() . "</p>";
    }

    //for the 7th course in second year 2nd semester
    try{
        if ($PHIL268 >= 70)
        {
            $PHIL268grade = "A"; 
            $PHIL268gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL268 >= 60)
        {
            $PHIL268grade = "B"; 
            $PHIL268gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL268 >= 50)
        {
            $PHIL268grade = "C"; 
            $PHIL268gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL268 >= 45)
        {
            $PHIL268grade = "D"; 
            $PHIL268gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL268 >= 40)
        {
            $PHIL268grade = "E"; 
            $PHIL268gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL268 >= 0)
        {
            $PHIL268grade = "F"; 
            $PHIL268gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL268: " . $e->getMessage() . "</p>";
    }

    //for the 8th course in second year 2nd semester
    try{
        if ($CMP202 >= 70)
        {
            $CMP202grade = "A"; 
            $CMP202gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($CMP202 >= 60)
        {
            $CMP202grade = "B"; 
            $CMP202gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($CMP202 >= 50)
        {
            $CMP202grade = "C"; 
            $CMP202gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($CMP202 >= 45)
        {
            $CMP202grade = "D"; 
            $CMP202gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($CMP202 >= 40)
        {
            $CMP202grade = "E"; 
            $CMP202gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($CMP202 >= 0)
        {
            $CMP202grade = "F"; 
            $CMP202gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at CMP202: " . $e->getMessage() . "</p>";
    }

    //for the 9th course in second year 2nd semester
    try{
        if ($GST222 >= 70)
        {
            $GST222grade = "A"; 
            $GST222gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST222 >= 60)
        {
            $GST222grade = "B"; 
            $GST222gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST222 >= 50)
        {
            $GST222grade = "C"; 
            $GST222gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST222 >= 45)
        {
            $GST222grade = "D"; 
            $GST222gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST222 >= 40)
        {
            $GST222grade = "E"; 
            $GST222gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST222 >= 0)
        {
            $GST222grade = "F"; 
            $GST222gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST222: " . $e->getMessage() . "</p>";
    }
    
    $_finaltotalgp22 = $_totalgp;
    $_semstergpa = $_totalgp / 22;
    $SEMESTER_GPA_SECOND_YEAR_SEMSTER_2 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_SECOND_YEAR_SEMSTER_2 = $_totalgp;
    $TOTAL_CU_SECOND_YEAR_SEMSTER_2 = "22";
    $_finaltotalcu2 = $_finaltotalcu2 + 22;

    // create function and add all variables into session array
    // Store Grade data in session variables
    $_SESSION["PHIL201grade"] = $PHIL201grade;
    $_SESSION["PHIL216grade"] = $PHIL216grade;
    $_SESSION["PHIL223grade"] = $PHIL223grade;
    $_SESSION["PHIL236grade"] = $PHIL236grade;
    $_SESSION["PHIL243grade"] = $PHIL243grade;
    $_SESSION["PHIL242grade"] = $PHIL242grade;
    $_SESSION["PHIL245grade"] = $PHIL245grade;
    $_SESSION["PHIL246grade"] = $PHIL246grade;
    $_SESSION["PHIL265grade"] = $PHIL265grade;
    $_SESSION["PHIL262grade"] = $PHIL262grade;
    $_SESSION["PHIL271grade"] = $PHIL271grade;
    $_SESSION["PHIL264grade"] = $PHIL264grade;
    $_SESSION["GST223grade"] = $GST223grade;
    $_SESSION["PHIL268grade"] = $PHIL268grade;
    $_SESSION["CMP202grade"] = $CMP202grade;
    $_SESSION["GST222grade"] = $GST222grade;

    // Store GP data in session variables
    $_SESSION["PHIL201gp"] = $PHIL201gp;
    $_SESSION["PHIL216gp"] = $PHIL216gp;
    $_SESSION["PHIL223gp"] = $PHIL223gp;
    $_SESSION["PHIL236gp"] = $PHIL236gp;
    $_SESSION["PHIL243gp"] = $PHIL243gp;
    $_SESSION["PHIL242gp"] = $PHIL242gp;
    $_SESSION["PHIL245gp"] = $PHIL245gp;
    $_SESSION["PHIL246gp"] = $PHIL246gp;
    $_SESSION["PHIL265gp"] = $PHIL265gp;
    $_SESSION["PHIL262gp"] = $PHIL262gp;
    $_SESSION["PHIL271gp"] = $PHIL271gp;
    $_SESSION["PHIL264gp"] = $PHIL264gp;
    $_SESSION["GST223gp"] = $GST223gp;
    $_SESSION["PHIL268gp"] = $PHIL268gp;
    $_SESSION["CMP202gp"] = $CMP202gp;
    $_SESSION["GST222gp"] = $GST222gp;

    // global variable for the Grand TOTAL CU
    $_SESSION['_finaltotalcu2'] = $_finaltotalcu2;

    // total sumation for GPA, GP, CU for second year first semester
    $_SESSION['_finaltotalgp21'] = $_finaltotalgp21;
    $_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_1'] = $SEMESTER_GPA_SECOND_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_GP_SECOND_YEAR_SEMSTER_1'] = $TOTAL_GP_SECOND_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_CU_SECOND_YEAR_SEMSTER_1'] = $TOTAL_CU_SECOND_YEAR_SEMSTER_1;

    // total sumation for GPA, GP, CU for second year second semester
    $_SESSION['_finaltotalgp22'] = $_finaltotalgp22;
    $_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_2'] = $SEMESTER_GPA_SECOND_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_GP_SECOND_YEAR_SEMSTER_2'] = $TOTAL_GP_SECOND_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_CU_SECOND_YEAR_SEMSTER_2'] = $TOTAL_CU_SECOND_YEAR_SEMSTER_2;

    // Redirect user to enter YEAR ONE page
    header("location: ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg37A1605844888160eiseatofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/logo.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transcript | SWS Philosophy Powered By Eliam Technologies</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon ">
                <img src="img/logo-small.png">
                </div>
                <div class="sidebar-brand-text mx-3">Philosophy Dept.<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Add New</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="manage.php">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Manage</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
                <p class="text-center mb-2"><strong>License Key: SWSPHIL</strong>
                </br><strong>Valid Until</strong>
                </br><strong class="mb-8"><?php echo $oldDateFormated?></strong></p>
                </br><strong class="mb-8">E-Transcript v3.0</strong></p>
                <a class="btn btn-success btn-sm" href="https://paystack.com/pay/eliamtechswsphiletranscript" target="_blank">Renew Licence</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">SWS Philosophy</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-file-contract fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Licence Info
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add New</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    
                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="home.php">Student Credentials</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg13A1605844888160eiseaofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php">Year One</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg25A1605844888160eiseatofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php">Year Two</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >YEAR: <?php echo $_SESSION["admissionYear2"];?></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >NAME: <?php echo $_SESSION["studentName"];?></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >FIRST SEMESTER</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label >SECOND SEMESTER</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 201</label>
                                        <input type="number" class="form-control"  name="PHIL201" placeholder="PHIL 201 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 216</label>
                                        <input type="number" class="form-control"  name="PHIL216" placeholder="PHIL 216 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 223</label>
                                        <input type="number" class="form-control"  name="PHIL223" placeholder="PHIL 223 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 236</label>
                                        <input type="number" class="form-control"  name="PHIL236" placeholder="PHIL 236 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 243</label>
                                        <input type="number" class="form-control"  name="PHIL243" placeholder="PHIL 243 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 242</label>
                                        <input type="number" class="form-control"  name="PHIL242" placeholder="PHIL 242 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 245</label>
                                        <input type="number" class="form-control"  name="PHIL245" placeholder="PHIL 245 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 246</label>
                                        <input type="number" class="form-control"  name="PHIL246" placeholder="PHIL 246 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 265</label>
                                        <input type="number" class="form-control"  name="PHIL265" placeholder="PHIL 265 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 262</label>
                                        <input type="number" class="form-control"  name="PHIL262" placeholder="PHIL 262 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 271</label>
                                        <input type="number" class="form-control"  name="PHIL271" placeholder="PHIL 271 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 264</label>
                                        <input type="number" class="form-control"  name="PHIL264" placeholder="PHIL 264 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>GST 223</label>
                                        <input type="number" class="form-control"  name="GST223" placeholder="GST 223 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 268</label>
                                        <input type="number" class="form-control"  name="PHIL268" placeholder="PHIL 268 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>CMP 202</label>
                                        <input type="number" class="form-control"  name="CMP202" placeholder="CMP 202 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>GST 222</label>
                                        <input type="number" class="form-control"  name="GST222" placeholder="GST 222 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="form-row"><div class="col-md-4"></div>
                                        <button type="submit" class="col-md-4 justify-content-center btn btn-primary">Next <i
                                class="fas fa-arrow-right fa-sm text-white-50"></i> Year Three</button><div class="col-md-4"></div>
                                    </div>
                                        
                                    </form>
                                        
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Eliam Technologies 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>