<?php require_once "../teamsDataCenter/controller.php"; ?>
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

<?php 
$bookIdQuery = "SELECT COUNT(bookId) FROM thesislibrary"; 
$addBookId = mysqli_query($connect, $bookIdQuery);
$fetchBookId = $addBookId->fetch_array(MYSQLI_NUM);
$bookIdCount = $fetchBookId[0] + 1;



if(!isset($_POST['editTitle']) && !isset($_POST['editAuthor']) && !isset($_POST['editProfessors']) && !isset($_POST['editPublish'])){
    echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">no data available to edit</div>";   
}else{
    $editBookId = $_POST['bookId'];
    $editBookTitle = $_POST['editTitle'];
    $editBookAuthor = $_POST['editAuthor'];
    $editBookProfessor = $_POST['editProfessors'];
    $editPublish = $_POST['editPublish'];

    $editBookQuery = "UPDATE thesislibrary SET bookTitle = '$editBookTitle', bookAuthor = '$editBookAuthor', bookProfessor = '$editBookProfessor', bookPublished = '$editPublish' WHERE bookId = '$editBookId'";

    if($connect->query($editBookQuery) === TRUE){
        echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">record successfully edited</div>";
    }else{
        echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">". $connect->error . "</div>";   
    }
}



?>
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Library</title>
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

        <!-- This section is for menus -->
        <?php include "menu.php"; ?>

        <section class="home-section">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;">Books</div>
            <div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
                <div class="search__container col-md-9">
                    <input class="search__input" class="search__input" onkeyup="searchbar__Function()" type="text" placeholder="Search thesis books...">
                </div>
                <div class="credits__container col-md-3" style="text-align: center;">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addBook" style="border: 1px solid #FD8978; padding: 10px; width: 200px; background-color: #FD8978; color: #FFF; border-radius: 10px;"><i class='bx bx-plus'></i>Add New Book</button>
                </div>
            </div>
            <div class="container-fluid" style="overflow-x: scroll; ">
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

                            if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                                $page_no = $_GET['page_no'];
                            }
                            else{
                                $page_no = 1;
                            }
                            $total_records_per_page = 10;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM thesislibrary");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;


                            $dataQuery = "SELECT *, DATE_FORMAT(bookPublished, '%M %Y') as publish FROM thesislibrary ORDER BY bookId ASC LIMIT $offset, $total_records_per_page";
                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">
                            <td><?php echo $row['bookId']; ?></td>
                            <td style="text-align:left; width:600px"><?php echo ucwords($row['bookTitle']); ?></td>
                            <td><?php echo $row['publish']; ?></td>
                            <td><img class="img-fluid" style="height: 50px;" src="../teamsResources/<?php echo $row['bookCover']; ?>"/></td>
                            <td><?php echo ucwords($row['bookStatus']); ?></td>
                            <td><button id="<?php echo "testId" . $row['bookId'] ?>" type="button" onclick="getIds(this)" class="btn" data-bs-toggle="modal" data-bs-target="#editBook" style="padding: 5px; width: 70px; color: #fff; background-color: #FD8978; border: #FD8978;"><i class='bx bx-pencil' ></i>Edit</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- This section is for Pagination -->
            <?php include "pagination.php"; ?>

        </section>

        <!-- Add new Book Modal -->
        <div class="modal fade" id="addBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add New Thesis Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Thesis Book Details</p>
                        <form action="books.php" method="post">
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book'></i> Book Title</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="title" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Title" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Authors</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="author" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Researcher" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book-content'></i> Thesis Abstract</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="abstract" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Abstract" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-time'></i> Date Publish</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="publish" type="date" ondrop="return false;" onpaste="return false;" class="form-control" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Thesis Advicer</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="professors" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Professors" required="Required"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Add"/>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>



        <!-- Edit Book Modal -->
        <div class="modal fade" id="editBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Thesis Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Thesis Book Details</p>
                        <form action="books.php" method="post">
                            <div style="display: none;">
                                <input id="bookId" type="number" name="bookId">
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book'></i> Book Title</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editTitle" name="editTitle" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Title" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Authors</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editAuthor" name="editAuthor" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Researcher" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book-content'></i> Thesis Abstract</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="abstract" name="abstract" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Abstract" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-time'></i> Date Publish</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editPublish" name="editPublish" type="date" ondrop="return false;" onpaste="return false;" class="form-control" required="Required"/>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Thesis Advicer</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editProfessors" name="editProfessors" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Professors" required="Required"/>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Save"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>        

    </body>

    <!-- navigation of menu -->
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

          function searchbar__Function() {

          //Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchbar__input");
          filter = input.value.toUpperCase();
          table = document.getElementById("books__table");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            var found = false;
            var td = tr[i].getElementsByTagName("td");
          for(j = 0; j < td.length; j++) {
          if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          //if found at least once it is set to true
          found = true;
          }
         }
         //only hides or shows it after checking all columns
        if(found){
         tr[i].style.display = "";
        } else {
        tr[i].style.display = "none";
          }
        }
        }
          </script>
    <script type="text/javascript">
        let getId = new XMLHttpRequest();
        getId.onload = function (){
            
        }

        function getIds(id){
         const hiddenBox = document.getElementById('bookId');
         const editTitle = document.getElementById('editTitle');
         const editAuthor = document.getElementById('editAuthor');         

         hiddenBox.value = id.parentNode.parentNode.childNodes[1].innerHTML;
         editTitle.value = id.parentNode.parentNode.childNodes[5].innerHTML;

         alert(hiddenBox.value);


        }

    </script>
    <script src="../teamsScript/bootstrap.js"></script>
    <script src="../teamsScript/navigation.js"></script>
</html>