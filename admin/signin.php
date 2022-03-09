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

        <title>Sign in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="png" href="../resources/<?php echo $fetchLogo['logo_4']?>"/>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        
    </head>
    <body>
        <!-- main container -->
        <div class="container-fluid row signin">

            <!-- left side -->
            <div style="padding: 50px;" class="col-md-6">
                <img src="../resources/<?php echo $fetchLogo['logo_1']?>" class="img-fluid" style="height: 50px;"/>
                <h3 style="font-weight: 700; margin-top: 20%;">Sign in</h3>
                <div class="form-outline">
                    <form action="signin.php" method="post">
                        <label style="margin-top:30px; font-size:9pt;" class="FormLabel form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:8pt; padding:10px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Email" required="Required">
                        
                        <label style="margin-top:20px; font-size:9pt;" class="FormLabel form-label"><i class='bx bx-lock-alt'></i> Password</label>
                        <input style="font-size:8pt; padding:10px;" name="password" type="password" ondrop="return false;" oninvalid="IninvalidMsg(this);" oninput="IninvalidMsg(this);" onpaste="return false;" class="form-control" placeholder="Password" required="Required">
                        <p style="margin-left:10px; margin-top:10px; font-size:9pt;"><a href="forgot.html" style="color:<?php echo $fetchColor['color_7']?>; text-decoration:none;">Forgot Password?</a></p>

                        <input style="margin-top:20px; font-size:12pt; padding:10px; width:100%; background-color: <?php echo $fetchColor['color_5']?>; border-color: <?php echo $fetchColor['color_5']?>;" name="login" type="submit" value="Sign in" class="btn btn-primary">
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
