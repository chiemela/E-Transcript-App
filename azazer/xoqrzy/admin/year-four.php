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
    $PHIL411 = trim($_POST["PHIL411"]);
    $PHIL410 = trim($_POST["PHIL410"]);
    $PHIL431 = trim($_POST["PHIL431"]);
    $PHIL432 = trim($_POST["PHIL432"]);
    $PHIL443 = trim($_POST["PHIL443"]);
    $PHIL446 = trim($_POST["PHIL446"]);
    $PHIL441 = trim($_POST["PHIL441"]);
    $PHIL462 = trim($_POST["PHIL462"]);
    $PHIL445 = trim($_POST["PHIL445"]);
    $PHIL464 = trim($_POST["PHIL464"]);
    $PHIL447 = trim($_POST["PHIL447"]);
    $PHIL468 = trim($_POST["PHIL468"]);
    $PHIL467 = trim($_POST["PHIL467"]);
    $PHIL457 = trim($_POST["PHIL457"]);

    // Store score data in session variables
    $_SESSION["PHIL411"] = $PHIL411;
    $_SESSION["PHIL410"] = $PHIL410;
    $_SESSION["PHIL431"] = $PHIL431;
    $_SESSION["PHIL432"] = $PHIL432;
    $_SESSION["PHIL443"] = $PHIL443;
    $_SESSION["PHIL446"] = $PHIL446;
    $_SESSION["PHIL441"] = $PHIL441;
    $_SESSION["PHIL462"] = $PHIL462;
    $_SESSION["PHIL445"] = $PHIL445;
    $_SESSION["PHIL464"] = $PHIL464;
    $_SESSION["PHIL447"] = $PHIL447;
    $_SESSION["PHIL468"] = $PHIL468;
    $_SESSION["PHIL467"] = $PHIL467;
    $_SESSION["PHIL457"] = $PHIL457;

    // handle first year first semster calculations
    // for the 1st course in fourth year 1st semester
    try{
        // clear data in variables
        $_totalgp = 0;
        $_semstergpa = 0;
        
        if ($PHIL411 >= 70)
        {
            $PHIL411grade = "A"; 
            $PHIL411gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL411 >= 60)
        {
            $PHIL411grade = "B"; 
            $PHIL411gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL411 >= 50)
        {
            $PHIL411grade = "C"; 
            $PHIL411gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL411 >= 45)
        {
            $PHIL411grade = "D"; 
            $PHIL411gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL411 >= 40)
        {
            $PHIL411grade = "E"; 
            $PHIL411gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL411 <= 39)
        {
            $PHIL411grade = "F"; 
            $PHIL411gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL411: " . $e->getMessage() . "</p>";
    }

    // for the 2nd course in fourth year 1st semester
    try{
        if ($PHIL431 >= 70)
        {
            $PHIL431grade = "A"; 
            $PHIL431gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL431 >= 60)
        {
            $PHIL431grade = "B"; 
            $PHIL431gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL431 >= 50)
        {
            $PHIL431grade = "C"; 
            $PHIL431gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL431 >= 45)
        {
            $PHIL431grade = "D"; 
            $PHIL431gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL431 >= 40)
        {
            $PHIL431grade = "E"; 
            $PHIL431gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL431 <= 39)
        {
            $PHIL431grade = "F"; 
            $PHIL431gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL431: " . $e->getMessage() . "</p>";
    }

    // for the 3rd course in fourth year 1st semester
    try{
        if ($PHIL443 >= 70)
        {
            $PHIL443grade = "A"; 
            $PHIL443gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL443 >= 60)
        {
            $PHIL443grade = "B"; 
            $PHIL443gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL443 >= 50)
        {
            $PHIL443grade = "C"; 
            $PHIL443gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL443 >= 45)
        {
            $PHIL443grade = "D"; 
            $PHIL443gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL443 >= 40)
        {
            $PHIL443grade = "E"; 
            $PHIL443gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL443 <= 39)
        {
            $PHIL443grade = "F"; 
            $PHIL443gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL443: " . $e->getMessage() . "</p>";
    }

    // for the 4th course in fourth year 1st semester
    try{
        if ($PHIL441 >= 70)
        {
            $PHIL441grade = "A"; 
            $PHIL441gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL441 >= 60)
        {
            $PHIL441grade = "B"; 
            $PHIL441gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL441 >= 50)
        {
            $PHIL441grade = "C"; 
            $PHIL441gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL441 >= 45)
        {
            $PHIL441grade = "D"; 
            $PHIL441gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL441 >= 40)
        {
            $PHIL441grade = "E"; 
            $PHIL441gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL441 <= 39)
        {
            $PHIL441grade = "F"; 
            $PHIL441gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL441: " . $e->getMessage() . "</p>";
    }

    // for the 5th course in fourth year 1st semester
    try{
        if ($PHIL445 >= 70)
        {
            $PHIL445grade = "A"; 
            $PHIL445gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL445 >= 60)
        {
            $PHIL445grade = "B"; 
            $PHIL445gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL445 >= 50)
        {
            $PHIL445grade = "C"; 
            $PHIL445gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL445 >= 45)
        {
            $PHIL445grade = "D"; 
            $PHIL445gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL445 >= 40)
        {
            $PHIL445grade = "E"; 
            $PHIL445gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL445 <= 39)
        {
            $PHIL445grade = "F"; 
            $PHIL445gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL445: " . $e->getMessage() . "</p>";
    }

    // for the 6th course in fourth year 1st semester
    try{
        if ($PHIL447 >= 70)
        {
            $PHIL447grade = "A"; 
            $PHIL447gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL447 >= 60)
        {
            $PHIL447grade = "B"; 
            $PHIL447gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL447 >= 50)
        {
            $PHIL447grade = "C"; 
            $PHIL447gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL447 >= 45)
        {
            $PHIL447grade = "D"; 
            $PHIL447gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL447 >= 40)
        {
            $PHIL447grade = "E"; 
            $PHIL447gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL447 <= 39)
        {
            $PHIL447grade = "F"; 
            $PHIL447gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL447: " . $e->getMessage() . "</p>";
    }

    // for the 7th course in fourth year 1st semester
    try{
        if ($PHIL467 >= 70)
        {
            $PHIL467grade = "A"; 
            $PHIL467gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL467 >= 60)
        {
            $PHIL467grade = "B"; 
            $PHIL467gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL467 >= 50)
        {
            $PHIL467grade = "C"; 
            $PHIL467gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL467 >= 45)
        {
            $PHIL467grade = "D"; 
            $PHIL467gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL467 >= 40)
        {
            $PHIL467grade = "E"; 
            $PHIL467gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL467 <= 39)
        {
            $PHIL467grade = "F"; 
            $PHIL467gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL467: " . $e->getMessage() . "</p>";
    }

    // for the 8th course in fourth year 1st semester
    try{
        if ($PHIL457 >= 70)
        {
            $PHIL457grade = "A"; 
            $PHIL457gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL457 >= 60)
        {
            $PHIL457grade = "B"; 
            $PHIL457gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL457 >= 50)
        {
            $PHIL457grade = "C"; 
            $PHIL457gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL457 >= 45)
        {
            $PHIL457grade = "D"; 
            $PHIL457gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL457 >= 40)
        {
            $PHIL457grade = "E"; 
            $PHIL457gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL457 <= 39)
        {
            $PHIL457grade = "F"; 
            $PHIL457gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL457: " . $e->getMessage() . "</p>";
    }

    $_finaltotalgp41 = $_totalgp;
    $_semstergpa = $_totalgp / 21;
    $SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_FOURTH_YEAR_SEMSTER_1 = $_totalgp;
    $TOTAL_CU_FOURTH_YEAR_SEMSTER_1 = "21";
    $_finaltotalcu4 = 0;
    $_finaltotalcu4 = $_finaltotalcu4 + 21;




    // handle first year second semster calculations
    // for the 1st course in fourth year 2nd semester
    try{
        // clear data in variables
        $_totalgp = 0;
        $_semstergpa = 0;
        
        if ($PHIL410 >= 70)
        {
            $PHIL410grade = "A"; 
            $PHIL410gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL410 >= 60)
        {
            $PHIL410grade = "B"; 
            $PHIL410gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL410 >= 50)
        {
            $PHIL410grade = "C"; 
            
            $PHIL410gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL410 >= 45)
        {
            $PHIL410grade = "D"; 
            $PHIL410gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL410 >= 40)
        {
            $PHIL410grade = "E"; 
            $PHIL410gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL410 <= 39)
        {
            $PHIL410grade = "F"; 
            $PHIL410gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL410: " . $e->getMessage() . "</p>";
    }

    // for the 2nd course in fourth year 2nd semester
    try{
        if ($PHIL432 >= 70)
        {
            $PHIL432grade = "A"; 
            $PHIL432gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL432 >= 60)
        {
            $PHIL432grade = "B"; 
            $PHIL432gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL432 >= 50)
        {
            $PHIL432grade = "C"; 
            $PHIL432gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL432 >= 45)
        {
            $PHIL432grade = "D"; 
            $PHIL432gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL432 >= 40)
        {
            $PHIL432grade = "E"; 
            $PHIL432gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL432 <= 39)
        {
            $PHIL432grade = "F"; 
            $PHIL432gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL432: " . $e->getMessage() . "</p>";
    }

    // for the 3rd course in fourth year 2nd semester
    try{
        if ($PHIL446 >= 70)
        {
            $PHIL446grade = "A"; 
            $PHIL446gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL446 >= 60)
        {
            $PHIL446grade = "B"; 
            $PHIL446gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL446 >= 50)
        {
            $PHIL446grade = "C"; 
            $PHIL446gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL446 >= 45)
        {
            $PHIL446grade = "D"; 
            $PHIL446gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL446 >= 40)
        {
            $PHIL446grade = "E"; 
            $PHIL446gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL446 <= 39)
        {
            $PHIL446grade = "F"; 
            $PHIL446gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL446: " . $e->getMessage() . "</p>";
    }

    // for the 4th course in fourth year 2nd semester
    try{
        if ($PHIL462 >= 70)
        {
            $PHIL462grade = "A"; 
            $PHIL462gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL462 >= 60)
        {
            $PHIL462grade = "B"; 
            $PHIL462gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL462 >= 50)
        {
            $PHIL462grade = "C"; 
            $PHIL462gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL462 >= 45)
        {
            $PHIL462grade = "D"; 
            $PHIL462gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL462 >= 40)
        {
            $PHIL462grade = "E"; 
            $PHIL462gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL462 <= 39)
        {
            $PHIL462grade = "F"; 
            $PHIL462gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL462: " . $e->getMessage() . "</p>";
    }

    // for the 5th course in fourth year 2nd semester
    try{
        if ($PHIL464 >= 70)
        {
            $PHIL464grade = "A"; 
            $PHIL464gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL464 >= 60)
        {
            $PHIL464grade = "B"; 
            $PHIL464gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL464 >= 50)
        {
            $PHIL464grade = "C"; 
            $PHIL464gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL464 >= 45)
        {
            $PHIL464grade = "D"; 
            $PHIL464gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL464 >= 40)
        {
            $PHIL464grade = "E"; 
            $PHIL464gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL464 <= 39)
        {
            $PHIL464grade = "F"; 
            $PHIL464gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL464: " . $e->getMessage() . "</p>";
    }

    // for the 6th course in fourth year 2nd semester
    try{
        if ($PHIL468 >= 70)
        {
            $PHIL468grade = "A"; 
            $PHIL468gp = $_gp = 6 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL468 >= 60)
        {
            $PHIL468grade = "B"; 
            $PHIL468gp = $_gp = 6 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL468 >= 50)
        {
            $PHIL468grade = "C"; 
            $PHIL468gp = $_gp = 6 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL468 >= 45)
        {
            $PHIL468grade = "D"; 
            $PHIL468gp = $_gp = 6 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL468 >= 40)
        {
            $PHIL468grade = "E"; 
            $PHIL468gp = $_gp = 6 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL468 <= 39)
        {
            $PHIL468grade = "F"; 
            $PHIL468gp = $_gp = 6 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL468: " . $e->getMessage() . "</p>";
    }
    
    $_finaltotalgp42 = $_totalgp;
    $_semstergpa = $_totalgp / 18;
    $SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_FOURTH_YEAR_SEMSTER_2 = $_totalgp;
    $TOTAL_CU_FOURTH_YEAR_SEMSTER_2 = "18";
    $_finaltotalcu = $_finaltotalcu + 18;

    // create function and add all variables into session array
    // Store Grade data in session variables
    $_SESSION["PHIL411grade"] = $PHIL411grade;
    $_SESSION["PHIL410grade"] = $PHIL410grade;
    $_SESSION["PHIL431grade"] = $PHIL431grade;
    $_SESSION["PHIL432grade"] = $PHIL432grade;
    $_SESSION["PHIL443grade"] = $PHIL443grade;
    $_SESSION["PHIL446grade"] = $PHIL446grade;
    $_SESSION["PHIL441grade"] = $PHIL441grade;
    $_SESSION["PHIL462grade"] = $PHIL462grade;
    $_SESSION["PHIL445grade"] = $PHIL445grade;
    $_SESSION["PHIL464grade"] = $PHIL464grade;
    $_SESSION["PHIL447grade"] = $PHIL447grade;
    $_SESSION["PHIL468grade"] = $PHIL468grade;
    $_SESSION["PHIL467grade"] = $PHIL467grade;
    $_SESSION["PHIL457grade"] = $PHIL457grade;

    // Store GP data in session variables
    $_SESSION["PHIL411gp"] = $PHIL411gp;
    $_SESSION["PHIL410gp"] = $PHIL410gp;
    $_SESSION["PHIL431gp"] = $PHIL431gp;
    $_SESSION["PHIL432gp"] = $PHIL432gp;
    $_SESSION["PHIL443gp"] = $PHIL443gp;
    $_SESSION["PHIL446gp"] = $PHIL446gp;
    $_SESSION["PHIL441gp"] = $PHIL441gp;
    $_SESSION["PHIL462gp"] = $PHIL462gp;
    $_SESSION["PHIL445gp"] = $PHIL445gp;
    $_SESSION["PHIL464gp"] = $PHIL464gp;
    $_SESSION["PHIL447gp"] = $PHIL447gp;
    $_SESSION["PHIL468gp"] = $PHIL468gp;
    $_SESSION["PHIL467gp"] = $PHIL467gp;
    $_SESSION["PHIL457gp"] = $PHIL457gp;

    // global variable for the Grand TOTAL CU
    $_SESSION['_finaltotalcu4'] = $_finaltotalcu4;

    // total sumation for GPA, GP, CU for second year first semester
    $_SESSION['_finaltotalgp41'] = $_finaltotalgp41;
    $_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1'] = $SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_GP_FOURTH_YEAR_SEMSTER_1'] = $TOTAL_GP_FOURTH_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_CU_FOURTH_YEAR_SEMSTER_1'] = $TOTAL_CU_FOURTH_YEAR_SEMSTER_1;

    // total sumation for GPA, GP, CU for second year second semester
    $_SESSION['_finaltotalgp42'] = $_finaltotalgp42;
    $_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2'] = $SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_GP_FOURTH_YEAR_SEMSTER_2'] = $TOTAL_GP_FOURTH_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_CU_FOURTH_YEAR_SEMSTER_2'] = $TOTAL_CU_FOURTH_YEAR_SEMSTER_2;


    // Redirect user to enter YEAR ONE page
    header("location: year-summary.php");
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
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="year-one.php">Year One</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="year-two.php">Year Two</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="year-three.php">Year Three</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="year-four.php">Year Four</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >YEAR: <?php echo $_SESSION["admissionYear4"];?></label>
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
                                        <label>PHIL 411</label>
                                        <input type="number" class="form-control"  name="PHIL411" placeholder="PHIL 411 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 410</label>
                                        <input type="number" class="form-control"  name="PHIL410" placeholder="PHIL 410 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 431</label>
                                        <input type="number" class="form-control"  name="PHIL431" placeholder="PHIL 431 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 432</label>
                                        <input type="number" class="form-control"  name="PHIL432" placeholder="PHIL 432 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 443</label>
                                        <input type="number" class="form-control"  name="PHIL443" placeholder="PHIL 443 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 446</label>
                                        <input type="number" class="form-control"  name="PHIL446" placeholder="PHIL 446 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 441</label>
                                        <input type="number" class="form-control"  name="PHIL441" placeholder="PHIL 441 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 462</label>
                                        <input type="number" class="form-control"  name="PHIL462" placeholder="PHIL 462 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 445</label>
                                        <input type="number" class="form-control"  name="PHIL445" placeholder="PHIL 445 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 464</label>
                                        <input type="number" class="form-control"  name="PHIL464" placeholder="PHIL 464 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 447</label>
                                        <input type="number" class="form-control"  name="PHIL447" placeholder="PHIL 447 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 468</label>
                                        <input type="number" class="form-control"  name="PHIL468" placeholder="PHIL 468 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 467</label>
                                        <input type="number" class="form-control"  name="PHIL467" placeholder="PHIL 467 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 457</label>
                                        <input type="number" class="form-control"  name="PHIL457" placeholder="PHIL 457 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <div class="form-row"><div class="col-md-4"></div>
                                        <button type="submit" class="col-md-4 justify-content-center btn btn-primary">Next <i
                                class="fas fa-arrow-right fa-sm text-white-50"></i> Summary</button><div class="col-md-4"></div>
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