<?php
// Initialize the session
session_start();

// Destroying session
session_destroy();

 
// Include config file
require_once "config.php";


// Define variables and initialize with empty values
$email = "";
$email_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){ 
                
                  // Check if license has expired
                  $sqlLicense = "SELECT * FROM license WHERE email ='$email'";
                  if($resultLicense = mysqli_query($link, $sqlLicense)){
                    if(mysqli_num_rows($resultLicense) > 0){
                      while($rowLicense = mysqli_fetch_array($resultLicense)){
                          // Assign old license date
                          $oldDate = $rowLicense['valid_until'];
                          $loggedin = $rowLicense['session_id'];
                          // Assign variables from database
                          $urlRedirect = $rowLicense['url'];
                          // Assign current license date
                          $newDate = date("Y-m-d");
                          // Assign date sections into variable
                          $time=strtotime($oldDate);
                          $month=date("F",$time);
                          $year=date("Y",$time);
                          $day=date("j",$time);
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
                      
                    // Redirect user to home page
                     header("location: ".$urlRedirect."/license.php");
                     
                  } elseif($oldDate > $newDate){ 
                
                    // Get username
                    $sqlUsers = "SELECT * FROM users WHERE email ='$email'";
                    if($resultUsers = mysqli_query($link, $sqlUsers)){
                      if(mysqli_num_rows($resultUsers) > 0){
                        while($rowUsers = mysqli_fetch_array($resultUsers)){
                            // Assign old license date
                            // Start session
                            session_start();
                            $_SESSION["username"] = $rowUsers['username'];
                        }
                        // Free result set
                        mysqli_free_result($resultUsers);
                      } else{
                          echo "<p class='lead'><em>No records were found.</em></p>";
                      }
                    } else{
                        echo "ERROR: Could not able to execute $sqlUsers. " . mysqli_error($link);
                    }




                    
                    // Email exists, so start a new session
                    session_start();
                            
                    // Store data in session variables
                    $_SESSION["loggedin"] = $loggedin;
                    $_SESSION["email"] = $email;
                    $_SESSION["email_err"] = " ";
  
                    // Redirect user to enter password page
                    header("location: ".$urlRedirect."/authmail.php");

                  }
            
                }
              }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Transcript | Eliam Technologies</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Eliam-Technologies-favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="Eliam-Technologies-favicon.png"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
	<link rel="stylesheet" type="text/css" href="css/all.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <div class="text-center">
						<img src="img/eTranscript.png">
          </div>
          <h5 class="card-title text-center">Eliam Transcript Sign In</h5>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login-form" method="post" class="form-signin">
            <div class="form-label-group form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address"  required autofocus value="<?php echo $email; ?>">
              <label for="inputEmail">Email address</label>
              <span class="help-block"><?php echo $email_err; ?></span>
            </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase form-group" type="submit" value="Login">Sign in</button>
            <hr class="my-4 text-center">
            &copy; 2021 <a href="https://www.eliamtechnologies.com">Eliam Technologies</a>. All Rights Reserved. 
            <p>
            <p> <a href="https://eliamtechnologies.com/privacy-and-cookies/">Privacy & Cookie Policy</a>
                </br><a href="https://eliamtechnologies.com/terms-of-use/">Terms of Use</a>
                </br><a href="https://www.eliamtechnologies.com">Return Home</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.slim.min.js"></script>  