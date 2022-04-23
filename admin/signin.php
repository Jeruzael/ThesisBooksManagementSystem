<?php require_once "../teamsDataCenter/controller.php"; ?>
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Sign in</title>
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

    <body style="background-color:#F8FAFF;">
        <!-- main container -->
        <div class="container-fluid row" style="background-color:#F8FAFF; width:60%; margin-top:5%; margin-bottom:5%; margin-left:auto; margin-right:auto; box-shadow:0px 1px 9px -1px rgba(0, 0, 0, 0.25); border-radius:3px; padding:0px;">

            <!-- left side -->
            <div style="padding:50px;" class="col-md-6">

                <img src="../teamsResources/teamsLogo_4.png" class="img-fluid" style="height:50px;"/>
                <h3 style="font-weight:600; font-size:32px; line-height:48px; margin-top:20%;">Sign in</h3>

                <div class="form-outline">
                    <form action="signin.php" method="post">
                        <label style="margin-top:30px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="example@email.com" required="Required"/>

                        <label style="margin-top:20px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-lock-alt'></i> Password</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" name="password" type="password" ondrop="return false;" oninvalid="IninvalidMsg(this);" oninput="IninvalidMsg(this);" onpaste="return false;" class="form-control" placeholder="**********" required="Required"/>

                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#recovery" style="background-color:#F8FAFF; border:1px solid #F8FAFF; color:#7788F4;">Forgot Password?</button>

                        <input style="margin-top:20px; font-size:22px; line-height:33px; padding:10px; width:100%; background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="adminLogin" type="submit" value="Sign in" class="btn"/>
                    </form>
                </div>
            </div>

            <!-- right side -->
            <div style="padding:5%; background-color:rgba(119, 136, 244, 0.21);" class="col-md-6">
                <img style="margin-top: 45%;" class="img-fluid" src="../teamsResources/poster_2.png"/>
            </div>
        </div>

        <!-- error message -->
        <?php
            if(isset($xmessage['message'])){
                $message = $xmessage['message'];
                foreach($xmessage as $showerror){
                    echo "<script>swal('Something went wrong', '$message', 'error')</script>";
                }
                $xmessage = null;
            }
        ?>

        <!-- Forgot Password Modal -->
        <div class="modal fade" id="recovery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Forgot Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Please provide your valid email address</p>
                        <form action="signin.php" method="post">
                        <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; border-radius:0px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="example@email.com" required="Required"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Send OTP" data-bs-toggle="modal" data-bs-target="#verification"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forgot Password Modal -->
        <div class="modal fade" id="verification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Forgot Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Ple your valid email address</p>
                        <form action="signin.php" method="post">
                        <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; border-radius:0px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="example@email.com" required="Required"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Send OTP"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- external script -->
        <script src="../teamsScript/bootstrap.js"></script>
    </body>
</html>