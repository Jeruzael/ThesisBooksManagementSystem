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
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Borrowed Records</title>
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
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;">Borrowed Books</div>
            <div class="container-fluid" style="overflow-x: scroll; ">
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px;">
                    <thead style="background-color: #7788F4; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
                        <th>Request ID</th>
                        <th>Book Title</th>
                        <th>Borrower</th>
                        <th>Borrowing Date</th>
                        <th>Date Returned</th>
                        <th>Remarks</th>
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

                            $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM thesisborrowed");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;


                            $dataQuery = "SELECT *, DATE_FORMAT(thesisrequest.requestStamp, '%M %d, %Y') as borrowDate, DATE_FORMAT(borrowedReturn, '%M %d, %Y') as returnDate FROM thesisborrowed INNER JOIN thesisrequest ON thesisborrowed.borrowedRequest = thesisrequest.requestId INNER JOIN thesisLibrary ON thesisrequest.requestBookId = thesisLibrary.bookId INNER JOIN teamsuser ON thesisrequest.requesterId = teamsuser.userId order by requestId asc LIMIT $offset, $total_records_per_page";
                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">
                            <td><?php echo $row['requestId']; ?></td>
                            <td style="text-align:left; width:600px"><?php echo ucwords($row['bookTitle']); ?></td>
                            <td style="text-align:left;"><?php echo ucwords($row['userLastname']); ?>, <?php echo ucwords($row['userFirstname']); ?></td>
                            <td><?php echo $row['borrowDate']; ?></td>
                            <td><?php echo $row['returnDate']; ?></td>
                            <td><?php echo $row['borrowedRemarks']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- This section is for Pagination -->
            <?php include "pagination.php"; ?>

        </section>
    </body>

    <!-- navigation of menu -->
    <script src="../teamsScript/navigation.js"></script>
</html>