<?php
    require "../data/control.php";

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="png" href="../resources/<?php echo $fetchLogo['logo_4']?>"/>
        <link rel="stylesheet" type="text/css" href="design.css"/>
        
    </head>
    <body style="background-color: <?php echo $fetchColor['color_9']?>">
        <div class="sidebar" style="background-color: <?php echo $fetchColor['color_7']?>">
            <div class="logo-details">
              <img src="../resources/<?php echo $fetchLogo['logo_5']?>" class="img-fluid" style="height: 60px;">
                <i class='bx bx-menu' id="btn" ></i>
            </div>
            <ul class="nav-list">
              <li>
                <a href="dashboard.php">
                  <i class='bx bx-home'></i>
                  <span class="links_name">Home</span>
                </a>
                 <span class="tooltip">Home</span>
              </li>
              <li>
               <a href="books.php">
                 <i class='bx bx-book' ></i>
                 <span class="links_name">Book</span>
               </a>
               <span class="tooltip">Book</span>
             </li>
             <li>
               <a href="#" id="feat-btn">
                <i class='bx bx-book-bookmark' ></i>
                 <span class="links_name">Books Management</span>
                 
               </a>
               <ul class="book-show">
                <li><a href="brequest.php"><i class='bx bx-chevron-right' ></i>Book Request</a></li>
                <li><a href="bborrowed.php"><i class='bx bx-chevron-right' ></i>Borrowed Books</a></li>
                <li><a href="blate.php"><i class='bx bx-chevron-right' ></i>Late Returnees</a></li>
                <li><a href="blost.php"><i class='bx bx-chevron-right' ></i>Lost Books</a></li>
               </ul>
               <span class="tooltip">Books Management</span>
             </li>
             <li>
               <a href="user.php">
                <i class='bx bx-group' ></i>
                 <span class="links_name">Manage User</span>
               </a>
               <span class="tooltip">Manage User</span>
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
                 <i class='bx bx-log-out' id="log_out" ></i>
             </li>
            </ul>
          </div>
          <section class="home-section"style="padding: 5%;">
              <div class="text" style="font-size: 40px; color: #7788F4;">Dashboard</div>
              <div class="container-fluid row">
              <div class="col bixi" style="background-color: #AED5FF; padding: 3%; color: #fff; text-align: center; margin: 2%; border-radius: 5px;"><label style="font-size: 20px;">Registered Accounts</label><br><label style="font-size: 100px;"><?php echo $fetchUsers['registered']?></label><br><a href="#" style="text-decoration: none; color: #fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>
              <div class="col bixi" style="background-color: #Fd8978; padding: 3%; color: #fff; text-align: center; margin: 2%; border-radius: 5px;"><label style="font-size: 20px;">Total Books Borrowed</label><br><label style="font-size: 100px;">2</label><br><a href="#" style="text-decoration: none; color: #fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>
              <div class="col bixi" style="background-color: #7788F4; padding: 3%; color: #fff; text-align: center; margin: 2%; border-radius: 5px;"><label style="font-size: 20px;">Available Books</label><br><label style="font-size: 100px;"><?php echo $fetchBooks['booksCount']?></label><br><a href="#" style="text-decoration: none; color: #fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>
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
