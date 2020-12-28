<?php
// /* Attempt MySQL server connection. Assuming you are running MySQL
// server with default setting (user 'root' with no password) */
// $mysqli = new mysqli("localhost", "root", "", "blendedcodes");
 
// // Check connection
// if($mysqli === false){
//     die("ERROR: Could not connect. " . $mysqli->connect_error);
// }
 
// // Print host information
// echo "Connect Successfully. Host info: " . $mysqli->host_info;
//

//enable to use headers
ob_start();

//set sessions
if(!isset($_SESSION)){
    session_start();
}

$hostname = "localhost";
$username = "blendedcodes";
$password = "";
$dbname = "lavender_foodie";

$connection = mysqli_connect($hostname, $username, $password, $dbname) or die ("Database connection not established.");


?>

