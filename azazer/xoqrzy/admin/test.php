<?php 
// Start the session
session_start();



if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
$_SESSION["user_name"] = $_POST["user_name"];
$_SESSION["user_email_address"] = $_POST["user_email_address"];
$_SESSION["user_mobile_number"] = $_POST["user_mobile_number"];
// Redirect user to enter password page
header("location: test2.php");
}
?>
<!DOCTYP html>
<html>
	<head>
		<title>test 1</title>
		
	</head>
	<body>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
    <pre>Name: <input type="text"
        name="user_name" value=<?php echo $_SESSION['user_name'];?>> 
    </pre> 
      
    <pre>Email Address: <input type="text"
        name="user_email_address" value=<?php echo $_SESSION['user_email_address'];?>> 
    </pre> 
      
    <pre>Mobile Number: <input type="number"
        name="user_mobile_number" value=<?php echo $_SESSION['user_mobile_number'];?>> 
    </pre> 
      
    <input type="submit" value="Next"> 
</form> 

	</body>
</html>