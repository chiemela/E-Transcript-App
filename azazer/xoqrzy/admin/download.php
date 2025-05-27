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


$url = $_SERVER[REQUEST_URI];
$url = explode("=", $url);
$id = $url[count($url) - 1];

// Attempt select query execution for year one
$sql = "SELECT * FROM transcriptYear1 WHERE id=$id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        // Store individual database columns into session
        while($row = mysqli_fetch_array($result)){
            
            // Retrieve individual field value
            // Store score data in session variables
            $_SESSION["studentName"] = $row["studentName"];
            $_SESSION["matricNumber"] = $row["matricNumber"];
            $_SESSION['PHIL101'] = $row["PHIL101"];
            $_SESSION['PHIL104'] = $row["PHIL104"];
            $_SESSION['PHIL107'] = $row["PHIL107"];
            $_SESSION['PHIL116'] = $row["PHIL116"];
            $_SESSION['PHIL135'] = $row["PHIL135"];
            $_SESSION['PHIL146'] = $row["PHIL146"];
            $_SESSION['REL141'] = $row["REL141"];
            $_SESSION['PHIL162'] = $row["PHIL162"];
            $_SESSION['FRN101'] = $row["FRN101"];
            $_SESSION['PHIL172'] = $row["PHIL172"];
            $_SESSION['GST101'] = $row["GST101"];
            $_SESSION['FRN102'] = $row["FRN102"];
            $_SESSION['GST103'] = $row["GST103"];
            $_SESSION['GST102'] = $row["GST102"];
            $_SESSION['GST105'] = $row["GST105"];
            $_SESSION['GST104'] = $row["GST104"];
            $_SESSION['GST106'] = $row["GST106"];
            $_SESSION['GST108'] = $row["GST108"];


            // create function and add all variables into session array
            $_SESSION['PHIL101grade'] = $row["PHIL101grade"];
            $_SESSION['PHIL107grade'] = $row["PHIL107grade"];
            $_SESSION['PHIL135grade'] = $row["PHIL135grade"];
            $_SESSION['REL141grade'] = $row["REL141grade"];
            $_SESSION['FRN101grade'] = $row["FRN101grade"];
            $_SESSION['GST101grade'] = $row["GST101grade"];
            $_SESSION['GST103grade'] = $row["GST103grade"];
            $_SESSION['GST105grade'] = $row["GST105grade"];
            $_SESSION['PHIL104grade'] = $row["PHIL104grade"];
            $_SESSION['PHIL116grade'] = $row["PHIL116grade"];
            $_SESSION['PHIL146grade'] = $row["PHIL146grade"];
            $_SESSION['PHIL162grade'] = $row["PHIL162grade"];
            $_SESSION['PHIL172grade'] = $row["PHIL172grade"];
            $_SESSION['FRN102grade'] = $row["FRN102grade"];
            $_SESSION['GST102grade'] = $row["GST102grade"];
            $_SESSION['GST104grade'] = $row["GST104grade"];
            $_SESSION['GST106grade'] = $row["GST106grade"];
            $_SESSION['GST108grade'] = $row["GST108grade"];

            $_SESSION['PHIL101gp'] = $row["PHIL101gp"];
            $_SESSION['PHIL107gp'] = $row["PHIL107gp"];
            $_SESSION['PHIL135gp'] = $row["PHIL135gp"];
            $_SESSION['REL141gp'] = $row["REL141gp"];
            $_SESSION['FRN101gp'] = $row["FRN101gp"];
            $_SESSION['GST101gp'] = $row["GST101gp"];
            $_SESSION['GST103gp'] = $row["GST103gp"];
            $_SESSION['GST105gp'] = $row["GST105gp"];
            $_SESSION['PHIL104gp'] = $row["PHIL104gp"];
            $_SESSION['PHIL116gp'] = $row["PHIL116gp"];
            $_SESSION['PHIL146gp'] = $row["PHIL146gp"];
            $_SESSION['PHIL162gp'] = $row["PHIL162gp"];
            $_SESSION['PHIL172gp'] = $row["PHIL172gp"];
            $_SESSION['FRN102gp'] = $row["FRN102gp"];
            $_SESSION['GST102gp'] = $row["GST102gp"];
            $_SESSION['GST104gp'] = $row["GST104gp"];
            $_SESSION['GST106gp'] = $row["GST106gp"];
            $_SESSION['GST108gp'] = $row["GST108gp"];

            // total sumation for GPA, GP, CU for first year first semester
            $_SESSION['_finaltotalgp11'] = $row["_finaltotalgp11"];
            $_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_1'] = $row["SEMESTER_GPA_FIRST_YEAR_SEMSTER_1"];
            $_SESSION['TOTAL_GP_FIRST_YEAR_SEMSTER_1'] = $row["TOTAL_GP_FIRST_YEAR_SEMSTER_1"];
            $_SESSION['TOTAL_CU_FIRST_YEAR_SEMSTER_1'] = $row["TOTAL_CU_FIRST_YEAR_SEMSTER_1"];

            // total sumation for GPA, GP, CU for first year second semester
            $_SESSION['_finaltotalgp12'] = $row["_finaltotalgp12"];
            $_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_2'] = $row["SEMESTER_GPA_FIRST_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_GP_FIRST_YEAR_SEMSTER_2'] = $row["TOTAL_GP_FIRST_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_CU_FIRST_YEAR_SEMSTER_2'] = $row["TOTAL_CU_FIRST_YEAR_SEMSTER_2"];
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}




