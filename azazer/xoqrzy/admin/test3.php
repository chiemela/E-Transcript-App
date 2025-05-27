<?php 
// Start the session
session_start();


?>
<!DOCTYP html>
<html>
	<head>
		<title>test 3</title>
		
	</head>
	<body>
		<form method="post">
		
		<pre>Name: <input type="text"
        name="user_name" value=<?php echo $_SESSION["user_name"];?>> 
		</pre> 
		
		<pre>Email Address: <input type="text"
			name="user_email_address" value=<?php echo $_SESSION["user_email_address"];?>> 
		</pre> 
		
		<pre>Mobile Number: <input type="number"
			name="user_mobile_number" value=<?php echo $_SESSION["user_mobile_number"];?>> 
		</pre> 
		
		<pre> 
		   Company/College:  
		   <input type="text" name="college_name" value=<?php echo $_SESSION["college_name"];?>> 
	   </pre> 
		 
	   <pre> 
		   City:  
		   <input type="text" name="city" value=<?php echo $_SESSION["city"];?>> 
	   </pre> 
		 
	   <pre> 
		   State:  
		   <input type="text" name="state" value=<?php echo $_SESSION["state"];?>> 
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