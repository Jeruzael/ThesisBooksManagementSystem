<?php
     session_start();
     require "connection.php";

     $xmessage = array();

     // compute the total number of users
     $usersQuery = "SELECT COUNT(userId) as registered FROM teamsuser";
     $users = mysqli_query($connect, $usersQuery);
     $fetchUsers = mysqli_fetch_assoc($users);

     // compute total number of inborrowed books
     $borrowQuery = "SELECT COUNT(bookId) as borrowCount FROM thesisLibrary WHERE bookStatus = 'borrowed'";
     $borrow = mysqli_query($connect, $borrowQuery);
     $fetchBorrow = mysqli_fetch_assoc($borrow);

     // compute the total number of books
     $booksQuery = "SELECT COUNT(bookId) as booksCount FROM thesisLibrary WHERE bookStatus = 'available'";
     $books = mysqli_query($connect, $booksQuery);
     $fetchBooks = mysqli_fetch_assoc($books);

    // administration signing in to the system
     if(isset($_POST['adminLogin'])){

        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        $searchMail = mysqli_query($connect, "SELECT * FROM teamsadmin WHERE adminEmail = '$email'");
        if(mysqli_num_rows($searchMail) > 0){
            $adminInfo = mysqli_fetch_assoc($searchMail);

            $adminEmail = $adminInfo['adminEmail'];
            $adminPassword = $adminInfo['adminPassword'];
            if(password_verify($password, $adminPassword)){
                $_SESSION['email'] = $email;
                header('location: dashboard.php');
                exit();

            }else{
                $xmessage['message'] = "Invalid Email Address or Password!";
            }
        }else{
            $xmessage['message'] = "Invalid Email Address or Password!";
        }
     }


?>

