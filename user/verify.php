<?php 
include_once('../teamsDataCenter/connection.php');

session_start();

$firstname = $_SESSION['fn'];
$lastname = $_SESSION['ln'];
$email = $_SESSION['email'];
$password = $_SESSION['pass'];


if($_SESSION['OTPcode'] == $_POST['otp'])
{	
	$addUsersQuery = "INSERT INTO useraccounts (firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$password')";
	$connect->query($addUsersQuery);
	$connect->close();
	header("Location: signin.php", true);
}else {
	echo "Error Occured";
}

?>

