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

 // Insert record into database

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    
    
// Prepare an insert statement for year one
$sql1 = "INSERT INTO transcriptYear1 (studentName, matricNumber, admissionYear1, PHIL101, PHIL101grade, PHIL101gp, PHIL104, PHIL104grade, PHIL104gp, PHIL107, PHIL107grade, PHIL107gp, PHIL116, PHIL116grade, PHIL116gp, PHIL135, PHIL135grade, PHIL135gp, PHIL146, PHIL146grade, PHIL146gp, REL141, REL141grade, REL141gp, PHIL162, PHIL162grade, PHIL162gp, FRN101, FRN101grade, FRN101gp, PHIL172, PHIL172grade, PHIL172gp, GST101, GST101grade, GST101gp, FRN102, FRN102grade, FRN102gp, GST103, GST103grade, GST103gp, GST102, GST102grade, GST102gp, GST105, GST105grade, GST105gp, GST104, GST104grade, GST104gp, GST106, GST106grade, GST106gp, GST108, GST108grade, GST108gp, TOTAL_CU_FIRST_YEAR_SEMSTER_1, TOTAL_CU_FIRST_YEAR_SEMSTER_2, TOTAL_GP_FIRST_YEAR_SEMSTER_1, TOTAL_GP_FIRST_YEAR_SEMSTER_2, SEMESTER_GPA_FIRST_YEAR_SEMSTER_1, SEMESTER_GPA_FIRST_YEAR_SEMSTER_2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


// Prepare an insert statement for year two
$sql2 = "INSERT INTO transcriptYear2 (studentName, matricNumber, admissionYear2, PHIL201, PHIL201grade, PHIL201gp, PHIL216, PHIL216grade, PHIL216gp, PHIL223, PHIL223grade, PHIL223gp, PHIL236, PHIL236grade, PHIL236gp, PHIL243, PHIL243grade, PHIL243gp, PHIL242, PHIL242grade, PHIL242gp, PHIL245, PHIL245grade, PHIL245gp, PHIL246, PHIL246grade, PHIL246gp, PHIL265, PHIL265grade, PHIL265gp, PHIL262, PHIL262grade, PHIL262gp, PHIL271, PHIL271grade, PHIL271gp, PHIL264, PHIL264grade, PHIL264gp, GST223, GST223grade, GST223gp, PHIL268, PHIL268grade, PHIL268gp, CMP202, CMP202grade, CMP202gp, GST222, GST222grade, GST222gp, TOTAL_CU_SECOND_YEAR_SEMSTER_1, TOTAL_CU_SECOND_YEAR_SEMSTER_2, TOTAL_GP_SECOND_YEAR_SEMSTER_1, TOTAL_GP_SECOND_YEAR_SEMSTER_2, SEMESTER_GPA_SECOND_YEAR_SEMSTER_1, SEMESTER_GPA_SECOND_YEAR_SEMSTER_2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare an insert statement for year three
$sql3 = "INSERT INTO transcriptYear3 (studentName, matricNumber, admissionYear3, PHIL323,
PHIL323grade, PHIL323gp, PHIL332, PHIL332grade, PHIL332gp, PHIL341, PHIL341grade, 
PHIL341gp, PHIL334, PHIL334grade, PHIL334gp, PHIL345, PHIL345grade, PHIL345gp, PHIL362, PHIL362grade, PHIL362gp, PHIL361, PHIL361grade, PHIL361gp, PHIL364, PHIL364grade, 
PHIL364gp, PHIL363, PHIL363grade, PHIL363gp, PHIL366, PHIL366grade, PHIL366gp, PHIL305, PHIL305grade, PHIL305gp, PHIL372, PHIL372grade, PHIL372gp, REL355, REL355grade, REL355gp, HIS362, HIS362grade, HIS362gp, GPD313, GPD313grade, GPD313gp, TOTAL_CU_THIRD_YEAR_SEMSTER_1, TOTAL_CU_THIRD_YEAR_SEMSTER_2, TOTAL_GP_THIRD_YEAR_SEMSTER_1, TOTAL_GP_THIRD_YEAR_SEMSTER_2, SEMESTER_GPA_THIRD_YEAR_SEMSTER_1, SEMESTER_GPA_THIRD_YEAR_SEMSTER_2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?)";