// Attempt select query execution for year two
$sql = "SELECT * FROM transcriptYear2 WHERE id=$id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        // Store individual database columns into session
        while($row = mysqli_fetch_array($result)){
            
            // Retrieve individual field value
            // Store data in session variables
            $_SESSION["PHIL201"] = $row["PHIL201"];
            $_SESSION["PHIL216"] = $row["PHIL216"];
            $_SESSION["PHIL223"] = $row["PHIL223"];
            $_SESSION["PHIL236"] = $row["PHIL236"];
            $_SESSION["PHIL243"] = $row["PHIL243"];
            $_SESSION["PHIL242"] = $row["PHIL242"];
            $_SESSION["PHIL245"] = $row["PHIL245"];
            $_SESSION["PHIL246"] = $row["PHIL246"];
            $_SESSION["PHIL265"] = $row["PHIL265"];
            $_SESSION["PHIL262"] = $row["PHIL262"];
            $_SESSION["PHIL271"] = $row["PHIL271"];
            $_SESSION["PHIL264"] = $row["PHIL264"];
            $_SESSION["GST223"] = $row["GST223"];
            $_SESSION["PHIL268"] = $row["PHIL268"];
            $_SESSION["CMP202"] = $row["CMP202"];
            $_SESSION["GST222"] = $row["GST222"];

            // Store Grade data in session variables
            $_SESSION["PHIL201grade"] = $row["PHIL201grade"];
            $_SESSION["PHIL216grade"] = $row["PHIL216grade"];
            $_SESSION["PHIL223grade"] = $row["PHIL223grade"];
            $_SESSION["PHIL236grade"] = $row["PHIL236grade"];
            $_SESSION["PHIL243grade"] = $row["PHIL243grade"];
            $_SESSION["PHIL242grade"] = $row["PHIL242grade"];
            $_SESSION["PHIL245grade"] = $row["PHIL245grade"];
            $_SESSION["PHIL246grade"] = $row["PHIL246grade"];
            $_SESSION["PHIL265grade"] = $row["PHIL265grade"];
            $_SESSION["PHIL262grade"] = $row["PHIL262grade"];
            $_SESSION["PHIL271grade"] = $row["PHIL271grade"];
            $_SESSION["PHIL264grade"] = $row["PHIL264grade"];
            $_SESSION["GST223grade"] = $row["GST223grade"];
            $_SESSION["PHIL268grade"] = $row["PHIL268grade"];
            $_SESSION["CMP202grade"] = $row["CMP202grade"];
            $_SESSION["GST222grade"] = $row["GST222grade"];

            // Store GP data in session variables
            $_SESSION["PHIL201gp"] = $row["PHIL201gp"];
            $_SESSION["PHIL216gp"] = $row["PHIL216gp"];
            $_SESSION["PHIL223gp"] = $row["PHIL223gp"];
            $_SESSION["PHIL236gp"] = $row["PHIL236gp"];
            $_SESSION["PHIL243gp"] = $row["PHIL243gp"];
            $_SESSION["PHIL242gp"] = $row["PHIL242gp"];
            $_SESSION["PHIL245gp"] = $row["PHIL245gp"];
            $_SESSION["PHIL246gp"] = $row["PHIL246gp"];
            $_SESSION["PHIL265gp"] = $row["PHIL265gp"];
            $_SESSION["PHIL262gp"] = $row["PHIL262gp"];
            $_SESSION["PHIL271gp"] = $row["PHIL271gp"];
            $_SESSION["PHIL264gp"] = $row["PHIL264gp"];
            $_SESSION["GST223gp"] = $row["GST223gp"];
            $_SESSION["PHIL268gp"] = $row["PHIL268gp"];
            $_SESSION["CMP202gp"] = $row["CMP202gp"];
            $_SESSION["GST222gp"] = $row["GST222gp"];


            // total sumation for GPA, GP, CU for second year first semester
            $_SESSION['_finaltotalgp21'] = $row["_finaltotalgp21"];
            $_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_1'] = $row["SEMESTER_GPA_SECOND_YEAR_SEMSTER_1"];
            $_SESSION['TOTAL_GP_SECOND_YEAR_SEMSTER_1'] = $row["TOTAL_GP_SECOND_YEAR_SEMSTER_1"];
            $_SESSION['TOTAL_CU_SECOND_YEAR_SEMSTER_1'] = $row["TOTAL_CU_SECOND_YEAR_SEMSTER_1"];

            // total sumation for GPA, GP, CU for second year second semester
            $_SESSION['_finaltotalgp22'] = $row["_finaltotalgp22"];
            $_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_2'] = $row["SEMESTER_GPA_SECOND_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_GP_SECOND_YEAR_SEMSTER_2'] = $row["TOTAL_GP_SECOND_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_CU_SECOND_YEAR_SEMSTER_2'] = $row["TOTAL_CU_SECOND_YEAR_SEMSTER_2"];
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}




