<?php
    session_start();
    require "connection.php";

    $backgroundQuery = "SELECT * FROM teamsbackground where backgroundId = 1";
    $background = mysqli_query($connect, $backgroundQuery);
    $fetchBackground = mysqli_fetch_assoc($background);

    $colorQuery = "SELECT * FROM themecolor where colorId = 1";
    $color = mysqli_query($connect, $colorQuery);
    $fetchColor = mysqli_fetch_assoc($color);

    $logoQuery = "SELECT * FROM teamslogo where logoId = 1";
    $logo = mysqli_query($connect, $logoQuery);
    $fetchLogo = mysqli_fetch_assoc($logo);

    $posterQuery = "SELECT * FROM teamsposter where posterId = 1";
    $poster = mysqli_query($connect, $posterQuery);
    $fetchPoster = mysqli_fetch_assoc($poster);

    $requestQuery = "SELECT COUNT(requestId) as pendingRequest FROM thesisrequest";
    $request = mysqli_query($connect, $requestQuery);
    $fetchRequest = mysqli_fetch_assoc($request);

    $usersQuery = "SELECT COUNT(userId) as registered FROM teamsuser";
    $users = mysqli_query($connect, $usersQuery);
    $fetchUsers = mysqli_fetch_assoc($users);

    $booksQuery = "SELECT COUNT(bookId) as booksCount FROM thesisLibrary WHERE bookStatus = 'available'";
    $books = mysqli_query($connect, $booksQuery);
    $fetchBooks = mysqli_fetch_assoc($books);

?>