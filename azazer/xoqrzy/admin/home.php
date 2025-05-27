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


// Create variables
$admissionYear1 = "";
$admissionYear2 = "";
$admissionYear3 = "";
$admissionYear4 = "";
$studentName = "";
$matricNumber = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // assign variables
    $admissionYear1 = trim($_POST["admissionYear1"]);
    $admissionYear2 = trim($_POST["admissionYear2"]);
    $admissionYear3 = trim($_POST["admissionYear3"]);
    $admissionYear4 = trim($_POST["admissionYear4"]);
    $studentName = trim($_POST["studentName"]);
    $matricNumber = trim($_POST["matricNumber"]);

    // Store data in session variables
    $_SESSION["admissionYear1"] = $admissionYear1;
    $_SESSION["admissionYear2"] = $admissionYear2;
    $_SESSION["admissionYear3"] = $admissionYear3;
    $_SESSION["admissionYear4"] = $admissionYear4;
    $_SESSION["studentName"] = $studentName;
    $_SESSION["matricNumber"] = $matricNumber;

    
    // Redirect user to enter YEAR ONE page
    header("location: ALeKk03hMYn1zdeTjUrM0teKXrlazVXLrg13A1605844888160eiseaofwisdomseminaryphilosophydepartment3A1605844888160dashboard.php");
    
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
                                    </div>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="form-group">
                                        <label>1st Year</label>
                                        <input type="text" class="form-control" name="admissionYear1" placeholder="YY/YY" required autofocus >
                                    </div>
                                    <div class="form-group">
                                        <label>2nd Year</label>
                                        <input type="text" class="form-control" name="admissionYear2" placeholder="YY/YY" required autofocus >
                                    </div>
                                    <div class="form-group">
                                        <label>3rd Year</label>
                                        <input type="text" class="form-control" name="admissionYear3" placeholder="YY/YY" required autofocus >
                                    </div>
                                    <div class="form-group">
                                        <label>4th Year</label>
                                        <input type="text" class="form-control" name="admissionYear4" placeholder="YY/YY" required autofocus >
                                    </div>
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input type="text" class="form-control" name="studentName" placeholder="Name of student" required autofocus >
                                    </div>
                                    <div class="form-group">
                                        <label>Matric Number</label>
                                        <input type="text" class="form-control" name="matricNumber" placeholder="Student matriculation number" required autofocus >
                                    </div>
                                    <div class="form-row"><div class="col-md-4"></div>
                                        <button type="submit" class="col-md-4 justify-content-center btn btn-primary">Next <i
                                class="fas fa-arrow-right fa-sm text-white-50"></i> Year One</button><div class="col-md-4"></div>
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