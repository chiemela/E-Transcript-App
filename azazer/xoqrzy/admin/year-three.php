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
    $PHIL323 = trim($_POST["PHIL323"]);
    $PHIL332 = trim($_POST["PHIL332"]);
    $PHIL341 = trim($_POST["PHIL341"]);
    $PHIL334 = trim($_POST["PHIL334"]);
    $PHIL345 = trim($_POST["PHIL345"]);
    $PHIL362 = trim($_POST["PHIL362"]);
    $PHIL361 = trim($_POST["PHIL361"]);
    $PHIL364 = trim($_POST["PHIL364"]);
    $PHIL363 = trim($_POST["PHIL363"]);
    $PHIL366 = trim($_POST["PHIL366"]);
    $REL355 = trim($_POST["REL355"]);
    $PHIL372 = trim($_POST["PHIL372"]);
    $GPD313 = trim($_POST["GPD313"]);
    $HIS362 = trim($_POST["HIS362"]);
    $PHIL305 = trim($_POST["PHIL305"]);

    // Store score data in session variables
    $_SESSION["PHIL323"] = $PHIL323;
    $_SESSION["PHIL332"] = $PHIL332;
    $_SESSION["PHIL341"] = $PHIL341;
    $_SESSION["PHIL334"] = $PHIL334;
    $_SESSION["PHIL345"] = $PHIL345;
    $_SESSION["PHIL362"] = $PHIL362;
    $_SESSION["PHIL361"] = $PHIL361;
    $_SESSION["PHIL364"] = $PHIL364;
    $_SESSION["PHIL363"] = $PHIL363;
    $_SESSION["PHIL366"] = $PHIL366;
    $_SESSION["REL355"] = $REL355;
    $_SESSION["PHIL372"] = $PHIL372;
    $_SESSION["GPD313"] = $GPD313;
    $_SESSION["HIS362"] = $HIS362;
    $_SESSION["PHIL305"] = $PHIL305;



    // handle first year first semster calculations
    //for the 1st course in third year 1st semester
    try{
        // clear data in variables
        $_totalgp = 0;
        $_semstergpa = 0;
        
        if ($PHIL323 >= 70)
        {
            $PHIL323grade = "A"; 
            $PHIL323gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL323 >= 60)
        {
            $PHIL323grade = "B"; 
            $PHIL323gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL323 >= 50)
        {
            $PHIL323grade = "C"; 
            $PHIL323gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL323 >= 45)
        {
            $PHIL323grade = "D"; 
            $PHIL323gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL323 >= 40)
        {
            $PHIL323grade = "E"; 
            $PHIL323gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL323 >= 0)
        {
            $PHIL323grade = "F"; 
            $PHIL323gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL323: " . $e->getMessage() . "</p>";
    }

    //for the 2nd course in third year 1st semester
    try{
        if ($PHIL341 >= 70)
        {
            $PHIL341grade = "A"; 
            $PHIL341gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL341 >= 60)
        {
            $PHIL341grade = "B"; 
            $PHIL341gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL341 >= 50)
        {
            $PHIL341grade = "C"; 
            $PHIL341gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL341 >= 45)
        {
            $PHIL341grade = "D"; 
            $PHIL341gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL341 >= 40)
        {
            $PHIL341grade = "E"; 
            $PHIL341gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL341 >= 0)
        {
            $PHIL341grade = "F"; 
            $PHIL341gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL341: " . $e->getMessage() . "</p>";
    }

    //for the 3rd course in third year 1st semester
    try{
        if ($PHIL345 >= 70)
        {
            $PHIL345grade = "A"; 
            $PHIL345gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL345 >= 60)
        {
            $PHIL345grade = "B"; 
            $PHIL345gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL345 >= 50)
        {
            $PHIL345grade = "C"; 
            $PHIL345gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL345 >= 45)
        {
            $PHIL345grade = "D"; 
            $PHIL345gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL345 >= 40)
        {
            $PHIL345grade = "E"; 
            $PHIL345gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL345 >= 0)
        {
            $PHIL345grade = "F"; 
            $PHIL345gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL345: " . $e->getMessage() . "</p>";
    }

    //for the 4th course in third year 1st semester
    try{
        if ($PHIL361 >= 70)
        {
            $PHIL361grade = "A"; 
            $PHIL361gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL361 >= 60)
        {
            $PHIL361grade = "B"; 
            $PHIL361gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL361 >= 50)
        {
            $PHIL361grade = "C"; 
            $PHIL361gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL361 >= 45)
        {
            $PHIL361grade = "D"; 
            $PHIL361gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL361 >= 40)
        {
            $PHIL361grade = "E"; 
            $PHIL361gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL361 >= 0)
        {
            $PHIL361grade = "F"; 
            $PHIL361gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL361: " . $e->getMessage() . "</p>";
    }

    //for the 5th course in third year 1st semester
    try{
        if ($PHIL363 >= 70)
        {
            $PHIL363grade = "A"; 
            $PHIL363gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL363 >= 60)
        {
            $PHIL363grade = "B"; 
            $PHIL363gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL363 >= 50)
        {
            $PHIL363grade = "C"; 
            $PHIL363gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL363 >= 45)
        {
            $PHIL363grade = "D"; 
            $PHIL363gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL363 >= 40)
        {
            $PHIL363grade = "E"; 
            $PHIL363gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL363 >= 0)
        {
            $PHIL363grade = "F"; 
            $PHIL363gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL363: " . $e->getMessage() . "</p>";
    }

    //for the 6th course in third year 1st semester
    try{
        if ($REL355 >= 70)
        {
            $REL355grade = "A"; 
            $REL355gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL355 >= 60)
        {
            $REL355grade = "B"; 
            $REL355gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL355 >= 50)
        {
            $REL355grade = "C"; 
            $REL355gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL355 >= 45)
        {
            $REL355grade = "D"; 
            $REL355gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL355 >= 40)
        {
            $REL355grade = "E"; 
            $REL355gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($REL355 >= 0)
        {
            $REL355grade = "F"; 
            $REL355gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at REL355: " . $e->getMessage() . "</p>";
    }

    //for the 7th course in third year 1st semester
    try{
        if ($GPD313 >= 70)
        {
            $GPD313grade = "A"; 
            $GPD313gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GPD313 >= 60)
        {
            $GPD313grade = "B"; 
            $GPD313gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GPD313 >= 50)
        {
            $GPD313grade = "C"; 
            $GPD313gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        else if ($GPD313 >= 45)
        {
            $GPD313grade = "D"; 
            $GPD313gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GPD313 >= 40)
        {
            $GPD313grade = "E"; 
            $GPD313gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($GPD313 >= 0)
        {
            $GPD313grade = "F";
            $GPD313gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at GPD313: " . $e->getMessage() . "</p>";
    }

    //for the 8th course in third year 1st semester
    try{
        if ($PHIL305 >= 70)
        {
            $PHIL305grade = "A"; 
            $PHIL305gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL305 >= 60)
        {
            $PHIL305grade = "B"; 
            $PHIL305gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL305 >= 50)
        {
            $PHIL305grade = "C"; 
            $PHIL305gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL305 >= 45)
        {
            $PHIL305grade = "D"; 
            $PHIL305gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL305 >= 40)
        {
            $PHIL305grade = "E"; 
            $PHIL305gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL305 >= 0)
        {
            $PHIL305grade = "F"; 
            $PHIL305gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL305: " . $e->getMessage() . "</p>";
    }

    $_finaltotalgp31 = $_totalgp;
    $_semstergpa = $_totalgp / 20;
    $SEMESTER_GPA_THIRD_YEAR_SEMSTER_1 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_THIRD_YEAR_SEMSTER_1 = $_totalgp;
    $TOTAL_CU_THIRD_YEAR_SEMSTER_1 = "20";
    $_finaltotalcu3 = 0;
    $_finaltotalcu3 = $_finaltotalcu3 + 20;




    // handle first year second semster calculations
    //for the 1st course in third year 2nd semester
    try{
        // clear data in variables
        $_totalgp = 0;
        $_semstergpa = 0;
        
        if ($PHIL332 >= 70)
        {
            $PHIL332grade = "A"; 
            $PHIL332gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL332 >= 60)
        {
            $PHIL332grade = "B"; 
            $PHIL332gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL332 >= 50)
        {
            $PHIL332grade = "C"; 
            $PHIL332gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL332 >= 45)
        {
            $PHIL332grade = "D"; 
            $PHIL332gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL332 >= 40)
        {
            $PHIL332grade = "E"; 
            $PHIL332gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL332 >= 0)
        {
            $PHIL332grade = "F"; 
            $PHIL332gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL332: " . $e->getMessage() . "</p>";
    }

    //for the 2nd course in third year 2nd semester
    try{
        if ($PHIL334 >= 70)
        {
            $PHIL334grade = "A"; 
            $PHIL334gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL334 >= 60)
        {
            $PHIL334grade = "B"; 
            $PHIL334gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL334 >= 50)
        {
            $PHIL334grade = "C"; 
            $PHIL334gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL334 >= 45)
        {
            $PHIL334grade = "D"; 
            $PHIL334gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL334 >= 40)
        {
            $PHIL334grade = "E"; 
            $PHIL334gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL334 >= 0)
        {
            $PHIL334grade = "F"; 
            $PHIL334gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL334: " . $e->getMessage() . "</p>";
    }

    //for the 3rd course in third year 2nd semester
    try{
        if ($PHIL362 >= 70)
        {
            $PHIL362grade = "A"; 
            $PHIL362gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL362 >= 60)
        {
            $PHIL362grade = "B"; 
            $PHIL362gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL362 >= 50)
        {
            $PHIL362grade = "C"; 
            $PHIL362gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL362 >= 45)
        {
            $PHIL362grade = "D"; 
            $PHIL362gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL362 >= 40)
        {
            $PHIL362grade = "E"; 
            $PHIL362gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL362 >= 0)
        {
            $PHIL362grade = "F"; 
            $PHIL362gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL362: " . $e->getMessage() . "</p>";
    }

    //for the 4th course in third year 2nd semester
    try{
        if ($PHIL364 >= 70)
        {
            $PHIL364grade = "A"; 
            $PHIL364gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL364 >= 60)
        {
            $PHIL364grade = "B"; 
            $PHIL364gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL364 >= 50)
        {
            $PHIL364grade = "C"; 
            $PHIL364gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL364 >= 45)
        {
            $PHIL364grade = "D"; 
            $PHIL364gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL364 >= 40)
        {
            $PHIL364grade = "E"; 
            $PHIL364gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL364 >= 0)
        {
            $PHIL364grade = "F"; 
            $PHIL364gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL364: " . $e->getMessage() . "</p>";
    }

    //for the 5th course in third year 2nd semester
    try{
        if ($PHIL366 >= 70)
        {
            $PHIL366grade = "A"; 
            $PHIL366gp = $_gp = 2 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL366 >= 60)
        {
            $PHIL366grade = "B"; 
            $PHIL366gp = $_gp = 2 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL366 >= 50)
        {
            $PHIL366grade = "C"; 
            $PHIL366gp = $_gp = 2 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL366 >= 45)
        {
            $PHIL366grade = "D"; 
            $PHIL366gp = $_gp = 2 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL366 >= 40)
        {
            $PHIL366grade = "E"; 
            $PHIL366gp = $_gp = 2 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL366 >= 0)
        {
            $PHIL366grade = "F"; 
            $PHIL366gp = $_gp = 2 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL366: " . $e->getMessage() . "</p>";
    }

    //for the 6th course in third year 2nd semester
    try{
        if ($PHIL372 >= 70)
        {
            $PHIL372grade = "A"; 
            $PHIL372gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL372 >= 60)
        {
            $PHIL372grade = "B"; 
            $PHIL372gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL372 >= 50)
        {
            $PHIL372grade = "C"; 
            $PHIL372gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL372 >= 45)
        {
            $PHIL372grade = "D"; 
            $PHIL372gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL372 >= 40)
        {
            $PHIL372grade = "E"; 
            $PHIL372gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($PHIL372 >= 0)
        {
            $PHIL372grade = "F"; 
            $PHIL372gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at PHIL372: " . $e->getMessage() . "</p>";
    }

    //for the 7th course in third year 2nd semester
    try{
        if ($HIS362 >= 70)
        {
            $HIS362grade = "A"; 
            $HIS362gp = $_gp = 3 * 5;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($HIS362 >= 60)
        {
            $HIS362grade = "B"; 
            $HIS362gp = $_gp = 3 * 4;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($HIS362 >= 50)
        {
            $HIS362grade = "C"; 
            $HIS362gp = $_gp = 3 * 3;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($HIS362 >= 45)
        {
            $HIS362grade = "D"; 
            $HIS362gp = $_gp = 3 * 2;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($HIS362 >= 40)
        {
            $HIS362grade = "E"; 
            $HIS362gp = $_gp = 3 * 1;
            $_totalgp = $_totalgp + $_gp;
        }
        elseif ($HIS362 >= 0)
        {
            $HIS362grade = "F"; 
            $HIS362gp = $_gp = 3 * 0;
            $_totalgp = $_totalgp + $_gp;
        }
    } catch(Exception $e){
        // Handle the exception
        echo "<p>Caught exception at HIS362: " . $e->getMessage() . "</p>";
    }

    $_finaltotalgp32 = $_totalgp;
    $_semstergpa = $_totalgp / 18;
    $SEMESTER_GPA_THIRD_YEAR_SEMSTER_2 = number_format($_semstergpa, 2, '.', '');
    $TOTAL_GP_THIRD_YEAR_SEMSTER_2 = $_totalgp;
    $TOTAL_CU_THIRD_YEAR_SEMSTER_2 = "18";
    $_finaltotalcu3 = $_finaltotalcu3 + 18;

    // create function and add all variables into session array
    // Store Grade data in session variables
    $_SESSION["PHIL323grade"] = $PHIL323grade;
    $_SESSION["PHIL332grade"] = $PHIL332grade;
    $_SESSION["PHIL341grade"] = $PHIL341grade;
    $_SESSION["PHIL334grade"] = $PHIL334grade;
    $_SESSION["PHIL345grade"] = $PHIL345grade;
    $_SESSION["PHIL362grade"] = $PHIL362grade;
    $_SESSION["PHIL361grade"] = $PHIL361grade;
    $_SESSION["PHIL364grade"] = $PHIL364grade;
    $_SESSION["PHIL363grade"] = $PHIL363grade;
    $_SESSION["PHIL366grade"] = $PHIL366grade;
    $_SESSION["REL355grade"] = $REL355grade;
    $_SESSION["PHIL372grade"] = $PHIL372grade;
    $_SESSION["GPD313grade"] = $GPD313grade;
    $_SESSION["HIS362grade"] = $HIS362grade;
    $_SESSION["PHIL305grade"] = $PHIL305grade;

    // Store GP data in session variables
    $_SESSION["PHIL323gp"] = $PHIL323gp;
    $_SESSION["PHIL332gp"] = $PHIL332gp;
    $_SESSION["PHIL341gp"] = $PHIL341gp;
    $_SESSION["PHIL334gp"] = $PHIL334gp;
    $_SESSION["PHIL345gp"] = $PHIL345gp;
    $_SESSION["PHIL362gp"] = $PHIL362gp;
    $_SESSION["PHIL361gp"] = $PHIL361gp;
    $_SESSION["PHIL364gp"] = $PHIL364gp;
    $_SESSION["PHIL363gp"] = $PHIL363gp;
    $_SESSION["PHIL366gp"] = $PHIL366gp;
    $_SESSION["REL355gp"] = $REL355gp;
    $_SESSION["PHIL372gp"] = $PHIL372gp;
    $_SESSION["GPD313gp"] = $GPD313gp;
    $_SESSION["HIS362gp"] = $HIS362gp;
    $_SESSION["PHIL305gp"] = $PHIL305gp;
    
    // global variable for the Grand TOTAL CU
    $_SESSION['_finaltotalcu3'] = $_finaltotalcu3;

    // total sumation for GPA, GP, CU for second year first semester
    $_SESSION['_finaltotalgp31'] = $_finaltotalgp31;
    $_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_1'] = $SEMESTER_GPA_THIRD_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_GP_THIRD_YEAR_SEMSTER_1'] = $TOTAL_GP_THIRD_YEAR_SEMSTER_1;
    $_SESSION['TOTAL_CU_THIRD_YEAR_SEMSTER_1'] = $TOTAL_CU_THIRD_YEAR_SEMSTER_1;

    // total sumation for GPA, GP, CU for second year second semester
    $_SESSION['_finaltotalgp32'] = $_finaltotalgp32;
    $_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_2'] = $SEMESTER_GPA_THIRD_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_GP_THIRD_YEAR_SEMSTER_2'] = $TOTAL_GP_THIRD_YEAR_SEMSTER_2;
    $_SESSION['TOTAL_CU_THIRD_YEAR_SEMSTER_2'] = $TOTAL_CU_THIRD_YEAR_SEMSTER_2;


    // Redirect user to enter YEAR ONE page
    header("location: year-four.php");
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
                                    </div>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >YEAR: <?php echo $_SESSION["admissionYear3"];?></label>
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
                                        <label>PHIL 323</label>
                                        <input type="number" class="form-control"  name="PHIL323" placeholder="PHIL 323 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 332</label>
                                        <input type="number" class="form-control"  name="PHIL332" placeholder="PHIL 332 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 341</label>
                                        <input type="number" class="form-control"  name="PHIL341" placeholder="PHIL 341 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 334</label>
                                        <input type="number" class="form-control"  name="PHIL334" placeholder="PHIL 334 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 345</label>
                                        <input type="number" class="form-control"  name="PHIL345" placeholder="PHIL 345 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 362</label>
                                        <input type="number" class="form-control"  name="PHIL362" placeholder="PHIL 362 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 361</label>
                                        <input type="number" class="form-control"  name="PHIL361" placeholder="PHIL 361 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 364</label>
                                        <input type="number" class="form-control"  name="PHIL364" placeholder="PHIL 364 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 363</label>
                                        <input type="number" class="form-control"  name="PHIL363" placeholder="PHIL 363 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 366</label>
                                        <input type="number" class="form-control"  name="PHIL366" placeholder="PHIL 366 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>REL 355</label>
                                        <input type="number" class="form-control"  name="REL355" placeholder="REL 355 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>PHIL 372</label>
                                        <input type="number" class="form-control"  name="PHIL372" placeholder="PHIL 372 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>GPD 313</label>
                                        <input type="number" class="form-control"  name="GPD313" placeholder="GPD 313 Score" required autofocus >
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>HIS 362</label>
                                        <input type="number" class="form-control"  name="HIS362" placeholder="HIS 362 Score" required autofocus >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label>PHIL 305</label>
                                        <input type="number" class="form-control"  name="PHIL305" placeholder="PHIL 305 Score">
                                        </div>
                                        <div class="form-group col-md-6" required autofocus >
                                        </div>
                                    </div>
                                    <div class="form-row"><div class="col-md-4"></div>
                                        <button type="submit" class="col-md-4 justify-content-center btn btn-primary">Next <i
                                class="fas fa-arrow-right fa-sm text-white-50"></i> Year Four</button><div class="col-md-4"></div>
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