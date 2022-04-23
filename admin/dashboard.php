<?php require_once ("../teamsDataCenter/controller.php"); ?>
<?php
    $email = $_SESSION['email'];
    $searchMail = mysqli_query($connect, "SELECT * FROM teamsadmin WHERE adminEmail = '$email'");
    if(mysqli_num_rows($searchMail) > 0){
        $adminInfo = mysqli_fetch_assoc($searchMail);
        $adminEmail = $adminInfo['adminEmail'];
        $adminFirstname = $adminInfo['adminFirstname'];
        $adminLastname = $adminInfo['adminLastname'];
    }else{
        header('location: signin.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons Package From Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- External Files -->
        <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/style.css"/>

        <!-- sweetalert libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body>
        <?php include "menu.php"; ?>
        <section class="home-section">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;">Dashboard</div>
            <div class="container-fluid row">
                <div class="col" style="background-color:#97C7FB; padding:3%; color:#fff; text-align:center; margin:2%; border-radius:5px;"><label style="font-size:20px;">Registered Accounts</label><br><label style="font-size:100px;"><?php echo $fetchUsers['registered']?></label><br><a href="#" style="text-decoration:none; color:#fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>
                 <div class="col" style="background-color:#FD8978; padding:3%; color:#fff; text-align:center; margin:2%; border-radius:5px;"><label style="font-size:20px;">Total Books Borrowed</label><br><label style="font-size:100px;"><?php echo $fetchBorrow['borrowCount']?></label><br><a href="#" style="text-decoration:none; color:#fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>
                 <div class="col" style="background-color:#7788F4; padding:3%; color:#fff; text-align:center; margin:2%; border-radius:5px;"><label style="font-size:20px;">Available Books</label><br><label style="font-size:100px;"><?php echo $fetchBooks['booksCount']?></label><br><a href="#" style="text-decoration:none; color:#fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>
            </div>
        </section>
    </body>

    <!-- navigation of menu -->
    <script src="../teamsScript/navigation.js"></script>
</html>