<?php
//Creating a connection to the database
	 
$username="root";	$password="8800";	$database="typemaster";
$conn = new mysqli('localhost', $username, $password, $database);
	
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
}
?>