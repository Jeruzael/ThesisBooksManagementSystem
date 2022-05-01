<?php
    require "../teamsDataCenter/control.php";

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
              <div class="text" style="font-size: 40px; color: #FD8978;">Dashboard</div>
              <div class="search__container">
                <input class="search__input" type="text" placeholder="Search Thesis Books">
              </div>
              <div class="container-fluid" style="padding: 5%; overflow-x: scroll; ">
              <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px;">
                  <thead style="background-color: <?php echo $fetchColor['color_5']?>; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Date Published</th>
                    <th>Cover Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php
                    $dataQuery = "SELECT *, DATE_FORMAT(bookPublished, '%M %Y') as publish FROM thesislibrary";
                    $data = mysqli_query($connect, $dataQuery);
                    for($i = 0; $row = mysqli_fetch_array($data); $i++){
                    ?>
                    <tr style="border-bottom:2px solid whitesmoke;">
                      <td><?php echo $row['bookId']; ?></td>
                      <td style="text-align:left; width:600px"><?php echo ucwords($row['bookTitle']); ?></td>
                      <td><?php echo $row['publish']; ?></td>
                      <td><img class="img-fluid" style="height: 50px;" src="../resources/<?php echo $row['bookCover']; ?>"/></td>
                      <td><?php echo ucwords($row['bookStatus']); ?></td>
                      <td><button style="padding: 5px; width: 70px; color: #fff; background-color: <?php echo $fetchColor['color_7']?>; border: <?php echo $fetchColor['color_7']?>;">View</button></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="pagination">
                <ul> <!--pages or li are comes from javascript --> </ul>
              </div>
          </section>
          <script src="pagination.js"></script>
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