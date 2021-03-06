<?php
    require "../data/control.php";

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="png" href="../resources/<?php echo $fetchLogo['logo_4']?>"/>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        
    </head>
    <body style="background-color: <?php echo $fetchColor['color_9']?>;">
        <div class="sidebar" style="background-color: <?php echo $fetchColor['color_5']?>">
            <div class="logo-details">
              <img src="../resources/<?php echo $fetchLogo['logo_5']?>" class="img-fluid" style="height: 50px;">
                <i class='bx bx-menu' id="btn" ></i>
            </div>
            <ul class="nav-list">
              
              <li>
               <a href="dashboard.php">
                 <i class='bx bx-home' ></i>
                 <span class="links_name">Dashboard</span>
               </a>
               <span class="tooltip">Dashboard</span>
             </li>
             
             <li>
               <a href="profile.php">
                <i class='bx bx-user-circle' ></i>
                 <span class="links_name">Profile</span>
               </a>
               <span class="tooltip">Profile</span>
             </li>
             
             <li class="profile">
                 <div class="profile-details">
                   <!--<img src="profile.jpg" alt="profileImg">-->
                   <div class="name_job">
                     <div class="name">Jerusael Dumale</div>
                     <div class="job">Programmer</div>
                   </div>
                 </div>
                 <i class='bx bx-log-out' id="log_out" style="background: <?php echo $fetchColor['color_5']?>;"></i>
             </li>
            </ul>
          </div>
          <section class="home-section"style="padding: 5%;">
              <div class="text" style="font-size: 40px; color: #FD8978;">Edit Profile</div>
              <div class="container-fluid" style="text-align: center;">
                <img class="img-fluid" src="../resources/avatar_0.png" style="height: 200px; border-radius: 50%;"/><br>
                <input class="upload" type="submit" style="padding: 10px; margin: 10px; border: 1px solid #FD8978; color: #FD8978; background-color: #fff; width: 200px;" value="upload"/>
              </div>
              <div class="container-fluid row" style="padding-left: 15%; padding-right: 15%;">
                <div class="col" style="padding-top: 20px;">
                  <label style="padding-left: 15px;">Firstname</label><br>
                  <input class="form-control" type="text" placeholder="Danica"/>
                </div>
                <div class="col" style="padding-top: 20px;">
                  <label style="padding-left: 15px;">Lastname</label><br>
                  <input class="form-control" type="text" placeholder="Cabullo"/>
                </div>
              </div>
              <div class="container-fluid row" style="padding-left: 15%; padding-right: 15%;">
                <div class="col" style="padding-top: 20px;">
                  <label style="padding-left: 15px;">Email Address</label><br>
                  <input class="form-control" type="email" placeholder="cabullo.danica.bscs2019@gmail.com" disabled/>
                </div>
                <div class="col" style="padding-top: 20px;">
                  
                </div>
              </div>
              <div class="container-fluid row" style="padding-left: 15%; padding-right: 15%;">
                <div class="col" style="padding-top: 20px;">
                  <label style="padding-left: 15px;">Password</label><br>
                  <input class="form-control" type="password" placeholder="**********"/>
                </div>
                <div class="col" style="padding-top: 20px;">
                  <label style="padding-left: 15px;">Confirm New Password</label><br>
                  <input class="form-control" type="password" placeholder="**********"/>
                </div>
              </div>
              <div class="container-fluid row" style="padding-left: 15%; padding-right: 15%;">
                <div class="col" style="padding-top: 30px;">
                  <input class="form-control" type="submit" value="Save Changes" style="background-color: #7788F4; border: 1px solid #7788F4; color: #fff;"/>
                </div>
              </div>
          </section>
          <script>
          let sidebar = document.querySelector(".sidebar");
          let closeBtn = document.querySelector("#btn");
          let searchBtn = document.querySelector(".bx-search");
          let showbtn = document.querySelector("#feat-btn");
          let bookshow = document.querySelector(".book-show");
        
          closeBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("open");
            menuBtnChange();//calling the function(optional)
          });

          showbtn.addEventListener("click", ()=>{
            bookshow.classList.toggle("show");
             
           });
        
          // following are the code to change sidebar button(optional)
          function menuBtnChange() {
           if(sidebar.classList.contains("open")){
             closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
           }else {
             closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
           }
          }
          </script>
    </body>
</html>