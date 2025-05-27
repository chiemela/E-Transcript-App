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
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="license-info.php">
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

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">License Info</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Begin of FIRST YEAR body -->
                        <div class="col-lg-12 mb-4">
                            
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col-md-5">
                                        </div>
                                        <div class="col-md-5">
                                        </div>
                                        
                                    </div>
                                    <div class="text-center">
                                        <img src="img/logo.png">
                                    </div>
                                    </br>
                                    </br>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        <h1><strong>License Agreement</strong></h1>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label><strong>Prepared for:</strong></label>
                                        <br/>
                                        <label><strong>Philosophy - Seat of Wisdom Seminary</strong></label>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label><strong>Created by:</strong></label>
                                        <br/>
                                        <label><strong>Eliam Technologies</strong></label>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <h1><strong>License Agreement</strong></h1>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label>For use of Educational Transcript System.</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label >This License Agreement (this “Agreement” of this “License Agreement”) is made and effective as of 20th November, 2020 (the “Commencement Date”) by and between Eliam Technologies, a company organized and existing in Nigeria, with a registered address at  #34 Ikenegbu Item Street Opposite Diamond Access Bank Owerri, Imo (“Licensor”) and Philosophy - Seat of Wisdom Seminary, a company organized and existing in Nigeria, with a registered address at Seat of Wisdom Seminary, Ulakwo, Owerri, Imo (“Licensee”).</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <h1>WHEREAS:</h1>
                                        <br/>
                                        <label >1.	Licensee wishes to obtain a license to use Educational Transcript System (hereinafter, the “Asset”), and</label>
                                        <br/>
                                        <label >2.	Licensor is willing to grant to the Licensee a non-exclusive, non-transferable License to use the Asset for the term and specific purpose set forth in this Agreement,</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <br/>
                                        <label ><strong>NOW, THEREFORE,</strong> in consideration of the foregoing, and of the mutual promises and undertakings contained herein, and other good and valuable consideration, the parties agree as follows:</label>
                                        <br/>
                                        <label >2.	Licensor is willing to grant to the Licensee a non-exclusive, non-transferable License to use the Asset for the term and specific purpose set forth in this Agreement,</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <h1>1. Definitions:</h1>
                                        <br/>1.1 “Agreement” means this License Agreement including the attached Schedule.
                                        <br/>1.2 “Confidential Information” means information that:
                                        <br/>
                                        a. is by its nature confidential;
                                        <br/>
                                        b. is designated in writing by Licensor as confidential;
                                        <br/>
                                        c. the Licensee knows or reasonably ought to know is confidential;
                                        <br/>
                                        d. Information comprised in or relating to any Intellectual Property Rights of Licensor.
                                        <br/>
                                        <br/>
                                        <p>
                                        1.3 “Asset” means the Asset provided by Licensor as specified in Item 6 of the Schedule in the form as stated in Item 7 of the Schedule.
                                        </p>
                                        <p>
                                        1.4 “Intellectual Property Rights” means all rights in and to any copyright, trademark, trading name, design, patent, know how (trade secrets) and all other rights resulting from intellectual activity in the industrial, scientific, literary or artistic field and any application or right to apply for registration of any of these rights and any right to protect or enforce any of these rights, as further specified in clause 5.
                                        </p>
                                        <p>
                                        1.5 “Party” means a person or business entity who has executed this Agreement; details of the Parties are specified in Item 2 of the Schedule.
                                        </p>
                                        <p>
                                        1.6 “Term” means the term of this Agreement commencing on the Commencement Date as specified in Item 4 of the Schedule and expiring on the Expiry Date specified in Item 5 of the Schedule.
                                        </p>
                                        <p>
                                            <h3>
                                                <strong>
                                                    2. License Grant
                                                </strong>
                                            </h3>
                                        </p>
                                        2.1 Licensor grants to the Licensee a non-exclusive, non-transferable License for the Term to use the Asset for the specific purpose specified in this Agreement, subject to the terms and conditions set out in this Agreement.
                                        <p>
                                            <h3>
                                                <strong>
                                                    3. Charges
                                                </strong>
                                            </h3>
                                        </p>
                                        3.1 In consideration of the Licensor providing the License under clause 2 of this License Agreement, the Licensee agrees to pay Licensor the amount of the License Charge as specified in Item 9 of the Schedule.
                                        <p>
                                            <h3>
                                                <strong>
                                                    4. Licensee’s Obligations
                                                </strong>
                                            </h3>
                                        </p>
                                        4.1 The Licensee cannot use the Asset, for purposes other than as specified in this Agreement and in Item 8 of the Schedule.
                                        <br/>
                                        <br/>
                                        4.2 The Licensee may permit its employees to use the Asset for the purposes described in Item 8, provided that the Licensee takes all necessary steps and imposes the necessary conditions to ensure that all employees using the Asset do not commercialise or disclose the contents of it to any third person, or use it other than in accordance with the terms of this Agreement.
                                        <br/>
                                        <br/>
                                        4.3 The Licensee will not distribute, sell, License or sub-License, let, trade or expose for sale the Asset to a third party.
                                        <br/>
                                        <br/>
                                        4.4 No copies of the Asset are to be made other than as expressly approved by Licensor.
                                        <br/>
                                        <br/>
                                        4.5 No changes to the Asset or its content may be made by Licensee.
                                        <br/>
                                        <br/>
                                        4.6 The Licensee will provide technological and security measures to ensure that the Asset which the Licensee is responsible for is physically and electronically secure from unauthorized use or access.
                                        <br/>
                                        <br/>
                                        4.7 Licensee shall ensure that the Asset retains all Licensor copyright notices and other proprietary legends and all trademarks or service marks of Licensor.
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