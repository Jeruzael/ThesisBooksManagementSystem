<?php
    require "../teamsDataCenter/connection.php";

    $firstname = "jeffrix";
    $lastname = "briol";
    $email = "bbriol30@gmail.com";
    $password = "admin1234";
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO teamsadmin(adminFirstname, adminLastname, adminEmail, adminPassword)values('$firstname','$lastname','$email','$encrypted_password')";
    $runquery = mysqli_query($connect, $query);
?>