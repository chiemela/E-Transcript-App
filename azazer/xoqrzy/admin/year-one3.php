<?php
// Initialize the session
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 400){
    header("location: ../../../auth.php");
    exit;
}

// Include config file
require_once "../../config.php";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // assign session variables
    assignVariablesToSession();

    // Store score data in session variables
    storeDataIntoSession();

    // handle first year first semster calculations
    calculatefirst1();

    // handle first year second semster calculations
    calculatefirst2();

    // create function and add all variables into session array
    addYearOneVariablesToSession();

    // Redirect user to enter YEAR ONE page
    header("location: year-two.php");
    
}

// assign session variables
function assignVariablesToSession(){
    // assign variables
    $PHIL101 = $_POST['PHIL101'];
    $PHIL104 = $_POST['PHIL104'];
    $PHIL107 = $_POST['PHIL107'];
    $PHIL116 = $_POST['PHIL116'];
    $PHIL135 = $_POST['PHIL135'];
    $PHIL146 = $_POST['PHIL146'];
    $REL141 = $_POST['REL141'];
    $PHIL162 = $_POST['PHIL162'];
    $FRN101 = $_POST['FRN101'];
    $PHIL172 = $_POST['PHIL172'];
    $GST101 = $_POST['GST101'];
    $FRN102 = $_POST['FRN102'];
    $GST103 = $_POST['GST103'];
    $GST102 = $_POST['GST102'];
    $GST105 = $_POST['GST105'];
    $GST104 = $_POST['GST104'];
    $GST106 = $_POST['GST106'];
    $GST108 = $_POST['GST108'];
}

// Store score data in session variables
function storeDataIntoSession(){
    // Store score data in session variables
    $_SESSION['PHIL101'] = $PHIL101;
    $_SESSION['PHIL104'] = $PHIL104;
    $_SESSION['PHIL107'] = $PHIL107;
    $_SESSION['PHIL116'] = $PHIL116;
    $_SESSION['PHIL135'] = $PHIL135;
    $_SESSION['PHIL146'] = $PHIL146;
    $_SESSION['REL141'] = $REL141;
    $_SESSION['PHIL162'] = $PHIL162;
    $_SESSION['FRN101'] = $FRN101;
    $_SESSION['PHIL172'] = $PHIL172;
    $_SESSION['GST101'] = $GST101;
    $_SESSION['FRN102'] = $FRN102;
    $_SESSION['GST103'] = $GST103;
    $_SESSION['GST102'] = $PHIL101;
    $_SESSION['GST105'] = $PHIL101;
    $_SESSION['GST104'] = $PHIL101;
    $_SESSION['GST106'] = $PHIL101;
    $_SESSION['GST108'] = $PHIL101;
}

