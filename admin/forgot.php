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

        <title>Forgot Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="png" href="../resources/<?php echo $fetchLogo['logo_4']?>"/>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        
    </head>
    <body style="background-color: <?php echo $fetchColor['color_9']?>">
        <!-- main container -->
        <div class="container-fluid row signin" style="background-color: <?php echo $fetchColor['color_9']?>">

            <!-- left side -->
            <div style="padding: 50px;" class="col-md-6">
                <img src="../resources/<?php echo $fetchLogo['logo_1']?>" class="img-fluid" style="height: 50px;"/>
                <h3 style="font-weight: 600; font-size: 32px; line-height: 48px; margin-top: 20%;">Forgot Password</h3>
                <div class="form-outline">
                    <form action="forgot.php" method="post">
                        <p style="margin-top:30px; color: <?php echo $fetchColor['color_5']?>; font-size: 10pt;">Please provide your valid email address</p>
                        <label style="font-size:16px; line-height: 24px;" class="FormLabel form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:13px; line-height: 20px; padding:10px; border-bottom: 1px solid rgba(167, 172, 182, 0.99); border-left: 0px; border-top: 0px;border-right: 0px; background-color: <?php echo $fetchColor['color_9']?>; border-radius:0px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Email" required="Required">
                        
                        <input style="margin-top:20px; font-size: 22px; line-height: 33px; padding:10px; width:100%; background-color: <?php echo $fetchColor['color_5']?>; border-color: <?php echo $fetchColor['color_5']?>;" name="adminOtp" type="submit" value="Send OTP" class="btn btn-primary">
                    </form>
                </div>
            </div>

            <!-- right side -->
            <div style="padding:10%; background-color:<?php echo $fetchBackground['background_1']?>;" class="col-md-6">
                <img style="margin-top:20px;" class="img-fluid" src="../resources/<?php echo $fetchPoster['poster_2']?>"/>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>