<?php 
// Start the session
session_start();

if(empty($_SESSION["user_name"])){
	echo "user name is empty";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
$_SESSION["college_name"] = $_POST["college_name"];
	$_SESSION["city"] = $_POST["city"];
	$_SESSION["state"] = $_POST["state"];
	// Redirect user to enter password page
header("location: test3.php");
}
?>
<!DOCTYP html>
<html>
	<head>
		<title>test 2</title>
		
	</head>
	<body>
		<!-- Form for other details--> 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
       
	   <pre> 
		   Company/College:  
		   <input type="text" name="college_name" value=<?php echo $_SESSION['college_name'];?>> 
	   </pre> 
		 
	   <pre> 
		   City:  
		   <input type="text" name="city" value=<?php echo $_SESSION['city'];?>> 
	   </pre> 
		 
	   <pre> 
		   State:  
		   <input type="text" name="state" value=<?php echo $_SESSION['state'];?>> 
	   </pre> 
			  
	   <pre> 
		   You're a:  
		   <input type="radio" name="profession"
				   value="Student">Student 
			 
		   <input type="radio" name="profession"
				   value="Working Professional"> 
				   Working Professional 
	   </pre> 
		  
	   <pre> 
		   Course:  
		   <select name="course"> 
			   <option value="DSnA"> 
				   Data Structures and Algorithms 
			   </option> 
				 
			   <option value="Gate_test"> 
				   GATE Mock Test 
			   </option> 
				 
			   <option value="Mock_interview"> 
				   Mock Interviews 
			   </option> 
				 
			   <option value="Machine_learning"> 
				   Machine Learning 
			   </option> 
		   </select> 
	   </pre> 
	   <br> 
			  
	   <pre> 
		   <input type="checkbox" 
			   name="terms_and_conditions">  
			   Terms and Conditions  
	   </pre> 
	   <br> 
		 
	   <input type="submit" value="Register"> 
	  
   </form> 
	</body>
</html>