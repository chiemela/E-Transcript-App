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

    session_start();
    // Get the total GP
    $_finaltotalgp41 = $_SESSION['_finaltotalgp41'];
    $_finaltotalgp42 = $_SESSION['_finaltotalgp42'];
    $_finaltotalgp31 = $_SESSION['_finaltotalgp31'];
    $_finaltotalgp32 = $_SESSION['_finaltotalgp32'];
    $_finaltotalgp21 = $_SESSION['_finaltotalgp21'];
    $_finaltotalgp22 = $_SESSION['_finaltotalgp22'];
    $_finaltotalgp11 = $_SESSION['_finaltotalgp11'];
    $_finaltotalgp12 = $_SESSION['_finaltotalgp12'];
    $finaltotalGP = $_finaltotalgp41 + $_finaltotalgp42 + $_finaltotalgp31 + $_finaltotalgp32 + $_finaltotalgp21 + $_finaltotalgp22 + $_finaltotalgp11 + $_finaltotalgp12;




    $_SESSION['finaltotalGP'] = $finaltotalGP;
    
    // Get the total CGPA
    $totalCGPA = $_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1'] + $_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2'] + $_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_1'] + $_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_2'] + $_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_1'] + $_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_2'] + $_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_1'] + $_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_2'];

    $totalCGPA = $totalCGPA/ 8;

    $_SESSION['finaltotalCGPA'] = number_format($totalCGPA, 2, '.', '');

    

    // Determine what class of degree to give the student
    if ($totalCGPA >= 4.50)
    {
        $_classification = "1st CLASS";
    }
    elseif ($totalCGPA >= 3.50)
    {
        $_classification = "2:1";
    }
    elseif ($totalCGPA >= 2.40)
    {
        $_classification = "2:2";
    }
    elseif ($totalCGPA >= 1.60)
    {
        $_classification = "3rd CLASS";
    }
    elseif ($totalCGPA >= 1.00)
    {
        $_classification = "PASS";
    }
    elseif ($totalCGPA < 1.00)
    {
        $_classification = "PASS";
    }

    $_SESSION['_classification'] = $_classification;


    // Redirect user to enter YEAR ONE page
    header("location: pdf-download.php");
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
                <a class="btn btn-success btn-sm" href="https://paystack.com/pay/eliamtechswsphiletranscript">Renew Licence</a>
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

                <!-- Begin FIRST YEAR Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add New</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Begin of FIRST YEAR body -->
                        <div class="col-lg-12 mb-4">
                            
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
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg13A1605844888160eiseaofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php">Year One</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg25A1605844888160eiseatofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php">Year Two</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg37A1605844888160eiseatofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php">Year Three</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg49A1605844888160eiseatofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php">Year Four</a></h6>
                                        </div>
                                        <div class="form-group col">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="year-summary.php">Summary</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" target="_blank">
                                    <div class="form-row"><div class="col-md-5"></div><div class="col-md-5"></div>
                                        <button type="submit" class="col-md-2 justify-content-center btn btn-primary"><i
                                class="fas fa-hammer fa-sm text-white-50"></i>&nbsp;&nbsp;Generate</button>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label ><strong>YEAR: <?php echo $_SESSION["admissionYear1"];?></strong></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label ><strong>MATRIC_NO: <?php echo $_SESSION["matricNumber"];?></strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label ><strong>NAME: <?php echo $_SESSION["studentName"];?></strong></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >FIRST YEAR (FIRST SEMESTER)</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 101</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL101"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL101grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL101gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 107</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL107"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL107grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL107gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 135</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL135"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL135grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL135gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>REL 141</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["REL141"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["REL141grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["REL141gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>FRN 101</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["FRN101"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["FRN101grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["FRN101gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 101</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST101"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST101grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST101gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 103</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST103"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST103grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST103gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 105</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST105"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST105grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST105gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 19</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_FIRST_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_FIRST_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <p></p>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >FIRST YEAR (SECOND SEMESTER)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 104</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL104"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL104grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL104gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 116</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL116"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL116grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL116gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 146</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL146"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL146grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL146gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 162</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL162"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL162grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL162gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 172</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL172"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL172grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL172gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>FRN 102</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["FRN102"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["FRN102grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["FRN102gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 102</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST102"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST102grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST102gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 104</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST104"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST104grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST104gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 106</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST106"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST106grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST106gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 108</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST108"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST108grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST108gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 23</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_FIRST_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_FIRST_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- End of FIRST YEAR Body-->





                        <!-- Begin of SECOND YEAR body-->
                        <div class="col-lg-12 mb-4">
                            
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label ><strong>YEAR: <?php echo $_SESSION["admissionYear2"];?></strong></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        <label >SECOND YEAR (FIRST SEMESTER)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 201</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL201"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL201grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL201gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 223</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL223"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL223grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL223gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 243</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL243"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL243grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL243gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 245</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL245"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL245grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL245gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 265</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL265"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL265grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL265gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 271</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL271"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL271grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL271gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 223</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST223"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST223grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST223gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 18</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_SECOND_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_SECOND_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <p></p>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >SECOND YEAR (SECOND SEMESTER)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 216</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL216"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL216grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL216gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 236</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL236"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL236grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL236gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 242</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL242"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL242grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL242gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 246</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL246"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL246grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL246gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 262</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL262"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL262grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL262gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 264</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL264"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL264grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL264gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 268</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST223"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL268grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL268gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>CMP 202</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["CMP202"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["CMP202grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["CMP202gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GST 222</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST222"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST222grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GST222gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 22</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_SECOND_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_SECOND_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                </form>    
                                </div>
                            </div>
                        </div>
                        <!-- End of SECOND YEAR body -->
                        





                        <!-- Begin of THIRD YEAR body-->
                        <div class="col-lg-12 mb-4">
                            
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label ><strong>YEAR: <?php echo $_SESSION["admissionYear3"];?></strong></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        <label >THIRD YEAR (FIRST SEMESTER)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 323</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL323"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL323grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL323gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 341</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL341"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL341grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL341gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 345</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL345"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL345grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL345gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 361</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL361"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL361grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL361gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 363</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL363"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL363grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL363gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 305</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL305"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL305grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL305gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>REL 355</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["REL355"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["REL355grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["REL355gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>GPD 313</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GPD313"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GPD313grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["GPD313gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 20</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_THIRD_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_THIRD_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <p></p>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >THIRD YEAR (SECOND SEMESTER)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 332</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL332"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL332grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL332gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 334</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL334"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL334grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL334gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 362</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL362"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL362grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL362gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 364</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL364"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL364grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL364gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 366</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL366"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL366grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL366gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 372</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL372"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL372grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL372gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>HIS 362</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["HIS362"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["HIS362grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["HIS362gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 18</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_THIRD_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_THIRD_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                </form>    
                                </div>
                            </div>
                        </div>
                        <!-- End of THIRD YEAR body -->
                        





                        <!-- Begin of FOURTH YEAR body-->
                        <div class="col-lg-12 mb-4">
                            
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label ><strong>YEAR: <?php echo $_SESSION["admissionYear4"];?></strong></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        <label >FOURTH YEAR (FIRST SEMESTER)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 411</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL411"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL411grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL411gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 431</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL431"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL431grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL431gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 443</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL443"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL443grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL443gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 441</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL441"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL441grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL441gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 445</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL445"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL445grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL445gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 447</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL447"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL447grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL447gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 467</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL467"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL467grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL467gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 457</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL457"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL457grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL457gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 21</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_FOURTH_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1"];?></label>
                                        </div>
                                    </div>
                                    <p></p>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label >FOURTH YEAR (SECOND SEMESTER)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label><strong>Code</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Scores</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>Grade</strong></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><strong>GP</strong></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 410</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL410"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL410grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL410gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 432</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL432"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL432grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL432gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 446</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL446"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL446grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL446gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 462</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL462"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL462grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL462gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 464</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL464"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL464grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL464gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                        <label>PHIL 468</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL468"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL468grade"];?></label>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $_SESSION["PHIL468gp"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL CU: 18</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>TOTAL GP: <?php echo $_SESSION["TOTAL_GP_FOURTH_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group text-center col-md-12">
                                        <label>SEMESTER GPA: <?php echo $_SESSION["SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2"];?></label>
                                        </div>
                                    </div>
                                </form>    
                                </div>
                            </div>
                        </div>
                        <!-- End of FOURTH YEAR body -->
                        



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