// Prepare an insert statement for year four
$sql4 = "INSERT INTO transcriptYear4 (studentName, matricNumber, admissionYear1, admissionYear2, admissionYear3, admissionYear4, PHIL411, PHIL411grade, PHIL411gp, PHIL410, PHIL410grade, PHIL410gp, PHIL431, PHIL431grade, PHIL431gp, PHIL432, PHIL432grade, PHIL432gp, PHIL443, PHIL443grade, PHIL443gp, PHIL446, PHIL446grade, PHIL446gp, PHIL441, PHIL441grade, PHIL441gp, PHIL462, PHIL462grade, PHIL462gp, PHIL445, PHIL445grade, PHIL445gp, PHIL464, PHIL464grade, PHIL464gp, PHIL447, PHIL447grade, PHIL447gp, PHIL468, PHIL468grade, PHIL468gp, PHIL467, PHIL467grade, PHIL467gp, PHIL457, PHIL457grade, PHIL457gp, TOTAL_CU_FOURTH_YEAR_SEMSTER_1, TOTAL_CU_FOURTH_YEAR_SEMSTER_2, TOTAL_GP_FOURTH_YEAR_SEMSTER_1, TOTAL_GP_FOURTH_YEAR_SEMSTER_2, SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1, SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2, finaltotalGP, finaltotalCGPA, _classification) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         




// Attempt to add data into year one
if($stmt1 = mysqli_prepare($link, $sql1)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt1, "sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $_SESSION["studentName"], $_SESSION["matricNumber"], $_SESSION["admissionYear1"], $_SESSION["PHIL101"], $_SESSION["PHIL101grade"], $_SESSION["PHIL101gp"], $_SESSION["PHIL104"], $_SESSION["PHIL104grade"], $_SESSION["PHIL104gp"], $_SESSION["PHIL107"], $_SESSION["PHIL107grade"], $_SESSION["PHIL107gp"], $_SESSION["PHIL116"], $_SESSION["PHIL116grade"], $_SESSION["PHIL116gp"], $_SESSION["PHIL135"], $_SESSION["PHIL135grade"], $_SESSION["PHIL135gp"], $_SESSION["PHIL146"], $_SESSION["PHIL146grade"], $_SESSION["PHIL146gp"], $_SESSION["REL141"], $_SESSION["REL141grade"], $_SESSION["REL141gp"], $_SESSION["PHIL162"], $_SESSION["PHIL162grade"], $_SESSION["PHIL162gp"], $_SESSION["FRN101"], $_SESSION["FRN101grade"], $_SESSION["FRN101gp"], $_SESSION["PHIL172"], $_SESSION["PHIL172grade"], $_SESSION["PHIL172gp"], $_SESSION["GST101"], $_SESSION["GST101grade"], $_SESSION["GST101gp"], $_SESSION["FRN102"], $_SESSION["FRN102grade"], $_SESSION["FRN102gp"], $_SESSION["GST103"], $_SESSION["GST103grade"], $_SESSION["GST103gp"], $_SESSION["GST102"], $_SESSION["GST102grade"], $_SESSION["GST102gp"], $_SESSION["GST105"], $_SESSION["GST105grade"], $_SESSION["GST105gp"], $_SESSION["GST104"], $_SESSION["GST104grade"], $_SESSION["GST104gp"], $_SESSION["GST106"], $_SESSION["GST106grade"], $_SESSION["GST106gp"], $_SESSION["GST108"], $_SESSION["GST108grade"], $_SESSION["GST108gp"], $_SESSION["TOTAL_CU_FIRST_YEAR_SEMSTER_1"], $_SESSION["TOTAL_CU_FIRST_YEAR_SEMSTER_2"], $_SESSION["TOTAL_GP_FIRST_YEAR_SEMSTER_1"], $_SESSION["TOTAL_GP_FIRST_YEAR_SEMSTER_2"], $_SESSION["SEMESTER_GPA_FIRST_YEAR_SEMSTER_1"], $_SESSION["SEMESTER_GPA_FIRST_YEAR_SEMSTER_2"]);  
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt1)){
        
        echo "Records created successfully. Redirect to landing page";
        /*
        header("location: index.php");
        exit();
        */
        
    } else{
        echo "Something went wrong. Please try again later.";
    }
}



