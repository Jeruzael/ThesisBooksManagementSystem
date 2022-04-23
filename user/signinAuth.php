<?php 
include_once("../teamsDataCenter/connection.php");

$e = $_REQUEST['e'];

$email = "SELECT email FROM useraccounts WHERE email = " + $e ;
$pass = $_POST['password'];

$acc = array(
	"email"=> $email,
	"password"=> $pass
	);

echo json_encode($acc);
?>