// Attempt select query execution for year two
$sql = "SELECT * FROM transcriptYear3 WHERE id=$id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        // Store individual database columns into session
        while($row = mysqli_fetch_array($result)){
            
            // Retrieve individual field value
            // Store score data in session variables
            $_SESSION["PHIL323"] = $row["PHIL323"];
            $_SESSION["PHIL332"] = $row["PHIL332"];
            $_SESSION["PHIL341"] = $row["PHIL341"];
            $_SESSION["PHIL334"] = $row["PHIL334"];
            $_SESSION["PHIL345"] = $row["PHIL345"];
            $_SESSION["PHIL362"] = $row["PHIL362"];
            $_SESSION["PHIL361"] = $row["PHIL361"];
            $_SESSION["PHIL364"] = $row["PHIL364"];
            $_SESSION["PHIL363"] = $row["PHIL363"];
            $_SESSION["PHIL366"] = $row["PHIL366"];
            $_SESSION["REL355"] = $row["REL355"];
            $_SESSION["PHIL372"] = $row["PHIL372"];
            $_SESSION["GPD313"] = $row["GPD313"];
            $_SESSION["HIS362"] = $row["HIS362"];
            $_SESSION["PHIL305"] = $row["PHIL305"];


            // Store Grade data in session variables
            $_SESSION["PHIL323grade"] = $row["PHIL323grade"];
            $_SESSION["PHIL332grade"] = $row["PHIL332grade"];
            $_SESSION["PHIL341grade"] = $row["PHIL341grade"];
            $_SESSION["PHIL334grade"] = $row["PHIL334grade"];
            $_SESSION["PHIL345grade"] = $row["PHIL345grade"];
            $_SESSION["PHIL362grade"] = $row["PHIL362grade"];
            $_SESSION["PHIL361grade"] = $row["PHIL361grade"];
            $_SESSION["PHIL364grade"] = $row["PHIL364grade"];
            $_SESSION["PHIL363grade"] = $row["PHIL363grade"];
            $_SESSION["PHIL366grade"] = $row["PHIL366grade"];
            $_SESSION["REL355grade"] = $row["REL355grade"];
            $_SESSION["PHIL372grade"] = $row["PHIL372grade"];
            $_SESSION["GPD313grade"] = $row["GPD313grade"];
            $_SESSION["HIS362grade"] = $row["HIS362grade"];
            $_SESSION["PHIL305grade"] = $row["PHIL305grade"];

            // Store GP data in session variables
            $_SESSION["PHIL323gp"] = $row["PHIL323gp"];
            $_SESSION["PHIL332gp"] = $row["PHIL332gp"];
            $_SESSION["PHIL341gp"] = $row["PHIL341gp"];
            $_SESSION["PHIL334gp"] = $row["PHIL334gp"];
            $_SESSION["PHIL345gp"] = $row["PHIL345gp"];
            $_SESSION["PHIL362gp"] = $row["PHIL362gp"];
            $_SESSION["PHIL361gp"] = $row["PHIL361gp"];
            $_SESSION["PHIL364gp"] = $row["PHIL364gp"];
            $_SESSION["PHIL363gp"] = $row["PHIL363gp"];
            $_SESSION["PHIL366gp"] = $row["PHIL366gp"];
            $_SESSION["REL355gp"] = $row["REL355gp"];
            $_SESSION["PHIL372gp"] = $row["PHIL372gp"];
            $_SESSION["GPD313gp"] = $row["GPD313gp"];
            $_SESSION["HIS362gp"] = $row["HIS362gp"];
            $_SESSION["PHIL305gp"] = $row["PHIL305gp"];
            

            // total sumation for GPA, GP, CU for second year first semester
            $_SESSION['_finaltotalgp31'] = $row["_finaltotalgp31"];
            $_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_1'] = $row["SEMESTER_GPA_THIRD_YEAR_SEMSTER_1"];
            $_SESSION['TOTAL_GP_THIRD_YEAR_SEMSTER_1'] = $row["TOTAL_GP_THIRD_YEAR_SEMSTER_1"];
            $_SESSION['TOTAL_CU_THIRD_YEAR_SEMSTER_1'] = $row["TOTAL_CU_THIRD_YEAR_SEMSTER_1"];

            // total sumation for GPA, GP, CU for second year second semester
            $_SESSION['_finaltotalgp32'] = $row["_finaltotalgp32"];
            $_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_2'] = $row["SEMESTER_GPA_THIRD_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_GP_THIRD_YEAR_SEMSTER_2'] = $row["TOTAL_GP_THIRD_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_CU_THIRD_YEAR_SEMSTER_2'] = $row["TOTAL_CU_THIRD_YEAR_SEMSTER_2"];
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}