// Attempt to add data into year two
if($stmt2 = mysqli_prepare($link, $sql2)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt2, "sssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $_SESSION["studentName"], $_SESSION["matricNumber"], $_SESSION["admissionYear2"], $_SESSION["PHIL201"], $_SESSION["PHIL201grade"], $_SESSION["PHIL201gp"], $_SESSION["PHIL216"], $_SESSION["PHIL216grade"], $_SESSION["PHIL216gp"], $_SESSION["PHIL223"], $_SESSION["PHIL223grade"], $_SESSION["PHIL223gp"], $_SESSION["PHIL236"], $_SESSION["PHIL236grade"], $_SESSION["PHIL236gp"], $_SESSION["PHIL243"], $_SESSION["PHIL243grade"], $_SESSION["PHIL243gp"], $_SESSION["PHIL242"], $_SESSION["PHIL242grade"], $_SESSION["PHIL242gp"], $_SESSION["PHIL245"], $_SESSION["PHIL245grade"], $_SESSION["PHIL245gp"], $_SESSION["PHIL246"], $_SESSION["PHIL246grade"], $_SESSION["PHIL246gp"], $_SESSION["PHIL265"], $_SESSION["PHIL265grade"], $_SESSION["PHIL265gp"], $_SESSION["PHIL262"], $_SESSION["PHIL262grade"], $_SESSION["PHIL262gp"], $_SESSION["PHIL271"], $_SESSION["PHIL271grade"], $_SESSION["PHIL271gp"], $_SESSION["PHIL264"], $_SESSION["PHIL264grade"], $_SESSION["PHIL264gp"], $_SESSION["GST223"], $_SESSION["GST223grade"], $_SESSION["GST223gp"], $_SESSION["PHIL268"], $_SESSION["PHIL268grade"], $_SESSION["PHIL268gp"], $_SESSION["CMP202"], $_SESSION["CMP202grade"], $_SESSION["CMP202gp"], $_SESSION["GST222"], $_SESSION["GST222grade"], $_SESSION["GST222gp"], $_SESSION["TOTAL_CU_SECOND_YEAR_SEMSTER_1"], $_SESSION["TOTAL_CU_SECOND_YEAR_SEMSTER_2"], $_SESSION["TOTAL_GP_SECOND_YEAR_SEMSTER_1"], $_SESSION["TOTAL_GP_SECOND_YEAR_SEMSTER_2"], $_SESSION["SEMESTER_GPA_SECOND_YEAR_SEMSTER_1"], $_SESSION["SEMESTER_GPA_SECOND_YEAR_SEMSTER_2"]);
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt2)){
        // Records created successfully. Redirect to landing page
        /*
        header("location: index.php");
        exit();
        */
        
    } else{
        echo "Something went wrong. Please try again later.";
    }
}



// Attempt to add 54 data into year three
if($stmt3 = mysqli_prepare($link, $sql3)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt3, "ssssssssssssssssssssssssssssssssssssssssssssssssssssss", $_SESSION["studentName"], $_SESSION["matricNumber"], $_SESSION["admissionYear3"], $_SESSION["PHIL323"], $_SESSION["PHIL323grade"], $_SESSION["PHIL323gp"], $_SESSION["PHIL332"], $_SESSION["PHIL332grade"], $_SESSION["PHIL332gp"], $_SESSION["PHIL341"], $_SESSION["PHIL341grade"], $_SESSION["PHIL341gp"], $_SESSION["PHIL334"], $_SESSION["PHIL334grade"], $_SESSION["PHIL334gp"], $_SESSION["PHIL345"], $_SESSION["PHIL345grade"], $_SESSION["PHIL345gp"], $_SESSION["PHIL362"], $_SESSION["PHIL362grade"], $_SESSION["PHIL362gp"], $_SESSION["PHIL361"], $_SESSION["PHIL361grade"], $_SESSION["PHIL361gp"], $_SESSION["PHIL364"], $_SESSION["PHIL364grade"], $_SESSION["PHIL364gp"], $_SESSION["PHIL363"], $_SESSION["PHIL363grade"], $_SESSION["PHIL363gp"], $_SESSION["PHIL366"], $_SESSION["PHIL366grade"], $_SESSION["PHIL366gp"], $_SESSION["PHIL305"], $_SESSION["PHIL305grade"], $_SESSION["PHIL305gp"], $_SESSION["PHIL372"], $_SESSION["PHIL372grade"], $_SESSION["PHIL372gp"], $_SESSION["REL355"], $_SESSION["REL355grade"], $_SESSION["REL355gp"], $_SESSION["HIS362"], $_SESSION["HIS362grade"], $_SESSION["HIS362gp"], $_SESSION["GPD313"], $_SESSION["GPD313grade"], $_SESSION["GPD313gp"], $_SESSION["TOTAL_CU_THIRD_YEAR_SEMSTER_1"], $_SESSION["TOTAL_CU_THIRD_YEAR_SEMSTER_2"], $_SESSION["TOTAL_GP_THIRD_YEAR_SEMSTER_1"], $_SESSION["TOTAL_GP_THIRD_YEAR_SEMSTER_2"], $_SESSION["SEMESTER_GPA_THIRD_YEAR_SEMSTER_1"], $_SESSION["SEMESTER_GPA_THIRD_YEAR_SEMSTER_2"]);
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt3)){
        // Records created successfully. Redirect to landing page
        /*
        header("location: index.php");
        exit();
        */
        
    } else{
        echo "Something went wrong. Please try again later.";
    }
}


