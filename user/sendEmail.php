<?php 
require "../teamsDataCenter/connection.php";
include_once("../tool.php");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

tools\Gmail::sendEmail($email, "123456789");
?>