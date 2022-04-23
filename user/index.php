<?php
    require "../teamsDataCenter/connection.php";

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
        <link rel="stylesheet" type="text/css" href="design.css"/>
    </head>
    <body style="background-color: <?php echo $fetchColor['color_9']?>;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding:40px; background-color: <?php echo $fetchColor['color_9']?> !important;">
            <div class="container-fluid">
                <img class="img-fluid" style="height:50px;margin-left:40px;" src="../resources/<?php echo $fetchLogo['logo_1']?>"/>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="margin-left:40px;">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item" style="margin-left:40px;">
                            <a class="nav-link" href="about.php">About us</a>
                        </li>
                        <li class="nav-item" style="margin-left:40px;">
                            <a class="nav-link" href="support.php">Support</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="signin.php" style="text-decoration:none;"><button class="form-control me-2" style="background-color: <?php echo $fetchColor['color_9']?>;border: 1px solid <?php echo $fetchColor['color_9']?>;padding:15px;">Sign in </button></a>
                        <a href="signup.php" style="text-decoration:none;"><button class="btn" style="width:200px;background-color: <?php echo $fetchColor['color_5']?>;border: 1px solid <?php echo $fetchColor['color_5']?>;padding:15px;color:#fff;border-radius: 12px;">Sign up</button></a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid row">
            <div class="col-md" style="padding:10%;">
                <div class="search__container"><input class="search__input" type="text" placeholder="Search Thesis Books..."></div>
                <p style="font-weight: 700;font-size: 50px;line-height: 59px;">Thesis <label style="color: <?php echo $fetchColor['color_7']?>;">Archiving</label> System</p>
                <p style="font-weight: 400;font-size: 20px;line-height: 30px;">An interactive books management<br>system for the Computer Studies<br>Department.</p>
            </div>
            <div class="col-md-6"><img class="img-fluid" src="../resources/<?php echo $fetchPoster['poster_1']?>"/></div>
        </div>
        <div class="container-fluid" style="font-weight: 700;font-size: 45px;line-height: 53px;text-align: center; padding:10%;">Thesis Archiving System is the new home for your learning needs from the thesis books
        <p style="font-weight: 400;font-size: 30px;line-height: 45px; margin-top:50px;">Connect, enable learning, and share knowledge</p>
        <button style="border-radius: 12px;background-color:<?php echo $fetchColor['color_5']?>;border: 1px solid <?php echo $fetchColor['color_5']?>;font-weight: 400;font-size: 20px;line-height: 35px;padding:20px;color:#fff;width:300px;margin-top:50px;"><a href="borrow.php" style="text-decoration:none; color: #fff;">Borrow books</a></button>
        </div>

        <!-- footer -->
        <div class="container-fluid row" style="background-color: <?php echo $fetchColor['color_7']?>;color:#fff;padding:0px;margin:0px;">
        <div class="col-md" style="padding:5%;">
            <img class="img-fluid" src="../resources/<?php echo $fetchLogo['logo_5']?>" style="height: 100px;"/>
            <p>Thesis Archiving System is the new home for your learning needsfrom the thesis books</p>
            <a href="#" style="text-decoration:none;color:#fff;">Learn more<i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="col-md" style="padding:5%; text-align:center">
            <p style="font-weight: 700;font-size: 24px;line-height: 28px;">CONNECT WITH US</p>
            <div class="row">
                <div class="col" style="padding:10px;"><i class='bx bxl-facebook-circle' style="font-size:40px;"></i></div>
                <div class="col" style="padding:10px;"><i class='bx bxl-instagram' style="font-size:40px;"></i></div>
                <div class="col" style="padding:10px;"><i class='bx bxl-twitter' style="font-size:40px;"></i></div>
            </div>
        </div>
        <div class="col-md" style="padding:5%;">
            <p style="font-weight: 700;font-size: 24px;line-height: 28px;">CONTACT</p>
            <div class="row">
            <div class="col-1"><i class='bx bx-map' style="font-size:30px;"></i></div><div class="col"><p style="font-weight: 400;font-size: 15px;line-height: 18px;">Congressional Rd Ext, Barangay 171 Caloocan, Metro Manila</p></div></div>
            <div class="row">
            <div class="col-1"><i class='bx bx-phone' style="font-size:30px;"></i></div><div class="col"><p style="font-weight: 400;font-size: 15px;line-height: 18px;">+639123243423</p></div></div>
            <div class="row">
            <div class="col-1"><i class='bx bx-envelope' style="font-size:30px;"></i></div><div class="col"><p style="font-weight: 400;font-size: 15px;line-height: 18px;">teams@gmail.com</p></div></div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
