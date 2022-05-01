<?php 
include_once("../teamsDataCenter/connection.php");

$email = $_POST['email'];
$passPost = $_POST['password'];

$emailQuery = "SELECT email FROM useraccounts WHERE email = '" . $email . "'";
$passQuery = "SELECT password FROM useraccounts WHERE email = '" . $email . "'";

$getEmail = $connect->query($emailQuery);
$fetchEmail = mysqli_fetch_assoc($getEmail);

$pass = $connect->query($passQuery);
$fetchPass = mysqli_fetch_assoc($pass);

$acc = $fetchEmail['email'];
$pass2 = $fetchPass['password'];



if($passPost == $pass2){
	header("Location: dashboard.php", true);
}else{
	header("Location: signin.php");	
}

?>

