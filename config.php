<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'your_server_address'); // e.g., 'localhost' or '
define('DB_USERNAME', 'your_username'); // e.g., 'root'
define('DB_PASSWORD', 'your_password'); // e.g., 'password123'
define('DB_NAME', 'your_database_name'); // e.g., 'my_database'
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>