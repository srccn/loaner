<?php 
require 'data/db.php';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = 'select GetConfirmingLoanUpperLimit("02163", "two_unit") ';
$result = $conn->query($query);

var_dump($result->fetch_all());

$conn->close();

?>