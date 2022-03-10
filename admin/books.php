<?php
    require "../data/control.php";

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Thesis Library</title>
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
              <div class="text" style="font-size: 40px; color: #7788F4;">Books</div>
              <div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
              <div class="search__container col-md-9">
                <input class="search__input" type="text" placeholder="Search thesis books...">
              </div>
            <div class="credits__container col-md-3" style="text-align: center;">
                <button style="border: 1px solid #FD8978; padding: 10px; width: 200px; background-color: #FD8978; color: #FFF; border-radius: 10px;"><i class='bx bx-plus'></i>Add New Book</button>
            </div>
            </div>
              <div class="container-fluid" style="padding: 5%; overflow-x: scroll; ">
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px;">
                  <thead style="background-color: #7788F4; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
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
                      <td><button style="padding: 5px; width: 70px; color: #fff; background-color: #FD8978; border: #FD8978;"><i class='bx bx-pencil' ></i>Edit</button></td>
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