// Attempt select query execution for year two
$sql = "SELECT * FROM transcriptYear4 WHERE id=$id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        // Store individual database columns into session
        while($row = mysqli_fetch_array($result)){
            
            // Retrieve individual field value
            // Store score data in session variables
            $_SESSION["admissionYear1"] = $row["admissionYear1"];
            $_SESSION["admissionYear2"] = $row["admissionYear2"];
            $_SESSION["admissionYear3"] = $row["admissionYear3"];
            $_SESSION["admissionYear4"] = $row["admissionYear4"];
            $_SESSION["PHIL411"] = $row["PHIL411"];
            $_SESSION["PHIL410"] = $row["PHIL410"];
            $_SESSION["PHIL431"] = $row["PHIL431"];
            $_SESSION["PHIL432"] = $row["PHIL432"];
            $_SESSION["PHIL443"] = $row["PHIL443"];
            $_SESSION["PHIL446"] = $row["PHIL446"];
            $_SESSION["PHIL441"] = $row["PHIL441"];
            $_SESSION["PHIL462"] = $row["PHIL462"];
            $_SESSION["PHIL445"] = $row["PHIL445"];
            $_SESSION["PHIL464"] = $row["PHIL464"];
            $_SESSION["PHIL447"] = $row["PHIL447"];
            $_SESSION["PHIL468"] = $row["PHIL468"];
            $_SESSION["PHIL467"] = $row["PHIL467"];
            $_SESSION["PHIL457"] = $row["PHIL457"];


            // Store Grade data in session variables
            $_SESSION["PHIL411grade"] = $row["PHIL411grade"];
            $_SESSION["PHIL410grade"] = $row["PHIL410grade"];
            $_SESSION["PHIL431grade"] = $row["PHIL431grade"];
            $_SESSION["PHIL432grade"] = $row["PHIL432grade"];
            $_SESSION["PHIL443grade"] = $row["PHIL443grade"];
            $_SESSION["PHIL446grade"] = $row["PHIL446grade"];
            $_SESSION["PHIL441grade"] = $row["PHIL441grade"];
            $_SESSION["PHIL462grade"] = $row["PHIL462grade"];
            $_SESSION["PHIL445grade"] = $row["PHIL445grade"];
            $_SESSION["PHIL464grade"] = $row["PHIL464grade"];
            $_SESSION["PHIL447grade"] = $row["PHIL447grade"];
            $_SESSION["PHIL468grade"] = $row["PHIL468grade"];
            $_SESSION["PHIL467grade"] = $row["PHIL467grade"];
            $_SESSION["PHIL457grade"] = $row["PHIL457grade"];

            // Store GP data in session variables
            $_SESSION["PHIL411gp"] = $row["PHIL411gp"];
            $_SESSION["PHIL410gp"] = $row["PHIL410gp"];
            $_SESSION["PHIL431gp"] = $row["PHIL431gp"];
            $_SESSION["PHIL432gp"] = $row["PHIL432gp"];
            $_SESSION["PHIL443gp"] = $row["PHIL443gp"];
            $_SESSION["PHIL446gp"] = $row["PHIL446gp"];
            $_SESSION["PHIL441gp"] = $row["PHIL441gp"];
            $_SESSION["PHIL462gp"] = $row["PHIL462gp"];
            $_SESSION["PHIL445gp"] = $row["PHIL445gp"];
            $_SESSION["PHIL464gp"] = $row["PHIL464gp"];
            $_SESSION["PHIL447gp"] = $row["PHIL447gp"];
            $_SESSION["PHIL468gp"] = $row["PHIL468gp"];
            $_SESSION["PHIL467gp"] = $row["PHIL467gp"];
            $_SESSION["PHIL457gp"] = $row["PHIL457gp"];


            // total sumation for GPA, GP, CU for second year first semester
            $_SESSION['_finaltotalgp41'] = $row["_finaltotalgp41"];
            $_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1'] =$row["SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1"]; 
            $_SESSION['TOTAL_GP_FOURTH_YEAR_SEMSTER_1'] = $row["TOTAL_GP_FOURTH_YEAR_SEMSTER_1"];
            $_SESSION['TOTAL_CU_FOURTH_YEAR_SEMSTER_1'] = $row["TOTAL_CU_FOURTH_YEAR_SEMSTER_1"];

            // total sumation for GPA, GP, CU for second year second semester
            $_SESSION['_finaltotalgp42'] = $row["_finaltotalgp42"];
            $_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2'] = $row["SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_GP_FOURTH_YEAR_SEMSTER_2'] = $row["TOTAL_GP_FOURTH_YEAR_SEMSTER_2"];
            $_SESSION['TOTAL_CU_FOURTH_YEAR_SEMSTER_2'] = $row["TOTAL_CU_FOURTH_YEAR_SEMSTER_2"];
            
            $_SESSION["admissionYear1"] = $row["admissionYear1"];
            $_SESSION["admissionYear2"] = $row["admissionYear2"];
            $_SESSION["admissionYear3"] = $row["admissionYear3"];
            $_SESSION["admissionYear4"] = $row["admissionYear4"];

            $_SESSION["matricNumber"] = $row["matricNumber"];
        
            $_SESSION["studentName"] = $row["studentName"];
            $_SESSION['_classification'] = $row["_classification"];
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header("location: makepdf.php");
exit();
 
// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);

?>
