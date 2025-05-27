<?php

// Initialize the session
session_start();


$to = 'chiemela123@gmail.com';
$subject = 'User Authentication On Your Eliam Transcript Account';
$from = 'support@eliamtechnologies.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi Seat of Wisdom Seminary (Philosophy Department)!</h1>';
$message .= '<p style="color:#080;font-size:18px;">Your account was just authenticated moments ago. If this was not done by you please click on this link to change your password. 
<p>                  
https://transcript.eliamtechnologies.com/azazer/reset-password.php</p>
<p>
Also contact support for more advice on how to keep your account safe.</p>
<p>
https://eliamtechnologies.com/support</p>
OR
<p>
support@eliamtechnologies.com</p>
</p>';
$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    header("location: login.php");
    exit;
} else{
    header("location: ../auth.php");
    exit;
}
?>