// Attempt to add 54 data into year four
if($stmt4 = mysqli_prepare($link, $sql4)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt4, "sssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $_SESSION["studentName"], $_SESSION["matricNumber"], $_SESSION["admissionYear1"], $_SESSION["admissionYear2"], $_SESSION["admissionYear3"], $_SESSION["admissionYear4"], $_SESSION["PHIL411"], $_SESSION["PHIL411grade"], $_SESSION["PHIL411gp"], $_SESSION["PHIL410"], $_SESSION["PHIL410grade"], $_SESSION["PHIL410gp"], $_SESSION["PHIL431"], $_SESSION["PHIL431grade"], $_SESSION["PHIL431gp"], $_SESSION["PHIL432"], $_SESSION["PHIL432grade"], $_SESSION["PHIL432gp"], $_SESSION["PHIL443"], $_SESSION["PHIL443grade"], $_SESSION["PHIL443gp"], $_SESSION["PHIL446"], $_SESSION["PHIL446grade"], $_SESSION["PHIL446gp"], $_SESSION["PHIL441"], $_SESSION["PHIL441grade"], $_SESSION["PHIL441gp"], $_SESSION["PHIL462"], $_SESSION["PHIL462grade"], $_SESSION["PHIL462gp"], $_SESSION["PHIL445"], $_SESSION["PHIL445grade"], $_SESSION["PHIL445gp"], $_SESSION["PHIL464"], $_SESSION["PHIL464grade"], $_SESSION["PHIL464gp"], $_SESSION["PHIL447"], $_SESSION["PHIL447grade"], $_SESSION["PHIL447gp"], $_SESSION["PHIL468"], $_SESSION["PHIL468grade"], $_SESSION["PHIL468gp"], $_SESSION["PHIL467"], $_SESSION["PHIL467grade"], $_SESSION["PHIL467gp"], $_SESSION["PHIL457"], $_SESSION["PHIL457grade"], $_SESSION["PHIL457gp"], $_SESSION["TOTAL_CU_FOURTH_YEAR_SEMSTER_1"], $_SESSION["TOTAL_CU_FOURTH_YEAR_SEMSTER_2"], $_SESSION["TOTAL_GP_FOURTH_YEAR_SEMSTER_1"], $_SESSION["TOTAL_GP_FOURTH_YEAR_SEMSTER_2"], $_SESSION["SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1"], $_SESSION["SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2"], $_SESSION["finaltotalGP"], $_SESSION["finaltotalCGPA"], $_SESSION["_classification"]);
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt4)){
        // Records created successfully. Redirect to landing page
        
    } else{
        echo "Something went wrong. Please try again later.";
    }
}
 
// Close statement
mysqli_stmt_close($stmt1);
// Close statement
mysqli_stmt_close($stmt2);
// Close statement
mysqli_stmt_close($stmt3);
// Close statement
mysqli_stmt_close($stmt4);

// Close connection
mysqli_close($link);

header("location: makepdf.php");
exit();

?>