// handle first year first semster calculations
function calculatefirst1(){

    // clear data in variable
    $_totalgp = 0;
    $_semstergpa = 0;

    //for the 1st course in first year 1st semester
    try{
        if ($PHIL101 >= 70)
        {
            $PHIL101grade = "A";
            $PHIL101gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL101 >= 60)
        {
            $PHIL101grade = "B";
            $PHIL101gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL101 >= 50)
        {
            $PHIL101grade = "C";
            $PHIL101gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL101 >= 45)
        {
            $PHIL101grade = "D"; 
            $PHIL101gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL101 >= 40)
        {
            $PHIL101grade = "E"; 
            $PHIL101gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL101 >= 0)
        {
            $PHIL101grade = "F"; 
            $PHIL101gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL101: " . $e->getMessage() . "</p>";
    }

    //for the 2nd course in first year 1st semester
    try{
        if ($PHIL107 >= 70)
        {
            $PHIL107grade = "A";
            $PHIL107gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL107 >= 60)
        {
            $PHIL107grade = "B";
            $PHIL107gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL107 >= 50)
        {
            $PHIL107grade = "C";
            $PHIL107gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL107 >= 45)
        {
            $PHIL107grade = "D";
            $PHIL107gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL107 >= 40)
        {
            $PHIL107grade = "E";
            $PHIL107gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL107 >= 0)
        {
            $PHIL107grade = "F";
            $PHIL107gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL107: " . $e->getMessage() . "</p>";
    }

    //for the 3rd course in first year 1st semester
    try{
        if ($PHIL135 >= 70)
        {
            $PHIL135grade = "A";
            $PHIL135gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL135 >= 60)
        {
            $PHIL135grade = "B";
            $PHIL135gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL135 >= 50)
        {
            $PHIL135grade = "C";
            $PHIL135gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL135 >= 45)
        {
            $PHIL135grade = "D";            
            $PHIL135gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL135 >= 40)
        {
            $PHIL135grade = "E";            
            $PHIL135gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL135 >= 0)
        {
            $PHIL135grade = "F";            
            $PHIL135gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL135: " . $e->getMessage() . "</p>";
    }

    //for the 4th course in first year 1st semester
    try{
        if ($REL141 >= 70)
        {
            $REL141grade = "A";            
            $REL141gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL141 >= 60)
        {
            $REL141grade = "B";            
            $REL141gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL141 >= 50)
        {
            $REL141grade = "C";            
            $REL141gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL141 >= 45)
        {
            $REL141grade = "D";            
            $REL141gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL141 >= 40)
        {
            $REL141grade = "E";            
            $REL141gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL141 >= 0)
        {
            $REL141grade = "F";            
            $REL141gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at REL141: " . $e->getMessage() . "</p>";
    }

    //for the 5th course in first year 1st semester
    try{
        if ($FRN101 >= 70)
        {
            $FRN101grade = "A";            
            $FRN101gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($FRN101 >= 60)
        {
            $FRN101grade = "B";            
            $FRN101gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($FRN101 >= 50)
        {
            $FRN101grade = "C";            
            $FRN101gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($FRN101 >= 45)
        {
            $FRN101grade = "D";            
            $FRN101gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($FRN101 >= 40)
        {
            $FRN101grade = "E";            
            $FRN101gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($FRN101 >= 0)
        {
            $FRN101grade = "F";            
            $FRN101gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at FRN101: " . $e->getMessage() . "</p>";
    }

    //for the 6th course in first year 1st semester
    try{
        if ($GST101 >= 70)
        {
            $GST101grade = "A";            
            $GST101gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST101 >= 60)
        {
            $GST101grade = "B";            
            $GST101gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST101 >= 50)
        {
            $GST101grade = "C";            
            $GST101gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST101 >= 45)
        {
            $GST101grade = "D";            
            $GST101gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST101 >= 40)
        {
            $GST101grade = "E";            
            $GST101gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST101 >= 0)
        {
            $GST101grade = "F";            
            $GST101gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST101: " . $e->getMessage() . "</p>";
    }

    //for the 7th course in first year 1st semester
    try{
        if ($GST103 >= 70)
        {
            $GST103grade = "A";            
            $GST103gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST103 >= 60)
        {
            $GST103grade = "B";            
            $GST103gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST103 >= 50)
        {
            $GST103grade = "C";            
            $GST103gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST103 >= 45)
        {
            $GST103grade = "D";            
            $GST103gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST103 >= 40)
        {
            $GST103grade = "E";            
            $GST103gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST103 >= 0)
        {
            $GST103grade = "F";            
            $GST103gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST103: " . $e->getMessage() . "</p>";
    }

    //for the 8th course in first year 1st semester
    try{
        if ($GST105 >= 70)
        {
            $GST105grade = "A";            
            $GST105gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST105 >= 60)
        {
            $GST105grade = "B";            
            $GST105gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST105 >= 50)
        {
            $GST105grade = "C";            
            $GST105gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST105 >= 45)
        {
            $GST105grade = "D";            
            $GST105gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST105 >= 40)
        {
            $GST105grade = "E";            
            $GST105gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GST105 >= 0)
        {
            $GST105grade = "F";            
            $GST105gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST105: " . $e->getMessage() . "</p>";
    }
    $_finaltotalgp11 = $_totalgp;
    $_semstergpa = $_totalgp / 19;
    $SEMESTER_GPA_FIRST_YEAR_SEMSTER_1 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_FIRST_YEAR_SEMSTER_1 = $_totalgp;
    $TOTAL_CU_FIRST_YEAR_SEMSTER_1 = "19";
    $_finaltotalcu1 = 0;
    $_finaltotalcu1 = $_finaltotalcu1 + 19;
}


// handle first year second semster calculations
function calculatefirst2(){

    // clear data in variable
    $_totalgp = 0;
    $_semstergpa = 0;

    
    //for the 1st course in first year 2nd semester
    try{
        if ($PHIL104 >= 70)
        {
            $PHIL104grade = "A";            
            $PHIL104gp = $_gp = 2 * 5;
            $_totalgp1 = $_totalgp1 + $_gp;
        }
        elseif ($PHIL104 >= 60)
        {
            $PHIL104grade = "B";            
            $PHIL104gp = $_gp = 2 * 4;
            $_totalgp1 = $_totalgp1 + $_gp;
        }
        elseif ($PHIL104 >= 50)
        {
            $PHIL104grade = "C";            
            $PHIL104gp = $_gp = 2 * 3;
            $_totalgp1 = $_totalgp1 + $_gp;
        }
        elseif ($PHIL104 >= 45)
        {
            $PHIL104grade = "D";            
            $PHIL104gp = $_gp = 2 * 2;
            $_totalgp1 = $_totalgp1 + $_gp;
        }
        elseif ($PHIL104 >= 40)
        {
            $PHIL104grade = "E";            
            $PHIL104gp = $_gp = 2 * 1;
            $_totalgp1 = $_totalgp1 + $_gp;
        }
        elseif ($PHIL104 <= 39)
        {
            $PHIL104grade = "F";            
            $PHIL104gp = $_gp = 2 * 0;
            $_totalgp1 = $_totalgp1 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL104: " . $e->getMessage() . "</p>";
    }

    //for the 2nd course in first year 2nd semester
    try{
        if ($PHIL116 >= 70)
        {
            $PHIL116grade = "A";            
            $PHIL116gp = $_gp = 3 * 5;
            $_totalgp2 = $_totalgp2 + $_gp;
        }
        elseif ($PHIL116 >= 60)
        {
            $PHIL116grade = "B";            
            $PHIL116gp = $_gp = 3 * 4;
            $_totalgp2 = $_totalgp2 + $_gp;
        }
        elseif ($PHIL116 >= 50)
        {
            $PHIL116grade = "C";            
            $PHIL116gp = $_gp = 3 * 3;
            $_totalgp2 = $_totalgp2 + $_gp;
        }
        elseif ($PHIL116 >= 45)
        {
            $PHIL116grade = "D";            
            $PHIL116gp = $_gp = 3 * 2;
            $_totalgp2 = $_totalgp2 + $_gp;
        }
        elseif ($PHIL116 >= 40)
        {
            $PHIL116grade = "E";            
            $PHIL116gp = $_gp = 3 * 1;
            $_totalgp2 = $_totalgp2 + $_gp;
        }
        elseif ($PHIL116 <= 39)
        {
            $PHIL116grade = "F";            
            $PHIL116gp = $_gp = 3 * 0;
            $_totalgp2 = $_totalgp2 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL116: " . $e->getMessage() . "</p>";
    }

    //for the 3rd course in first year 2nd semester
    try{
        if ($PHIL146 >= 70)
        {
            $PHIL146grade = "A";            
            $PHIL146gp = $_gp = 3 * 5;
            $_totalgp3 = $_totalgp3 + $_gp;
        }
        elseif ($PHIL146 >= 60)
        {
            $PHIL146grade = "B";            
            $PHIL146gp = $_gp = 3 * 4;
            $_totalgp3 = $_totalgp3 + $_gp;
        }
        elseif ($PHIL146 >= 50)
        {
            $PHIL146grade = "C";            
            $PHIL146gp = $_gp = 3 * 3;
            $_totalgp3 = $_totalgp3 + $_gp;
        }
        elseif ($PHIL146 >= 45)
        {
            $PHIL146grade = "D";            
            $PHIL146gp = $_gp = 3 * 2;
            $_totalgp3 = $_totalgp3 + $_gp;
        }
        elseif ($PHIL146 >= 40)
        {
            $PHIL146grade = "E";            
            $PHIL146gp = $_gp = 3 * 1;
            $_totalgp3 = $_totalgp3 + $_gp;
        }
        elseif ($PHIL146 <= 39)
        {
            $PHIL146grade = "F";            
            $PHIL146gp = $_gp = 3 * 0;
            $_totalgp3 = $_totalgp3 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL146: " . $e->getMessage() . "</p>";
    }

    //for the 4th course in first year 2nd semester
    try{
        if ($PHIL162 >= 70)
        {
            $PHIL162grade = "A";            
            $PHIL162gp = $_gp = 2 * 5;
            $_totalgp4 = $_totalgp4 + $_gp;
        }
        elseif ($PHIL162 >= 60)
        {
            $PHIL162grade = "B";            
            $PHIL162gp = $_gp = 2 * 4;
            $_totalgp4 = $_totalgp4 + $_gp;
        }
        elseif ($PHIL162 >= 50)
        {
            $PHIL162grade = "C";            
            $PHIL162gp = $_gp = 2 * 3;
            $_totalgp4 = $_totalgp4 + $_gp;
        }
        elseif ($PHIL162 >= 45)
        {
            $PHIL162grade = "D";            
            $PHIL162gp = $_gp = 2 * 2;
            $_totalgp4 = $_totalgp4 + $_gp;
        }
        elseif ($PHIL162 >= 40)
        {
            $PHIL162grade = "E";            
            $PHIL162gp = $_gp = 2 * 1;
            $_totalgp4 = $_totalgp4 + $_gp;
        }
        elseif ($PHIL162 <= 39)
        {
            $PHIL162grade = "F";
            $PHIL162gp = $_gp = 2 * 0;
            $_totalgp4 = $_totalgp4 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL162: " . $e->getMessage() . "</p>";
    }

    //for the 5th course in first year 2nd semester
    try{
        if ($PHIL172 >= 70)
        {
            $PHIL172grade = "A";            
            $PHIL172gp = $_gp = 3 * 5;
            $_totalgp5 = $_totalgp5 + $_gp;
        }
        elseif ($PHIL172 >= 60)
        {
            $PHIL172grade = "B";            
            $PHIL172gp = $_gp = 3 * 4;
            $_totalgp5 = $_totalgp5 + $_gp;
        }
        elseif ($PHIL172 >= 50)
        {
            $PHIL172grade = "C";            
            $PHIL172gp = $_gp = 3 * 3;
            $_totalgp5 = $_totalgp5 + $_gp;
        }
        elseif ($PHIL172 >= 45)
        {
            $PHIL172grade = "D";            
            $PHIL172gp = $_gp = 3 * 2;
            $_totalgp5 = $_totalgp5 + $_gp;
        }
        elseif ($PHIL172 >= 40)
        {
            $PHIL172grade = "E";            
            $PHIL172gp = $_gp = 3 * 1;
            $_totalgp5 = $_totalgp5 + $_gp;
        }
        elseif ($PHIL172 <= 39)
        {
            $PHIL172grade = "F";            
            $PHIL172gp = $_gp = 3 * 0;
            $_totalgp5 = $_totalgp5 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL172: " . $e->getMessage() . "</p>";
    }

    //for the 6th course in first year 2nd semester
    try{
        if ($FRN102 >= 70)
        {
            $FRN102grade = "A";            
            $FRN102gp = $_gp = 2 * 5;
            $_totalgp6 = $_totalgp6 + $_gp;
        }
        elseif ($FRN102 >= 60)
        {
            $FRN102grade = "B";            
            $FRN102gp = $_gp = 2 * 4;
            $_totalgp6 = $_totalgp6 + $_gp;
        }
        elseif ($FRN102 >= 50)
        {
            $FRN102grade = "C";            
            $FRN102gp = $_gp = 2 * 3;
            $_totalgp6 = $_totalgp6 + $_gp;
        }
        elseif ($FRN102 >= 45)
        {
            $FRN102grade = "D";            
            $FRN102gp = $_gp = 2 * 2;
            $_totalgp6 = $_totalgp6 + $_gp;
        }
        elseif ($FRN102 >= 40)
        {
            $FRN102grade = "E";            
            $FRN102gp = $_gp = 2 * 1;
            $_totalgp6 = $_totalgp6 + $_gp;
        }
        elseif ($FRN102 <= 39)
        {
            $FRN102grade = "F";            
            $FRN102gp = $_gp = 2 * 0;
            $_totalgp6 = $_totalgp6 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at FRN102: " . $e->getMessage() . "</p>";
    }

    //for the 7th course in first year 2nd semester
    try{
        if ($GST102 >= 70)
        {
            $GST102grade = "A";            
            $GST102gp = $_gp = 2 * 5;
            $_totalgp7 = $_totalgp7 + $_gp;
        }
        elseif ($GST102 >= 60)
        {
            $GST102grade = "B";            
            $GST102gp = $_gp = 2 * 4;
            $_totalgp7 = $_totalgp7 + $_gp;
        }
        elseif ($GST102 >= 50)
        {
            $GST102grade = "C";            
            $GST102gp = $_gp = 2 * 3;
            $_totalgp7 = $_totalgp7 + $_gp;
        }
        elseif ($GST102 >= 45)
        {
            $GST102grade = "D";            
            $GST102gp = $_gp = 2 * 2;
            $_totalgp7 = $_totalgp7 + $_gp;
        }
        elseif ($GST102 >= 40)
        {
            $GST102grade = "E";            
            $GST102gp = $_gp = 2 * 1;
            $_totalgp7 = $_totalgp7 + $_gp;
        }
        elseif ($GST102 >= 0)
        {
            $GST102grade = "F";            
            $GST102gp = $_gp = 2 * 0;
            $_totalgp7 = $_totalgp7 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST102: " . $e->getMessage() . "</p>";
    }

    //for the 7th course in first year 2nd semester
    try{
        if ($GST104 >= 70)
        {
            $GST104grade = "A";            
            $GST104gp = $_gp = 2 * 5;
            $_totalgp8 = $_totalgp8 + $_gp;
        }
        elseif ($GST104 >= 60)
        {
            $GST104grade = "B";            
            $GST104gp = $_gp = 2 * 4;
            $_totalgp8 = $_totalgp8 + $_gp;
        }
        elseif ($GST104 >= 50)
        {
            $GST104grade = "C";            
            $GST104gp = $_gp = 2 * 3;
            $_totalgp8 = $_totalgp8 + $_gp;
        }
        elseif ($GST104 >= 45)
        {
            $GST104grade = "D";            
            $GST104gp = $_gp = 2 * 2;
            $_totalgp8 = $_totalgp8 + $_gp;
        }
        elseif ($GST104 >= 40)
        {
            $GST104grade = "E";            
            $GST104gp = $_gp = 2 * 1;
            $_totalgp8 = $_totalgp8 + $_gp;
        }
        elseif ($GST104 <= 39)
        {
            $GST104grade = "F";            
            $GST104gp = $_gp = 2 * 0;
            $_totalgp8 = $_totalgp8 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST104: " . $e->getMessage() . "</p>";
    }

    //for the 8th course in first year 2nd semester
    try{
        if ($GST106 >= 70)
        {
            $GST106grade = "A";            
            $GST106gp = $_gp = 2 * 5;
            $_totalgp9 = $_totalgp9 + $_gp;
        }
        elseif ($GST106 >= 60)
        {
            $GST106grade = "B";            
            $GST106gp = $_gp = 2 * 4;
            $_totalgp9 = $_totalgp9 + $_gp;
        }
        elseif ($GST106 >= 50)
        {
            $GST106grade = "C";            
            $GST106gp = $_gp = 2 * 3;
            $_totalgp9 = $_totalgp9 + $_gp;
        }
        elseif ($GST106 >= 45)
        {
            $GST106grade = "D";            
            $GST106gp = $_gp = 2 * 2;
            $_totalgp9 = $_totalgp9 + $_gp;
        }
        elseif ($GST106 >= 40)
        {
            $GST106grade = "E";            
            $GST106gp = $_gp = 2 * 1;
            $_totalgp9 = $_totalgp9 + $_gp;
        }
        elseif ($GST106 <= 39)
        {
            $GST106grade = "F";            
            $GST106gp = $_gp = 2 * 0;
            $_totalgp9 = $_totalgp9 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST106: " . $e->getMessage() . "</p>";
    }

    //for the 9th course in first year 2nd semester
    try{
        if ($GST108 >= 70)
        {
            $GST108grade = "A";            
            $GST108gp = $_gp = 2 * 5;
            $_totalgp10 = $_totalgp10 + $_gp;
        }
        elseif ($GST108 >= 60)
        {
            $GST108grade = "B";            
            $GST108gp = $_gp = 2 * 4;
            $_totalgp10 = $_totalgp10 + $_gp;
        }
        elseif ($GST108 >= 50)
        {
            $GST108grade = "C";            
            $GST108gp = $_gp = 2 * 3;
            $_totalgp10 = $_totalgp10 + $_gp;
        }
        elseif ($GST108 >= 45)
        {
            $GST108grade = "D";            
            $GST108gp = $_gp = 2 * 2;
            $_totalgp10 = $_totalgp10 + $_gp;
        }
        elseif ($GST108 >= 40)
        {
            $GST108grade = "E";            
            $GST108gp = $_gp = 2 * 1;
            $_totalgp10 = $_totalgp10 + $_gp;
        }
        elseif ($GST108 <= 39)
        {
            $GST108grade = "F";            
            $GST108gp = $_gp = 2 * 0;
            $_totalgp10 = $_totalgp10 + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GST108: " . $e->getMessage() . "</p>";
    }
    $_totalgp = $_totalgp1 + $_totalgp2 + $_totalgp3 + $_totalgp4 + $_totalgp5 + $_totalgp6 + $_totalgp7 + $_totalgp8 + $_totalgp9 + $_totalgp10;
    $_finaltotalgp12 = $_totalgp;
    $_semstergpa = $_totalgp / 23;
    $SEMESTER_GPA_FIRST_YEAR_SEMSTER_2 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_FIRST_YEAR_SEMSTER_2 = $_totalgp;
    $TOTAL_CU_FIRST_YEAR_SEMSTER_2 = "23";
    $_finaltotalcu1 = $_finaltotalcu1 + 23;

}

// create function and add all variables into session array
function addYearOneVariablesToSession(){
    $_SESSION['PHIL101grade'] = $PHIL101grade;
    $_SESSION['PHIL107grade'] = $PHIL107grade;
    $_SESSION['PHIL135grade'] = $PHIL135grade;
    $_SESSION['REL141grade'] = $REL141grade;
    $_SESSION['FRN101grade'] = $FRN101grade;
    $_SESSION['GST101grade'] = $GST101grade;
    $_SESSION['GST103grade'] = $GST103grade;
    $_SESSION['GST105grade'] = $GST105grade;
    $_SESSION['PHIL104grade'] = $PHIL104grade;
    $_SESSION['PHIL116grade'] = $PHIL116grade;
    $_SESSION['PHIL146grade'] = $PHIL146grade;
    $_SESSION['PHIL162grade'] = $PHIL162grade;
    $_SESSION['PHIL172grade'] = $PHIL172grade;
    $_SESSION['FRN102grade'] = $FRN102grade;
    $_SESSION['GST102grade'] = $GST102grade;
    $_SESSION['GST104grade'] = $GST104grade;
    $_SESSION['GST106grade'] = $GST106grade;
    $_SESSION['GST108grade'] = $GST108grade;

    $_SESSION['PHIL101gp'] = $PHIL101gp;
    $_SESSION['PHIL107gp'] = $PHIL107gp;
    $_SESSION['PHIL135gp'] = $PHIL135gp;
    $_SESSION['REL141gp'] = $REL141gp;
    $_SESSION['FRN101gp'] = $FRN101gp;
    $_SESSION['GST101gp'] = $GST101gp;
    $_SESSION['GST103gp'] = $GST103gp;
    $_SESSION['GST105gp'] = $GST105gp;
    $_SESSION['PHIL104gp'] = $PHIL104gp;
    $_SESSION['PHIL116gp'] = $PHIL116gp;
    $_SESSION['PHIL146gp'] = $PHIL146gp;
    $_SESSION['PHIL162gp'] = $PHIL162gp;
    $_SESSION['PHIL172gp'] = $PHIL172gp;
    $_SESSION['FRN102gp'] = $FRN102gp;
    $_SESSION['GST102gp'] = $GST102gp;
    $_SESSION['GST104gp'] = $GST104gp;
    $_SESSION['GST106gp'] = $GST106gp;
    $_SESSION['GST108gp'] = $GST108gp;

    // global variable for the Grand TOTAL CU
    $_SESSION['_finaltotalcu1'] = $_finaltotalcu1;

    // total sumation for GPA, GP, CU for first year first semester
    $_SESSION['_finaltotalgp11'] = $_finaltotalgp11;
    $_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_1'] = $SEMESTER_GPA_FIRST_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_GP_FIRST_YEAR_SEMSTER_1'] = $TOTAL_GP_FIRST_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_CU_FIRST_YEAR_SEMSTER_1'] = $TOTAL_CU_FIRST_YEAR_SEMSTER_1;

    // total sumation for GPA, GP, CU for first year second semester
    $_SESSION['_finaltotalgp12'] = $_finaltotalgp12;
    $_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_2'] = $SEMESTER_GPA_FIRST_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_GP_FIRST_YEAR_SEMSTER_2'] = $TOTAL_GP_FIRST_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_CU_FIRST_YEAR_SEMSTER_2'] = $TOTAL_CU_FIRST_YEAR_SEMSTER_2;

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
                <a class="nav-link" href="tables.php">
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
                </br><strong class="mb-8">20 Nov. 2021</strong></p>
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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

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
                                            <h7 >You are here:</h7>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="home.php">Student Credentials</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="yearone.php">Year One</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >YEAR: <?php echo $_SESSION["admissionYear1"];?></label>
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
                                        <label>PHIL 101</label>
                                        <input type="number" class="form-control"  name="PHIL101" placeholder="PHIL 101 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 104</label>
                                        <input type="number" class="form-control"  name="PHIL104" placeholder="PHIL 104 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 107</label>
                                        <input type="number" class="form-control"  name="PHIL107" placeholder="PHIL 107 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 116</label>
                                        <input type="number" class="form-control"  name="PHIL116" placeholder="PHIL 116 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 135</label>
                                        <input type="number" class="form-control"  name="PHIL135" placeholder="PHIL 135 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 146</label>
                                        <input type="number" class="form-control"  name="PHIL146" placeholder="PHIL 146 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>REL 141</label>
                                        <input type="number" class="form-control"  name="REL141" placeholder="REL 141 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 162</label>
                                        <input type="number" class="form-control"  name="PHIL162" placeholder="PHIL 162 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>FRN 101</label>
                                        <input type="number" class="form-control"  name="FRN101" placeholder="FRN 101 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 172</label>
                                        <input type="number" class="form-control"  name="PHIL172" placeholder="PHIL 172 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>GST 101</label>
                                        <input type="number" class="form-control"  name="GST101" placeholder="GST 101 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>FRN 102</label>
                                        <input type="number" class="form-control"  name="FRN102" placeholder="FRN 102 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>GST 103</label>
                                        <input type="number" class="form-control"  name="GST103" placeholder="GST 103 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>GST 102</label>
                                        <input type="number" class="form-control"  name="GST102" placeholder="GST 102 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>GST 105</label>
                                        <input type="number" class="form-control"  name="GST105" placeholder="GST 105 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>GST 104</label>
                                        <input type="number" class="form-control"  name="GST104" placeholder="GST 104 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>GST 106</label>
                                        <input type="number" class="form-control"  name="GST106" placeholder="GST 106 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>GST 108</label>
                                        <input type="number" class="form-control"  name="GST108" placeholder="GST 108 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="form-row"><div class="col-md-4"></div>
                                        <button type="submit" class="col-md-4 justify-content-center btn btn-primary">Next <i
                                class="fas fa-arrow-right fa-sm text-white-50"></i> Year Two</button><div class="col-md-4"></div>
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
                        <span>Copyright &copy; Eliam Technologies 2020</span>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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