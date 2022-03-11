<?php
    require "../data/connection.php";

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

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Teams Thesis Archiving System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="png" href="../resources/<?php echo $fetchLogo['logo_4']?>"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding:20px;">
            <div class="container-fluid">
                <img class="img-fluid" style="height:50px;" src="../resources/<?php echo $fetchLogo['logo_1']?>"/>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="margin-left:30px;">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item" style="margin-left:30px;">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item" style="margin-left:30px;">
                            <a class="nav-link" href="#">Support</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <button style="color: #000; background-color: <?php echo $fetchColor['color_9']?>;border-radius: 12px;padding: 10px;border: 1px solid <?php echo $fetchColor['color_9']?>;">Sign in</button>
                        <button style="color: #fff; background-color: <?php echo $fetchColor['color_5']?>;border-radius: 12px;padding: 10px;border: 1px solid <?php echo $fetchColor['color_5']?>;">Sign up</button>
                    </div>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
