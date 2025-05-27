<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != 200){
    header("location: ../auth.php");
    exit;
}

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $_SESSION["email"];
$password = $email_err = "";
$password_err = "";



 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($password_err)){
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
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){                   
                            session_start();      
                            // Store data in session variables
                            $_SESSION["loggedin"] = 400;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = 201;
                            // Redirect user to welcome page
                            header("location: xoqrzy/admin/home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <link rel="icon" type="image/png" href="../Eliam-Technologies-favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="../Eliam-Technologies-favicon.png"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    
	<link rel="stylesheet" type="text/css" href="../css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <div class="text-center">
						<img src="img/logo.png">
          </div>
          <h5 class="card-title text-center">Hi, SWS Philosophy!</h5>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login-form" method="post" class="form-signin">

            <div class="form-label-group form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required autofocus>
                <label for="inputPassword">Password</label>
                <span class="help-block"><?php echo $password_err; ?></span>
              </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase form-group" type="submit" value="Login">Continue</button>
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



<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.slim.min.js"></script>  